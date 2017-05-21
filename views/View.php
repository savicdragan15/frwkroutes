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
    
    public function setData($key, $value)
    {
        $this->data[$key] = $value;
    }
    
    public function getData()
    {
        return $this->data;
    }
    
    
    
    
}
