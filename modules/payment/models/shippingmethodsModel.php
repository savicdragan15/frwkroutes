<?php
/**
 * @property int $ID primary key
 * @property string $preview_name Name for preview
 * @property string $name Name for input field
 * @property string $status status
 */
class shippingmethodsModel extends baseModel{
    
    public static $key = "ID";
    public static $table = "shipping_methods";
    
     
    public function getShippingMethods(){
        $this->where = "status = '1'";
        return $this->getAll();
    }
    
}