<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of productsController
 *
 * @author Dragan
 */

class profileController extends frontendController{
     
     public function __construct() {
        parent::__construct();
        $this->_callMod("profile");
     }

     public function index() {
      // $this->_profileMod->index($scenario);
    }
    
     public function edit($scenario) {
       $this->_profileMod->edit($scenario);
    }
    
    
}
