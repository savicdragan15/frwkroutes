<?php

use Kilte\Pagination\Pagination;
/**
 * Description of productsModuleController
 *
 * @author Dragan
 */

class profileModuleController extends baseController
{
    private $productsModel, $navigationModel;
    public function __construct() {
      Loader::loadModel($this, "products", "products");
      Loader::loadModel($this, "navigation");
      $this->productsModel = $this->models['products'];
      $this->navigationModel = $this->models['navigation'];
      $this->_callMdl('users', "register");
      $this->_callMdl('transactions', 'payment');
    }
    /**
     * 
     */
    public function index(){
        $this->template['scenarion'] = $scenario;
        Loader::loadView("profile", "profile", false, $this->template);
    }
    
    public function edit($scenario){
        $this->_isUserLogin();
        $this->template['transactions'] = array();
        
        $user = $this->_usersMdl->getAll("*","WHERE ID='".Session::get('user')['user_id']."' AND active=1");
        if(!empty($user))
            $user = $user[0];
        
        $this->template['user'] = $user;
        $this->template['scenario'] = $scenario;
        Loader::loadView("profile", "profile", false, $this->template);
    }
    
    public function getTransactionsByUser($page){
        $this->_isUserLogin();
        $nubmerOfRecords = $this->_transactionsMdl->getNumberTransactionsByUser(Session::get('user')['user_id']);
        
        $pagination = new Pagination($nubmerOfRecords, $page, 10 ,3);
        $offset = $pagination->offset();
        $limit = $pagination->limit();
        $transactions = $this->_transactionsMdl->getTransactionByUserId(Session::get('user')['user_id'], $limit, $offset);
        $pages = $pagination->build(); // Contains associative array with a numbers of a pages
        
        $error = true;
        $message = "Nema podataka";
        
        if(!empty($transactions)){
            $error = false;
            $message = "Success";
            
            $data = array(
              'error' => $error,
              'message' => $message,
              'transactions' => $transactions,
              'pagination' => $pages,
              'total_pages' => $pagination->totalPages(),
              'current_page' => $pagination->currentPage()
            );
            
        }else{
           $data = array(
              'error' => $error,
              'message' => $message
            ); 
        }
        
       $this->response($data);
    }
    

}