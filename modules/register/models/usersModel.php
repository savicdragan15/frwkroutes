<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class usersModel extends baseModel{
    
    public static $table = 'users';
    public static $key = 'ID';
    
    
    public function insertUser($data,$password_hash){
        $this->first_name = $data['first_name'];
        $this->last_name = $data['last_name'];
        $this->password = $password_hash;
        $this->email = $data['email'];
        $this->company = $data['company'];
        $this->salt = $data['salt'];
        $this->status = 2;
        
        return $this->insert();
    }
    
    public function updateLastLogin($userID){
        $this->ID = (int)$userID;
        $this->last_login = date('Y-m-d H:i:s');
        $this->update();
    }
    
    public function getUserBySalt($salt){
       return $this->getAll('ID,salt', "WHERE salt='{$salt}'");
    }
    public function getUserByEmail($email){
       return $this->getAll('email', "WHERE email='{$email}'");
    }
}