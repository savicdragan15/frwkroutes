<?php

class frontendController extends baseController{
    
    public function __construct() {
          Loader::loadClass("Navigation");
    }
    public function index() {}
}