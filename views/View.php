<?php
namespace Views;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Views
 *
 * @author WIN 7 PRO
 */
abstract class View {
    
    protected $data = array();
    protected $module_name = '';
    
    public function setData($key, $value)
    {
        $this->data[$key] = $value;
    }
    
    public function getData()
    {
        return $this->data;
    }
    
    public function getHeaderPath()
    {
        $header_path = realpath('views/'.$this->theme_name.'/header.php');
        
        if($this->module_name == '')
            return $header_path;
        else
        {
           $header_path_module = realpath('modules/'. $this->module_name .'/views/'.$this->theme_name.'/header.php'); 
           if(file_exists($header_path_module))
               return $header_path_module;
           
           return $header_path;
        }
            
    }
    
    public function getFooterPath()
    {
        $footer_path = realpath('views/'.$this->theme_name.'/footer.php');
        
        if($this->module_name == '')
            return $footer_path;
        else
        {
           $footer_path_module = realpath('modules/'. $this->module_name .'/views/'.$this->theme_name.'/footer.php'); 
           
           if(file_exists($footer_path_module))
               return $footer_path_module;
           
           return $footer_path;
        }
    }
    
    
    
}
