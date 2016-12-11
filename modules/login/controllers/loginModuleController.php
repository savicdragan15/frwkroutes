<?php
use Triadev\PasswordHashing\PasswordHash;
/**
 * @property object $_loginMdl Login model
 * @property object $_usersMdl Users model
 */
class loginModuleController extends baseController
{
    static $adminStatus = 1;
    static $userStatus = 2;
    
    private $loginModel;
    
    public function __construct() {
        //Loader::loadModel($this, "login", "login");
        $this->_callMdl("users", "register");
        //$this->loginModel = $this->models['login'];
        $this->_callMdl("login", "login");
    }
    /**
     * Login for users
     */
    public function index(){
        $this->isUserLogin();
        $message = "";
        if(isset($_POST['login'])){
            $email = $this->filter_input($_POST['email']);
            $password = $_POST['password'];
            $this->_loginMdl->email = $email;
            $user = $this->_loginMdl->getUserforLogin();
            
            if(!empty($user) && $user[0]->status == self::$userStatus){
               if(PasswordHash::verify($password, $user[0]->password)){
                   $_SESSION['user']['user_id'] = $user[0]->ID;
                   $_SESSION['user']['first_name'] = $user[0]->first_name;
                   $_SESSION['user']['last_name'] = $user[0]->last_name;
                   $_SESSION['user']['email'] = $user[0]->email;
                   $_SESSION['user']['status'] = $user[0]->status;
                   $this->_usersMdl->updateLastLogin($user[0]->ID);
                   
                   //This is scenario when user have products in cart
                   if(isset($_SESSION['korpa'])){
                       $this->redirect(_WEB_PATH."payment/index/1");
                       die;
                   }
                   
                   $this->redirect(_WEB_PATH);
               }else{
                   $message = "Neispravni podaci";
               } 
            }  else {
                   $message = "Nepostojeci korisnik";
            }
              
        }
        
        $this->template['message'] = $message;
        Loader::loadView("login", "login", false, $this->template);
    }
    
    /**
     * Check if user login
     */
    private function isUserLogin(){
        if(User::isLogin()){
            $this->redirect(_WEB_PATH);
        }
    }

    public function adminLogin(){
        if(isset($_POST['login'])){
            $email = $this->filter_input($_POST['email']);
            $password = $_POST['password'];
            $this->_loginMdl->email = $email;
            $user = $this->_loginMdl->getUserforLogin();
            
            if($user && $user[0]->status == self::$adminStatus){
               if(PasswordHash::verify($password, $user[0]->password)){
                   $_SESSION['admin']['first_name'] = $user[0]->first_name;
                   $_SESSION['admin']['last_name'] = $user[0]->last_name;
                   $_SESSION['admin']['email'] = $user[0]->email;
                   $_SESSION['admin']['status'] = $user[0]->status;
                   $this->_usersMdl->updateLastLogin($user[0]->ID);
                   
                   $this->redirect(_WEB_PATH."admin");
                   die;
                  // echo "Welcome ".$_SESSION['user']['first_name']." ".$_SESSION['user']['last_name'];
               }else{
                   echo "Neispravni podaci";
               } 
            }  else {
                echo "Nepostojeci korisnik";
            }
              
        }
        
        Loader::loadPage("login", "admin");
    }
    
    
    
    /**
     * User logout
     */
    public function logOut(){
        if(isset($_SESSION['user'])){
            Session::unsetSession("user");
        }
        $this->redirect(_WEB_PATH);
    }
    
    /**
     * Admin logout
     */
    public function adminLogOut(){
        if(isset($_SESSION['admin'])){
           Session::unsetSession("admin");
        }
        $this->redirect(_WEB_PATH."admin");
    }
}
   