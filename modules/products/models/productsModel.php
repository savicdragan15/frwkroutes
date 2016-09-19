<?php
/**
 * @property string $product_name Name of product
 * @property string $product_price Price
 */
class productsModel extends baseModel{
    public static $key = "ID";
    public static $table = "products";
 
    public function getProductsByCategory($id, $limit, $offset){
        
        $this->join = array(
            array("table"=>"images","realtion"=>"products.ID = images.product_id")
        );
        
        $this->where = "products.product_category={$id} LIMIT {$limit} OFFSET {$offset}";

        return $this->join();
    }
    public function getProductsBySubCategory($id,$idcat, $limit, $offset){
        
        $this->join = array(
            array("table"=>"images","realtion"=>"products.ID = images.product_id")
        );
        
        $this->where = "products.product_category={$idcat} and products.product_subcategory={$id} LIMIT {$limit} OFFSET {$offset}";

        return $this->join();
    }
    
    public function getProductsBySubCatChild($id, $idsubcat, $idcat, $offset, $limit){
        $this->join = array(
            array("table"=>"images","realtion"=>"products.ID = images.product_id")
        );
        
        $this->where = "products.product_category={$idcat} and products.product_subcategory={$idsubcat} and products.product_sub_subcategory={$id} LIMIT {$limit} OFFSET {$offset}";

        return $this->join();
    }
    
    public function getNumberOfRecords($category,$id){
        $products = $this->getAll("count(ID) as 'all'", "WHERE {$category}={$id}");
        
        return $products[0]->all;
    }
    
    public function getProduct($id){
       
        $this->join = array(
            array("table"=>"images","realtion"=>"products.ID = images.product_id")
        );
        
        $this->where = "products.ID ={$id}";
        $product_array=$this->join();
        if(!empty($product_array))
            return $this->join()[0];
    }
    
    public function getLatestProducts(){
        $this->join = array(
            array("table"=>"images","realtion"=>"products.ID = images.product_id")
        );

        $this->limit = _NEW_PRODUCT_HOME_PAGE;
        $this->orderBy = "products.ID DESC";
        $product_array = $this->join();
        
        return $product_array;
    }
    
   public function verifyProductPrice($id, $price){
       
       $product = $this->getAll('count(ID) as number_records', "WHERE ID=".$id." AND product_price=".$price);
       
       if(!empty($product)){
           return $product[0];
       }
       
   }
    
}