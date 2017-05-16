<?php
namespace Controllers;
use Classes\Navigation;
use Classes\User;
class Regproba extends frontendController{

    public function __construct() {
       parent::__construct();
        //$this->mod=new login();
     
    }
    public function index()
    { 
        $user = new User();
        var_dump($user);
        $nav = new Navigation();
        echo $nav->renderNav();
      // echo 12344;
     //  $this->mod->index();
        
    }
}

