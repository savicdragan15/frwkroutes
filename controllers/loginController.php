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
       $this->_callMod("login");
    }
    
    public function index() {
        $this->_loginMod->index();
    }
    
    public function adminLogin(){
        $this->_loginMod->adminLogin();
    }
    
    public function logOut(){
        $this->_loginMod->logOut();
    }
}
