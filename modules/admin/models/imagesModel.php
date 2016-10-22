<?php
/**
 * @property int $ID Primary key
 * @property int $product_id ID of product
 * @property string $image_name Image name
 * 
 */
class imagesModel extends baseModel{
    public static $table = "images";
    public static $key = "ID";
    
    /**
     * Insert image record to database
     * @param string $image_name
     * @return type
     */
    public function insertImage($image_name) {
        $this->image_name = $image_name;
        return $this->insert();
    }
    
    /**
     * Set product_id after insert product
     * @param type $image_id
     * @param type $product_id
     */
    public function setProductId($image_id, $product_id){
        $this->ID = (int)$image_id;
        $this->product_id = $product_id;
        
        return $this->update();
    }
    
    /**
     * 
     * @param type $productID
     */
    public function getImageByProductId($productID){
        $this->where = "images.product_id = {$productID}";
        if(!empty($this->getAll()))
            return $this->getAll()[0];
    }
    
    public function updateImageByImageId($image_id,$image_name){
        $this->ID = (int)$image_id;
        $this->image_name = $image_name;
        
        return $this->update();
    }
}
