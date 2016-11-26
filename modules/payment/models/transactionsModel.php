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
    
    public function getTransactions($limit,$offset){
       $this->select = 'users.ID as user_id, users.email, users.first_name, users.last_name, transactions.transaction_date, transactions.transaction_id, transactions.ID, transactions.status, transactions.total_price, payment_methods.preview_name as payment_method ';
       $this->limit = $limit;
       $this->offset = $offset;
       $this->orderBy = 'transactions.transaction_date DESC';
       $this->join = array( 
            array("table"=>"users","relation"=>"transactions.user_id = users.ID"),
            array("table"=>"payment_methods","relation"=>"transactions.payment_method_id = payment_methods.ID"),
        );
       
       return $this->join();
   }
   
   public function getNumberTransactions(){
       $transactions = $this->getAll("count(ID) as 'all'");
       return $transactions[0]->all;
   }
   
   public function getLastTransaction($user_id){
       $this->where = "transactions.user_id = '$user_id'";
       $this->orderBy = "transactions.ID DESC";
       $this->limit = 1;
       if(!empty($this->getAll('transactions.ID')))
           return $this->getAll('transactions.ID')[0];
   }
   
   public function updateTrasactionStatus($transaction_id, $status){
       $this->ID = (int)$transaction_id;
       $this->status = $status;
       $this->update();
   }
   
   public function getTransaction($transaciton_id){
     return $this->get($transaciton_id);
   }
}