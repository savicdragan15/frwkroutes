<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of registerModuleController
 *
 * @author Dragan
 */
use Triadev\PasswordHashing\PasswordHash;
class registerModuleController extends baseController{
    private $usersModel;
    public function __construct() {
        Loader::loadModel($this, "users", "register");
        $this->usersModel = $this->models['users'];
    }

        public function index() {
        
        if(isset($_POST['register'])){
            $password = $_POST['password'];
            $re_password = $_POST['re-password'];
            $salt = $this->generateSalt(22);
            $password_hash = PasswordHash::hash($password, PASSWORD_BCRYPT, 12, $salt);
            //var_dump($password_hash);
            $data = $this->validate($_POST);
            
            if(!$this->usersModel->insertUser($data,$password_hash)){
                echo "Nije uspelo";
            }else{
                echo "Uspelo";
            }
        }
        Loader::loadView("register", "register");
    }
    
    private function generateSalt($max = 15) {
        $characterList = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*?";
        $i = 0;
        $salt = "";
        while ($i < $max) {
            $salt .= $characterList{mt_rand(0, (strlen($characterList) - 1))};
            $i++;
        }
        return $salt;
  }
}
