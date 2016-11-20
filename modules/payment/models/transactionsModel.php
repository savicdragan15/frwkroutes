<?php   
/**
 * @property int $ID primary key
 * @property int $transaction_id 
 * @property int $user_id 
 * @property int $shipping_method_id
 * @property int $payment_method_id
 * @property decimal $total_price
 * @property datetime $transaction_date
 * @property string $status 0 - failed 1 - success
 */

class transactionsModel extends baseModel{
    
    public static $key = "ID";
    public static $table = "transactions";
    
    public function insertTransaction($status){
      $this->transaction_id = $_SESSION['order_information']['order_id'];
      $this->user_id = $_SESSION['user']['user_id'];
      $this->shipping_method_id = $_SESSION['order_information']['shipping_type'];
      $this->payment_method_id = $_SESSION['order_information']['payment_method'];
      $this->total_price = $_SESSION['order_information']['total_price'];
      $this->transaction_date = date("Y-m-d H:i:s",time());
      $this->status = $status;
      return $this->insert();
    }
    
}