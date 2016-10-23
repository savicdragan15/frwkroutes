<?php 

use Image\SimpleImage;
use Kilte\Pagination\Pagination;
/**
 * Admin module
 * 
 * @property string $_imagesMdl Images model 
 * @property object $_navigationMdl Navigation model
 * @property object $_productsMdl Products model
 */

class adminModuleController extends baseController{
   
      public function __construct() {
          $this->_callMdl("products", "products");
          $this->_callMdl("navigation");
          $this->_callMdl("images", "admin");
          Loader::loadClass("SimpleImage");
      }
      
      /**
       * index strana u admin delu
       */
     public function index() {
        $this->_isAdminLogin();
        Loader::loadView("index", "admin", true);
     }
     
     /**
      * This method detected is admin log in
      * if not login will be redirect to login page
      */
     private function _isAdminLogin(){
          if(!User::isAdminLogin()){
              $this->redirect(_WEB_PATH."admin/login");
              die;
          }
     }
    /**
     * 
     */
    public function insertProducts(){
        $this->_isAdminLogin();
        
        if(isset($_POST['image_id'])){
            
            $data = $this->validate($_POST);
            $product_id = $this->_productsMdl->insertProduct($data);
            
            $error = true;
            $message = 'Došlo je do greške. Pokušajte ponovo.';
            
            if($product_id > 0){
               if($this->_imagesMdl->setProductId($data['image_id'],$product_id)){
                   $error = false;
                   $message = 'Uspešno ste ubacili proizvod';
               } 
            }
            
            $data = array(
                   'error' => $error,
                   'message' => $message
               );
               
            $this->response($data);
            
            unset($_POST);
          die;
        }
        
        $categories = $this->_navigationMdl->getCategories();
        
        $this->template['categories'] = $categories;
        Loader::loadView("insertproducts", "admin", true, $this->template);
    }
    public function adminCategories()
    {
        $this->template=array();
        $categories = $this->_navigationMdl->getCategories();
        
        $this->template['categories'] = $categories;
        Loader::loadView("admin_categories", "admin", true, $this->template);
    }
    public function insertCategory()
    {
        
        $params=$this->validate($_POST);
        $id_cat=$this->_navigationMdl->insertCategory($params);
        if((int)$id_cat>0)
        {
            $data = array(
                'error' => false,
                'message' => "Kategorija je uspesno ubacena"
            );
        }
        else
        {
            $data = array(
                'error' => true,
                'message' => "Doslo je do greske"
            );
        }
        $this->response($data);
    }
    public function updateCategory()
    {
        
        $params=$this->validate($_POST);
        $updated=$this->_navigationMdl->updateCategory($params);
        if($updated)
        {
            $data = array(
                'error' => false,
                'message' => "Kategorija je uspesno izmenjena"
            );
        }
        else
        {
            $data = array(
                'error' => true,
                'message' => "Doslo je do greske"
            );
        }
        $this->response($data);
    }
    
    public function getCategory($id)
    {
        $catData=$this->_navigationMdl->getCategory($id);
        if(is_object($catData))
        {
             $data = array(
                'error' => false,
                'message' => "Uspesno dobavljeno",
                'response'=>$catData
            );
        }
        else
        {
             $data = array(
                'error' => true,
                'message' => "Doslo je do greske",
                'response'=>null
                );
        }
        $this->response($data);
    }
    public function getCategories()
    {
        $catData=$this->_navigationMdl->getCategories();
        if(!empty($catData))
        {
             $data = array(
                'error' => false,
                'message' => "Uspesno dobavljeno",
                'data'=>$catData
            );
        }
        else
        {
             $data = array(
                'error' => true,
                'message' => "Doslo je do greske",
                'data'=>null
                );
        }
        $this->response($data);
    }
    /**
     * Upload image from insertProduct
     */
    public function uploadImage(){

        $name_image = uniqid().date('Y-m-d');
        
        if(isset($_FILES['image']['tmp_name'])){
            //single product img
            $image = new SimpleImage($_FILES['image']['tmp_name']);
            $image->fit_to_height(400)->save(_VIEWS_PATH."/images/products_gallery/normal/{$name_image}.jpg");
        
            //thumbnail img
            $thumbnail_image = new SimpleImage($_FILES['image']['tmp_name']); 
            $thumbnail_image->fit_to_height(300)->save(_VIEWS_PATH."/images/products_gallery/thumbnail/{$name_image}.jpg");
        
            //small image butn not in use for now
            $small_image = new SimpleImage($_FILES['image']['tmp_name']); 
            $small_image->fit_to_height(97)->save(_VIEWS_PATH."/images/products_gallery/small/{$name_image}.jpg");
        
            $image_id = $this->_imagesMdl->insertImage($name_image.".jpg");
        
            $data = array(
                'error' => false,
                'image_id' => $image_id
            );
        
            if(!$image_id){
                $data = array(
                    'error' => true,
                    'message' => "Došlo je do greske. Pokušajte ponovo."
                );
            }
        
            $this->response($data);
        }
       
    }
    
    /**
     * 
     * @return json vraca json objekat slike
     */
    public function getImage(){
        
        if ((int) isset($_POST['id'])) {
            $image = $this->_imagesMdl->get($_POST['id']);
            
            if (!empty($image)) {
                $error = false;
                $message = "Uspesno dobavljena slika";
            } else {
                $error = true;
                $message = "Doslo je do greske prilikom dobavljanja slike";
            }

            $data = array(
                "error" => $error,
                "message" => $message,
                "data" => $image
            );

            $this->response($data);
        }
    }
    
