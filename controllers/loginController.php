<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of loginController
 *
 * @author Jovan
 */
class loginController extends frontendController{
    
     public function __construct() {
       parent::__construct();
       Loader::loadModule($this, 'loginModule');
       $this->loginModuleController = $this->modules['loginModule'];
    }
    
    public function index() {
        $this->loginModuleController->index();
    }
    
    public function logOut(){
        $this->loginModuleController->logOut();
    }
}
