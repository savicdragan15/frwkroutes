<?php
class homeController extends frontendController{
 
    public function index() {
        Loader::loadView("index");
    }
    
    public function page404(){
        Loader::loadView('page404');
    }
}