    /**
     * 
     */
    public function getSubcategories() {
        $sub_categories = $this->_navigationMdl->getSubcategory($this->filter_input($_POST['category_id']));

        $data = array(
            "data" => $sub_categories,
            "error" => false,
            "subcategory_id" => isset($_POST['subcategory_id']) ? $_POST['subcategory_id'] : null
        );

        if (empty($sub_categories)) {
            $data = array(
                "error" => true,
                "message" => "Nema podkategorija.",
            );
        }

        $this->response($data);
    }
    
    /**
     * 
     */
    public function getSubSubCategories() {
        $sub_subcategories = $this->_navigationMdl->getSubSubCategories($this->filter_input($_POST['subcategory_id']));

        $data = array(
            "data" => $sub_subcategories,
            "error" => false,
            "sub_subcategory_id" => isset($_POST['sub_subcategory_id'])? $_POST['sub_subcategory_id'] : null
        );

        if (empty($sub_subcategories)) {
            $data = array(
                "error" => true,
                "message" => "Nema pod podkategorija."
            );
        }

        $this->response($data);
    }
    
    /**
     * 
     */
    public function login() {
        Loader::loadPage("login", "admin");
    }

    /**
     * Products administration
     */
    public function productsAdministration(){
       $this->template['categories'] = $this->_navigationMdl->getCategories();
       Loader::loadView("products_administration", "admin" , true, $this->template);
    }
    
     public function getProduct($product_id){
          $error = true;
          $message = "Doslo je do greske!";
         if(isset($product_id) && $product_id != ''){
           
            //scenario for admin 
            if(isset($_POST['product_status'])){
                $product = $this->_productsMdl->getProduct($this->filter_input($product_id), $this->filter_input($_POST['product_status']));
            }else{
               $product = $this->_productsMdl->getProduct($this->filter_input($product_id));  
            }
            
            if($product){
                $error = false;
                $message = 'Success';
            }
            
            $data = array(
                'error' => $error,
                'message' => $message,
                'product' => $product
            );
            
            $this->response($data);
         }
         
    }
    
    /**
     * Get products for admin
     */
    public function getProducts($page){
        //$page = 2;
        //var_dump($page); die;
        $nubmerOfRecords = $this->_productsMdl->getNumberProducts();
        
        $pagination = new Pagination($nubmerOfRecords, $page, 5 ,2);
        $offset = $pagination->offset();
        $limit = $pagination->limit();
        $products = $this->_productsMdl->getProducts($limit,$offset);
        $pages = $pagination->build(); // Contains associative array with a numbers of a pages
        
        $error = true;
        $message = "Došlo je do greške!";
        
        if(!empty($products)){
         $error = false;
         $message = "Success";  
        }
        
        $data = array(
          'error' => $error,
          'message' => $message,
          'products' => $products,
          'pagination' => $pages
        );
        
       $this->response($data);
    }
    
    public function updateProduct(){
        
        $data = $this->validate($_POST);
        
        $update = $this->_productsMdl->updateProduct($data);
        
        $error = true;
        $message = "Došlo je do greške!";
        
        if($update){
            $error = false;
            $message = "Uspesno ste izmenili podatke.";
        }
        
        $data = array(
          'error' => $error,
          'message' => $message
        );
        
        $this->response($data);
    }
    
    public function getImageByProductID(){
        
        $product_id = $this->filter_input($_POST['product_id']);
        $image = $this->_imagesMdl->getImageByProductID($product_id);
        
        $error = true;
        $message = "Došlo je do greške!";
        
        if($image){
           $error = false;
           $message = "Success";   
        }
        
        $data = array(
          'error' => $error,
          'message' => $message,
          'image' => $image,
          'product_id' => $product_id
        );
        
       $this->response($data);
    }
    
    public function updateImage() {
        
        $name_image = uniqid().date('Y-m-d');
        
        if(isset($_POST['product_id'])){
            $image_id = $this->filter_input($_POST['image_id']);
            $productId = $this->filter_input($_POST['product_id']);
            
            //single product img
            $image = new SimpleImage($_FILES['image']['tmp_name']);
            $image->fit_to_height(400)->save(_VIEWS_PATH."/images/products_gallery/normal/{$name_image}.jpg");

            //thumbnail img
            $thumbnail_image = new SimpleImage($_FILES['image']['tmp_name']); 
            $thumbnail_image->fit_to_height(300)->save(_VIEWS_PATH."/images/products_gallery/thumbnail/{$name_image}.jpg");

            //small image butn not in use for now
            $small_image = new SimpleImage($_FILES['image']['tmp_name']); 
            $small_image->fit_to_height(97)->save(_VIEWS_PATH."/images/products_gallery/small/{$name_image}.jpg"); 
            
            $error = true;
            $message = "Došlo je do greške!";
            
            if($this->_imagesMdl->updateImageByImageId($image_id,$name_image.".jpg")){
               $error = false;
               $message = "Success"; 
            }
            
            $data = array(
                'error' => $error,
                'message' => $message,
                'product_id' => $productId,
                'image_id' => $image_id,
                'image_name' => $name_image.".jpg"
            );
            
            $this->response($data);
        }
        
        
    }
  
}
