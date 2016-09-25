<?php
/**
 * Description of productsModuleController
 *
 * @author Dragan
 */
use Kilte\Pagination\Pagination;
class productsModuleController extends baseController
{
    private $productsModel, $navigationModel;
    public function __construct() {
      Loader::loadModel($this, "products", "products");
      Loader::loadModel($this, "navigation");
      $this->productsModel = $this->models['products'];
      $this->navigationModel = $this->models['navigation'];
    }
    /**
     * 
     */
    public function index(){
      
    }
    
    public function allProductsByCategory($id,$page){
        
        $id = $this->filter_input($id);
        
        $category_name = $this->navigationModel->getCategoryName($id); 
        $nubmerOfRecords = $this->productsModel->getNumberOfRecords("products.product_category",$id);
        $pagination = new Pagination($nubmerOfRecords, $page, 2 ,2);
        $offset = $pagination->offset();
        $limit = $pagination->limit();
        $products = $this->productsModel->getProductsByCategory($id,$limit,$offset);
        
        $pages = $pagination->build(); // Contains associative array with a numbers of a pages
        
        $this->template['products'] = $products;
        
        foreach ($products as $product){
            $product->product_name_url = $this->url_friendly($product->product_name);
        }
        
        $this->template['pagination'] = $pages;
        $this->template['category_name'] = $this->url_friendly($category_name);
        $this->template['category_id'] = $id;
        $this->template['limit'] = $limit;
        $this->template['total'] = $nubmerOfRecords;
        $this->template['controllerMethod']='allProductsByCategory';
        $this->template['message'] = 'No products in this category.';
        
         if(isset($_POST['type'])){
           
            if($_POST['type']==2)
            {
            Loader::loadPartialView('_list', 'products', false,array('params'=>$this->template));
            }
            else
            {
             Loader::loadPartialView('_grid', 'products', false,array('params'=>$this->template));
            }
        }else{
            if(Cookie::get('grid') == 'grid' || !Cookie::get('grid'))
               Loader::loadView('grid', 'products', FALSE,$this->template);
             else
               Loader::loadView('list', 'products', FALSE,$this->template);  
        }
    }
    public function allProductsBySubCategory($id,$idcat,$page){
        $id = $this->filter_input($id);
        $idcat = $this->filter_input($idcat);
        
        $sub_category_name = $this->navigationModel->getCategoryName($id);
        
        $nubmerOfRecords = $this->productsModel->getNumberOfRecords("products.product_subcategory",$id);
        $pagination = new Pagination($nubmerOfRecords, $page, 2 ,2);
        $offset = $pagination->offset();
        $limit = $pagination->limit();
        $products = $this->productsModel->getProductsBySubCategory($id,$idcat,$limit,$offset);
        
        $pages = $pagination->build(); // Contains associative array with a numbers of a pages
        
        $this->template['products'] = $products;
        foreach ($products as $product){
            $product->product_name_url = $this->url_friendly($product->product_name);
        }
        $this->template['pagination'] = $pages;
        $this->template['category_name'] = $this->url_friendly($sub_category_name);
        $this->template['category_id'] = $id;
        $this->template['cat_id'] = $idcat;
        $this->template['limit'] = $limit;
        $this->template['total'] = $nubmerOfRecords;
        $this->template['controllerMethod']='allProductsBySubCategory';
        $this->template['message'] = 'No products in this subcategory.';
        if(isset($_POST['type'])){
           //$this->template['navigation']=new Navigation();
           //Loader::loadPartialView('list', 'products', false,$this->template);
            if($_POST['type']==2)
            {
            Loader::loadPartialView('_list', 'products', false,array('params'=>$this->template));
            }
            else
            {
             Loader::loadPartialView('_grid', 'products', false,array('params'=>$this->template));
            }
        }else{
           if(Cookie::get('grid') == 'grid' || !Cookie::get('grid'))
               Loader::loadView('grid', 'products', FALSE,$this->template);
             else
               Loader::loadView('list', 'products', FALSE,$this->template); 
        }
        
    }
    
    public function allProductsSubCatChild($id,$idsubcat,$idcat,$page){
        
        $id = $this->filter_input($id);
        $idsubcat = $this->filter_input($idsubcat);
        $idcat = $this->filter_input($idcat);
        
        $sub_sub_category_name = $this->navigationModel->getCategoryName($id);
        
        $nubmerOfRecords = $this->productsModel->getNumberOfRecords("products.product_sub_subcategory",$id);
        $pagination = new Pagination($nubmerOfRecords, $page, 2 ,2);
        $offset = $pagination->offset();
        $limit = $pagination->limit();
        
        $products = $this->productsModel->getProductsBySubCatChild($id, $idsubcat, $idcat, $offset, $limit);
        $pages = $pagination->build(); // Contains associative array with a numbers of a pages
       
        
        $this->template['products'] = $products;
        foreach ($products as $product){
            $product->product_name_url = $this->url_friendly($product->product_name);
        }
        $this->template['pagination'] = $pages;
        $this->template['category_name'] = $this->url_friendly($sub_sub_category_name);
        $this->template['category_id'] = $id;
        $this->template['cat_id'] = $idcat;
        $this->template['sub_cat_id'] = $idsubcat;
        $this->template['limit'] = $limit;
        $this->template['total'] = $nubmerOfRecords;
        $this->template['controllerMethod'] = 'allProductsSubCatChild';
        $this->template['message'] = 'No products in this subcategory.';
        
        if(isset($_POST['type'])){
            
            if($_POST['type']==2)
            {
            Loader::loadPartialView('_list', 'products', false,array('params'=>$this->template));
            }
            else
            {
             Loader::loadPartialView('_grid', 'products', false,array('params'=>$this->template));
            }
        }else{
           if(Cookie::get('grid') == 'grid' || !Cookie::get('grid'))
               Loader::loadView('grid', 'products', FALSE,$this->template);
             else
               Loader::loadView('list', 'products', FALSE,$this->template);  
        }
        
    }
    
    public function singleProduct($id){
        
        $id = $this->filter_input($id);
        
        $product = $this->productsModel->getProduct($id);
        if(is_null($product)){
            $this->redirect(_WEB_PATH."home/page404");
            die;
        }
            
        $this->template['product'] = $product;
        
        Loader::loadView('singleProduct', 'products', FALSE, $this->template);
    }
    
    public function homePage(){
        $latestProducts =  $this->productsModel->getLatestProducts();
         foreach ($latestProducts as $product){
            $product->product_name_url = $this->url_friendly($product->product_name);
        }
        $this->template['latestProducts'] = $latestProducts;
        
        Loader::loadView("index","",false,$this->template);
    }
    
    public function test() {
        $d = $this->productsModel->like("*", array(
            array("field" => "product_name", "condition" => "%12%")
        ));
       var_dump($d);
    }
}