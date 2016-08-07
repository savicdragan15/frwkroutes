<?php

class homeController extends baseController{
 
    public function index() {
        Loader::loadView("index");
    }
}

