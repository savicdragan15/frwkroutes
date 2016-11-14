<?php
/**
 * @property int $ID primary key
 * @property string $preview_name Name for preview
 * @property string $name Name for input field
 * @property string $status status
 */
class paymentmethodsModel extends baseModel{
    
    public static $key = "ID";
    public static $table = "payment_methods";
    
     
    public function getPaymentMethods(){
        $this->where = "status = '1'";
        return $this->getAll();
    }
    
}