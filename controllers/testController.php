<?php
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
}

