<?php
/**
 * 
 */
use Triadev\PasswordHashing\PasswordHash;
class loginModuleController extends baseController
{
    private $loginModel;
    public function __construct() {
        Loader::loadModel($this, "login", "login");
        $this->_callMdl("users", "register");
        $this->loginModel = $this->models['login'];
    }
    /**
     * 
     */
    public function index(){
        
        if(isset($_POST['login'])){
            $email = $this->filter_input($_POST['email']);
            $password = $_POST['password'];
            $this->loginModel->email = $email;
            $user = $this->loginModel->getUserforLogin();
            
            if($user){
               if(PasswordHash::verify($password, $user[0]->password)){
                   $_SESSION['user']['first_name'] = $user[0]->first_name;
                   $_SESSION['user']['last_name'] = $user[0]->last_name;
                   $_SESSION['user']['email'] = $user[0]->email;
                   $_SESSION['user']['status'] = $user[0]->status;
                   $this->_usersMdl->updateLastLogin($user[0]->ID);
                   
                   //This is scenario when status user 1 means admin
                   if( $_SESSION['user']['status'] == 1){
                       $this->redirect(_WEB_PATH."admin");
                       die;
                   }
                   
                   //This is scenario when user have products in cart
                   if(isset($_SESSION['korpa'])){
                       $this->redirect(_WEB_PATH."payment/paymentOption/1");
                       die;
                   }
                   
                   echo "Welcome ".$_SESSION['user']['first_name']." ".$_SESSION['user']['last_name'];
               }else{
                   echo "Neispravni podaci";
               } 
            }  else {
                echo "Nepostojeci korisnik";
            }
              
        }
         
        Loader::loadView("login", "login");
    }
    
    
    
    /**
     * 
     */
    public function logOut(){
        
        if( $_SESSION['user']['status'] == 1){
           Session::unsetSession("user");
           $this->redirect(_WEB_PATH."admin"); 
           die;
        }
        
        Session::unsetSession("user");
        $this->redirect(_WEB_PATH);
    }
}
   