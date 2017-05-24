<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Views;

/**
 * Description of Template
 *
 * @author WIN 7 PRO
 */
class Template extends View implements iView{
    
    public function __construct($theme_name) {
        $this->theme_name = $theme_name;
    }
    
    public function render($view_name) {
       $path_to_view = "views/" . $this->theme_name . '/' . $view_name . '.php';
       if (file_exists($path_to_view))
        {
            $partial_params = $this->data;
            
            extract($this->data);
            
            include_once  $this->getHeaderPath();
            include_once  $path_to_view;
            include_once  $this->getFooterPath();
           
        }
        
    }
    
}
