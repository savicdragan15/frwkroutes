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
       // Loader::loadView('list', 'products', false,$this->template);
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
            if(Cookie::get('grid') == 'list' || !Cookie::get('grid'))
               Loader::loadView('list', 'products', FALSE,$this->template);
             else
               Loader::loadView('grid', 'products', FALSE,$this->template);  
        }
    }
    public function allProductsBySubCategory($id,$idcat,$page){
        $id = $this->filter_input($id);
        
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
           if(Cookie::get('grid') == 'list' || !Cookie::get('grid'))
               Loader::loadView('list', 'products', FALSE,$this->template);
             else
               Loader::loadView('grid', 'products', FALSE,$this->template);  
        }
        
    }
    
    public function singleProduct($id){
        
        $id = $this->filter_input($id);
        
        $product = $this->productsModel->getProduct($id);
        $this->template['product'] = $product;
        Loader::loadView('singleProduct', 'products', FALSE, $this->template);
    }
    
}