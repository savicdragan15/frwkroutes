<?php
/**
 * @property int $ID primary key
 * @property string $product_name Name of product
 * @property string $product_description Description of product
 * @property string $product_price Price
 * @property int $product_quantity Quantity
 * @property int $product_category Category
 * @property int $product_subcategory Subcategory
 * @property int $product_sub_subcategory Sub sub category
 * @property int $product_status Product status
 */
class productsModel extends baseModel{
    public static $key = "ID";
    public static $table = "products";
    
     
    public function getProductsByCategory($id, $limit, $offset){
        
        $this->join = array(
            array("table"=>"images","relation"=>"products.ID = images.product_id")
        );
        
        $this->limit = $limit;
        $this->offset = $offset;
        $this->where = "products.product_category={$id} and products.product_status = 1";

        return $this->join();
    }
    public function getProductsBySubCategory($id,$idcat, $limit, $offset){
        
        $this->join = array(
            array("table"=>"images","relation"=>"products.ID = images.product_id")
        );
        
        $this->limit = $limit;
        $this->offset = $offset;
        $this->where = "products.product_category='{$idcat}' and products.product_subcategory='{$id}' and products.product_status = 1";

        return $this->join();
    }
    
    public function getProductsBySubCatChild($id, $idsubcat, $idcat, $offset, $limit){
        $this->join = array(
            array("table"=>"images","relation"=>"products.ID = images.product_id")
        );
        
        $this->limit = $limit;
        $this->offset = $offset;
        $this->where = "products.product_category={$idcat} and products.product_subcategory='{$idsubcat}' and products.product_sub_subcategory='{$id}' and products.product_status = 1";

        return $this->join();
    }
    
    public function getNumberOfRecords($category,$id){
        $products = $this->getAll("count(ID) as 'all'", "WHERE {$category}='{$id}' and products.product_status = 1");
        
        return $products[0]->all;
    }
    
    public function getProduct($id, $status = 1){
        $this->join = array(
            array("table"=>"images","relation"=>"products.ID = images.product_id")
        );
        
        if($status == 1){
           $this->where = "products.ID ='{$id}' and products.product_status = '{$status}'"; 
        }else{
             $this->where = "products.ID ='{$id}'"; 
        }
            
        
        $product_array=$this->join();
        if(!empty($product_array))
            return $this->join()[0];
    }
    
    public function getLatestProducts(){
        $this->join = array(
            array("table"=>"images","relation"=>"products.ID = images.product_id")
        );

        $this->limit = _NEW_PRODUCT_HOME_PAGE;
        $this->orderBy = "products.ID DESC";
        $this->where = "products.product_status = 1";
        $product_array = $this->join();
        
        return $product_array;
    }
    
   public function verifyProductPrice($id, $price){
       
       $product = $this->getAll('count(ID) as number_records', "WHERE ID='".$id."' AND product_price='".$price."'");
       
       if(!empty($product)){
           return $product[0];
       }
       
   }
   
   public function insertProduct($data){
    
       $this->product_name = $data['product_name'];
       $this->product_description = $data['product_description'];
       $this->product_price = $data['product_price'];
       $this->product_quantity = $data['quantity'];
       $this->product_category = $data['product_category'];
       $this->product_subcategory = $data['product_subcategory'];
       $this->product_sub_subcategory = $data['product_subsubcategory'];
       $this->product_status = $data['product_status'];
       
       return $this->insert();
   }
   
   public function updateProduct($data) {
       
       $this->ID = (int)$data['product_id'];
       $this->product_name = $data['product_name'];
       $this->product_description = $data['product_description'];
       $this->product_price = $data['product_price'];
       $this->product_quantity = $data['quantity'];
       $this->product_category = $data['product_category'];
       $this->product_subcategory = $data['product_subcategory'];
       $this->product_sub_subcategory = $data['product_subsubcategory'];
       $this->product_status = $data['product_status'];
       
       return $this->update();
   }
   
   public function getProducts($limit,$offset){
       $this->limit = $limit;
       $this->offset = $offset;
       return $this->getAll();
   }
   
   public function getNumberProducts(){
       $products = $this->getAll("count(ID) as 'all'");
       return $products[0]->all;
   }
    
}