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
                   Session::set("first_name", $user[0]->first_name);
                   Session::set("last_name", $user[0]->last_name);
                   Session::set("email", $user[0]->email);
                   echo "Welcome ".Session::get("first_name")." ".Session::get("last_name");
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
        Session::unsetSession("first_name");
        Session::unsetSession("last_name");
        Session::unsetSession("email");
        $this->redirect(_WEB_PATH);
    }
}
   