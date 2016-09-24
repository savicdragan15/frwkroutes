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

class productsController extends frontendController{
     private $productsModuleController;
     
     public function __construct() {
        parent::__construct();
        Loader::loadModule($this, 'productsModule');
        $this->productsModuleController = $this->modules['productsModule'];
     }

     public function index() {
        Loader::loadView("index");
    }
    
    public function allProductsByCategory($id,$page){
        $this->productsModuleController->allProductsByCategory($id,$page);
    }
    
    public function allProductsBySubCategory($id,$idcat,$page){
        $this->productsModuleController->allProductsBySubCategory($id,$idcat,$page);
    }
    
    public function allProductsSubCatChild($id,$idcat,$idsubcat,$page){
        $this->productsModuleController->allProductsSubCatChild($id,$idcat,$idsubcat,$page);
    }
    
    public function singleProduct($id){
        $this->productsModuleController->singleProduct($id);
    }
    
    public function test() {
        $this->productsModuleController->test();
    }
}
