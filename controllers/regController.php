<?php
use Models\ProbaBre as ProbaMdl;
use Modules\cart\CartProba as CartModul;
use Modules\login\LoginProba as login;
class regController extends frontendController{

    public function __construct() {
       parent::__construct();
        $this->mod=new login();
     
    }
    public function index()
    { 
     //  echo 12344;
       $this->mod->index();
        
    }
}

