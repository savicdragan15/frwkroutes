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
require 'frontendController.php';
class productsController extends frontendController{
     private $productsModuleController;
     
     public function __construct() {
        parent::__construct();
        $this->productsModuleController = new productsModuleController();
     }

     public function index() {
        Loader::loadView("index");
    }
    
    public function allProductsByCategory($id,$page){
        $this->productsModuleController->allProductsByCategory($id,$page);
    }
}
