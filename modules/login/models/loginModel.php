<?php
namespace Modules\models\login;
use Models\baseModel;
/**
 * @property int $ID Primary key
 * @property int $first_name 
 * @property string $last_name 
 * @property string $email
 * @property string $password
 * @property string $company
 * @property string $salt
 * @property string $active
 * @property datetime $last_login
 * @property string $status
 */
class loginModel extends baseModel{
    public static $key = "id";
    public static $table = "users";
    
    public function getUserforLogin(){
      $user = $this->getAll("*","WHERE email='{$this->email}' AND active=1 limit 1");
      return $user;
    }
     public function setSessions(){
        Session::set("status", $this->status);
        Session::set("email", $this->email);
    }
    public static function logout(){
        Session::stop();
    }
    public function login(){
        $user = $this->getUserforLogin();
        if(count($user) == 1){
            $user[0]->setSessions();
            return $user[0];
        }else{
            return null;
        }
        
    }
}