<?php

require 'frontendController.php';

class homeController extends frontendController{
 
    public function index() {
        Loader::loadView("index");
    }
}

