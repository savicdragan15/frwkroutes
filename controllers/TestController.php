<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controllers;
use Views\Template;
use Models\Product;
use Models\Image;

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

//        $img = Image::create(array('product_id' => 1, 'image_name' => 'create.jpg'));
//        dd($img);
//        $img->fill(['product_id' => 1, 'image_name' => 'create.jpg']);
//        dd($img);
//        $img->save();

//        $image = new Image();
//        $image->product_id = 1;
//        $image->image_name = 'test.jpg';
//        dd($image->save());

//        $product = Product::find(1);
//        $product->product_name = 'New name';
//        dd($product->save());

//        $products = Product::find(1);
//        dd($products->images);

//        $products = Product::Active('1')->Price()->get();
//        dd($products);
        //global $entityManager;
        //dump($entityManager);
        //$product = $entityManager->find('Models\Product', 1);
        //$product = new Product();
        //dump($product->find());
        //die;
        $this->template->setData('name', 'Dragan');
        $this->template->render('about');
    }
    
}
