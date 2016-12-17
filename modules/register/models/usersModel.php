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
        $this->city = $data['city'];
        $this->country = $data['country'];
        $this->address = $data['address'];
        $this->telephone = $data['telephone'];
        $this->zip = $data['zip'];
        $this->last_login = date("Y-m-d H:i:s",time());
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
    public function getNumberUsers(){
       $transactions = $this->getAll("count(ID) as 'all'");
       return $transactions[0]->all;
   }
   
    public function getUsers($limit,$offset){
       $this->limit = $limit;
       $this->offset = $offset;
       $this->orderBy = 'users.ID DESC';
       $this->where = "users.status = '2' OR users.status = '0' OR users.active = '1' OR users.active = '0' ";
       
       return $this->getAll();
   }
}