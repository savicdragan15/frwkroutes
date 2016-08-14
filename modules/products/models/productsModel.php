<?php

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
    
    public function getNumberOfRecords($id){
        $products = $this->getAll("count(ID) as 'all'", "WHERE product_category={$id}");
        
        return $products[0]->all;
    }
    
}