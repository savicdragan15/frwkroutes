<?php
use duncan3dc\Laravel\BladeInstance;
class testController extends baseController
{
    public function __construct()
    {
        $this->_callMdl("products", "products");
    }
    
    public function index()
    {
        $condition = array(
          array("field" => "product_name", "condition" => "%12%")
        );
        
        var_dump($this->_products->like("*",$condition));
    }
    
    public function test(){
        
        $views ="C:/wamp/www/all_shine_out/views";
        $cache = __DIR__ . '/cache';
        
        $blade = new BladeInstance($views, $cache);

        echo $blade->render("test",['name' => 'Dragan']);
        
     
    }
}

