<?php

class loginModel extends baseModel{
    public static $key = "id";
    public static $table = "users";
    
    public function getUserforLogin(){
      $user = $this->getAll("*","WHERE email='{$this->email}' limit 1");
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