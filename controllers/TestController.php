<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controllers;
use Views\Template;
use Models\Product;

/**
 * Description of TestController
 *
 * @author WIN 7 PRO
 */
class TestController extends baseController{
    
    public function __construct() {
        $this->template = new Template('test_theme');
    }
    
    public function index() {
       $product = Product::create(['product_name' => 'orm test1234']);
       dump($product);
    }
    
}
