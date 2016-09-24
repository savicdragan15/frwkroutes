<?php
/**
 * abstrktni kontroler koji sluzi za nasledjivanje
 *
 */
require_once _FOLDER_CLASSES."/UrlHelper.php";
abstract class baseController
{
    protected $models=array();
    protected $modules=array();
    /**
     * 
     * @param string $name naziv modela
     * @param string $value objekat
     */
    public function setModel($name,$value)
    {
        $this->models[$name]=$value;
    }
    public function setModule($name,$value)
    {
        $this->modules[$name]=$value;
    }
    abstract public function index();
    
    /**
     * Metoda koja filttrira korisnicki unos
     * @param type $var
     * @return string
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
    public function validate($datas){
       foreach($datas as $data){
           $this->filter_input($data);
       }
       return $datas;
   }
   
    /**
     * Metoda koja vraca json
     * @param json $data
     */
    public function response($data){
       // header("Conten-type : application/json");
        echo json_encode($data);
    }
    
    public function redirect($link){
        header("Location:".$link);
    }

    public function strAddslashes($string){
        $string = addslashes($string);
        return $string;
    }
    
    /**
     * Check if Ajax request, return true if Ajax request otherwise false
     * @return boolean
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
       $urlHelper = new Url\UrlHelper();
       return str_replace(" ","_",$urlHelper->remove_accents($string));
    }
}

