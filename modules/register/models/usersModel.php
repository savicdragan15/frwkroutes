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
        
        return $this->insert();
    }
}