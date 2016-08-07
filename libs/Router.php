<?php
class Router
{
    /**
     *
     * @var private 
     */
    private $url;
    private $controller;
    private $method;
    private $params=array();
    
   /**
    * 
    * @param string $url
    */
    public function __construct($url) 
    {
        $this->url = $url;
        if ($this->url == '') {
            $url = _DEFAULT_CONTROLLER . "/index";
        }
        $this->url = explode("/",$url);
        if(!isset($this->url[1]) || $this->url[1] == '') $this->url[1] ='/'; 
        $this->url[1]=($this->url[1]=='/')?'index':$this->url[1];
    }
    
    /**
     * Return controller name
     * @return string controller name
     */
    public function getController()
    {
        $this->controller = $this->url[0];
        return $this->controller;
    }
    /**
     * Return method name
     * @return string method name
     */
    public function getMethod()
    {
        $this->method = $this->url[1];
        return $this->method;
    }
    /**
     * Return array of params 
     * @return array array of params
     */
    public function getParams()
    {
       unset($this->url[0]);
       unset($this->url[1]); 
       $this->params = $this->url;
       return $this->params;
    }
}

