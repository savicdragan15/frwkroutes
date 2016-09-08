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
            //var_dump($user); die;
            if($user){
               if(PasswordHash::verify($password, $user[0]->password)){
                   $_SESSION['user']['first_name'] = $user[0]->first_name;
                   $_SESSION['user']['last_name'] = $user[0]->last_name;
                   $_SESSION['user']['email'] = $user[0]->email;
//                   Session::set("first_name", $user[0]->first_name);
//                   Session::set("last_name", $user[0]->last_name);
//                   Session::set("email", $user[0]->email);
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
    public function login(){
        $data = $this->validate($_POST);
        $this->loginModel->email = $data['email'];
        $this->loginModel->sifra = md5($data['sifra']);
        $user = $this->loginModel->login();
        if($user){
          header("Location:"._WEB_PATH."admin/kontrolnaTabla");
        } else {
             header("Location:"._WEB_PATH."admin/index");
        }
       
    }
    
    
    public function logOut(){
        Session::unsetSession("user");
        $this->redirect(_WEB_PATH);
    }
}
   