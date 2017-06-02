<?php
/**
 * Abstract contrller baseController
 * @author Jovan
 * @author Dragan
 */
namespace Controllers;
use Classes\UrlHelper;

abstract class baseController
{
    protected $models  = array();
    protected $modules = array();
    
    public function __construct() {
       
    }
    
    /**
     * 
     * @param string $name name of model
     * @param string $value current object
     */
    public function setModel($name,$value)
    {
        $this->models[$name] = $value;
    }
    
    /**
     * 
     * @param string $name name of model
     * @param string $value current object
     */
    public function setModule($name,$value)
    {
        $this->modules[$name] = $value;
    }
    
    /**
     * 
     * 
     * Default method, this method will be call automatically in child classes
     * 
     *  
     */
    abstract public function index();
    
    /**
     * This method filters user input
     * @param string $var
     * @return string filtered user input
     * 
     * 
     */
    public function filter_input($var) {
        $var = trim($var);
        if ((int) $var === 0 && is_string($var) && $var !== '0')
            return filter_var($var, FILTER_SANITIZE_SPECIAL_CHARS);
        else
            return floatval($var);
    }

    /**
     * Validate user input 
     * @param array $datas
     * @return array
     */
    public function validate($data){
       foreach($data as $key => $value){
          $d[$key] =  $this->filter_input($value);
       }
       return $d;
   }
   
    /**
     * Method return json
     * @param array $data
     */
    public function response($data){
       // header("Conten-type : application/json");
        echo json_encode($data);
    }
    
    /**
     * Redirect user to other url
     * @param string $link url to be redirect
     */
    public function redirect($link){
        header("Location:".$link);
    }

    public function strAddslashes($string){
        $string = addslashes($string);
        return $string;
    }
    
    /**
     * Check if Ajax request, return true if Ajax request otherwise false
     * @author Dragan
     * @return boolean true or false
     */
    public function isAjaxRequest(){
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	   return true;
        }
        return false;
    }
    
    /**
     * 
     * @param type $string
     * @return string
     */
    public function url_friendly($string)
    {
     \Loader::loadClass('UrlHelper');
     $urlHelper = new UrlHelper();
     return str_replace(" ","_",$urlHelper->remove_accents($string));
    }

    /**
     * 
     * Shorcut to model call
     * @author Jovan
     * @param string $model name of model to be called
     * @param type $module name of module where model 
     * @return object object of current model
     * 
     */
    public function _callMdl($model, $module="")
    {
        \Loader::LoadModel($this,$model, $module);
        $mdl="_".$model."Mdl";
        return $this->$mdl=$this->models[$model];
    }
    
    /**
     * 
     * @param type $module_name
     * @return type
     */
    public function _callMod($module_name)
    {
        \Loader::loadModule($this, $module_name."Module");
        $module ="_".$module_name."Mod";
        return $this->$module = $this->modules[$module_name."Module"];
    }
    
    
    /**
      * This method detected is user log in
      * if not login will be redirect to login page
      */
     protected function _isUserLogin(){
          if(!\User::isLogin()){
              $this->redirect(_WEB_PATH."login");
              die;
          }
     }
     
    public function page404(){
        $this->redirect(_WEB_PATH."home/page404");
    }
}

