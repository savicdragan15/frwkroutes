<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of paymentController
 *
 * @author Dragan
 */
class paymentController extends frontendController{
    //put your code here
    public function __construct(){
        parent::__construct();
        $this->_callMod("payment");
    }
    
    public function index(){
       
    }
    
    public function paymentOption($login = 0){
         $this->_paymentMod->paymentOption($login);
    }
    
    public function processPayment() {
         $this->_paymentMod->processPayment();
    }
}