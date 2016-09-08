<?php
class homeController extends frontendController{
 
    private $productsModel, $productsModuleController;
    public function __construct() {
      parent::__construct();
      Loader::loadModel($this, "products", "products");
      Loader::loadModule($this, "productsModule");
      $this->productsModel = $this->models['products'];
      $this->productsModuleController = $this->modules['productsModule'];
    }
    
    public function index() {
        $this->productsModuleController->homePage();
    }
    
    public function page404(){
        Loader::loadView('page404');
    }
    
    public function test(){
//        try {
//            $this->productsModel->ID = '';
//            $this->productsModel->product_price = 20.00;
//            $this->productsModel->update();
//        } catch (Exception $e) {
//            echo $e->getMessage();
//           // var_dump($e->getLine(), $e->getFile(),$e->getTraceAsString());
//        }
    }
}

