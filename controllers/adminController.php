<?php

class adminController extends baseController{
       
    public function __construct(){
        $this->_callMod("admin");
    }
    
    public function index(){
       $this->_adminMod->index();
    }
    
    public function insertProducts(){
        $this->_adminMod->insertProducts();
    }
    
    public function getSubcategories(){
        $this->_adminMod->getSubcategories();
    }
    
    public function getSubSubCategories(){
        $this->_adminMod->getSubSubCategories();
    }
    
    public function login(){
        $this->_adminMod->login();
    }
    
    public function uploadImage(){
        $this->_adminMod->uploadImage();
    }

}
