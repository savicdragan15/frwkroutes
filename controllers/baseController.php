<?php
/**
 * Abstract contrller baseController
 * @author Jovan
 * @author Dragan
 */

use interfaces\base as base;

abstract class baseController implements base
{
    protected $models=array();
    protected $modules=array();
    /**
     * 
     * @param string $name name of model
     * @param string $value current object
     */
    public function setModel($name,$value)
    {
        $this->models[$name]=$value;
    }
    
    /**
     * 
     * @param string $name name of model
     * @param string $value current object
     */
    public function setModule($name,$value)
    {
        $this->modules[$name]=$value;
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
    public function filter_input($var){
       $var = trim($var);
       return $var = filter_var($var,FILTER_SANITIZE_SPECIAL_CHARS);
    }
    /**
     * Validate user input 
     * @param array $datas
     * @return array
     */
    public function validate($data){
       foreach($data as $d){
           $this->filter_input($d);
       }
       return $data;
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
     Loader::loadClass('UrlHelper');
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
        Loader::LoadModel($this,$model, $module);
        $mdl="_".$model;
        return $this->$mdl=$this->models[$model];
    }
}

