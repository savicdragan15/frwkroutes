<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of User
 *
 * @author Dragan
 */
class User {
    
    /**
     * Cheack if user login
     * @return boolean
     */
    public static function isLogin(){
        $usr=Session::get('user');
        if(!empty($usr)){
            return true;
        }
        return false;
        
    }
}
