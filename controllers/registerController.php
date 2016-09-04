<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of registerController
 *
 * @author Jovan
 */
class registerController extends frontendController{
   
    public function __construct() {
       parent::__construct();
       Loader::loadModule($this, 'registerModule');
       $this->registerModuleController = $this->modules['registerModule'];
    }
    public function index() {
        $this->registerModuleController->index();
    }
    
    public function confirm($salt){
        $this->registerModuleController->confirm($salt);
    }
}
