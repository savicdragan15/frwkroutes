<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cartController
 *
 * @author Dragan
 */
class cartController extends baseController{
    
    public function __construct() {
        Loader::loadModule($this, 'cartModule');
        $this->cartModuleController = $this->modules['cartModule'];
    }
    
    public function index() {
        $this->cartModuleController->index();
    }
}
