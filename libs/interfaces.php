<?php

namespace interfaces;

interface base
{
    public function index();
    
    public function setModel($name,$value);
    
    public function setModule($name,$value);  

    public function _callMdl($model);
    
    public function response($data);
    
    public function filter_input($var);
    
    public function validate($datas);
    
    public function redirect($link);
    
    public function isAjaxRequest();
    
    public function url_friendly($string);
}

