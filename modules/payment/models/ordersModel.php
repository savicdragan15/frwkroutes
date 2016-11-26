<?php
/**
 * @property int $ID primary key
 * @property int $transaction_id 
 * @property int $product_id
 * @property string $product_quantity
 * @property string $product_unit_price
 */
class ordersModel extends baseModel{
    
    public static $key = "ID";
    public static $table = "orders";
    
    public function insertOrder($product, $transaction_id){
       $this->transaction_id = $transaction_id;
       $this->product_id = $product['proizvod_id'];
       $this->product_quantity = $product['proizvod_kolicina'];
       $this->product_unit_price = $product['proizvod_cena'];
       return $this->insert();
    }
    
    public function getOrderByTransactionId($transaction_id){
         $this->select = "orders.ID as orderProductId, orders.transaction_id , orders.product_id as orderProductID, orders.product_quantity as orderProductQuantity,
             orders.product_unit_price, products.ID, products.product_name ";
         $this->join = array( 
            array("table"=>"products","relation"=>"orders.product_id = products.ID")
        );
        $this->where = "transaction_id = '$transaction_id'";
        return $this->join();
    }
    
}