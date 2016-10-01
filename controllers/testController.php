<?php

use duncan3dc\Laravel\BladeInstance;
use duncan3dc\Laravel\Blade;

class testController extends baseController
{
    public function __construct()
    {
        parent::__construct();
        $this->_callMdl("products", "products");
        Loader::loadClass("Uploader");
    }
    
    public function index()
    {
      /*  $condition = array(
          array("field" => "product_name", "condition" => "%12%")
        );*/
        
        //var_dump($this->_products->like("*",$condition));
        
        $condition = array(
          array("field" => "product_name", "condition" => "%12%")
        );
        echo $this->view->render("test", array(
            'name' => 'Dragan',
            "data" =>  $this->_productsMdl->like("*",$condition)[0]
        ));
        
    }
    
    public function upload() {
        
        $path = __DIR__ . "/";
        
        if (isset($_FILES['fileToUpload'])) {
            $file_to_upload = $_FILES['fileToUpload'];
            $this->uploader = new Uploader($file_to_upload, $path);
            $this->uploader->setFileName("Dragan_S_CV_2016");
            $this->uploader->setIvalidformatMessage("Neodgovarajuci format");

            if ($this->uploader->upload()) {
                echo "ok";
            } else {
                echo $this->uploader->message;
            }
        }
        
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

