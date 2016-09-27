<?php

use duncan3dc\Laravel\BladeInstance;
use duncan3dc\Laravel\Blade;

class testController extends baseController
{
    public function __construct()
    {
        parent::__construct();
        $this->_callMdl("products", "products");
    }
    
    public function index()
    {
        $condition = array(
          array("field" => "product_name", "condition" => "%12%")
        );
        
        //var_dump($this->_products->like("*",$condition));
    }
    
    public function test(){
        $condition = array(
          array("field" => "product_name", "condition" => "%12%")
        );
        
        echo $this->view->render("test", array(
            'name' => 'Dragan',
            "data" =>  $this->_productsMdl->like("*",$condition)[0]
        ));
        
      /*  $this->_callMdl("products", "products");
        var_dump($this->_productsMdl);
     */
    }
}

