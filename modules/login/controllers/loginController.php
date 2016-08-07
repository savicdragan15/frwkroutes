<?php
/**
 * 
 */
class loginController extends baseController
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
        if(Session::get("status") !== '1'){
            Loader::loadView("login","login",true);
        }else{
            Loader::loadView("index","admin",true);
        }
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
        Session::unsetSession("status");
        header("Location:"._WEB_PATH."admin/index");
    }
}
   