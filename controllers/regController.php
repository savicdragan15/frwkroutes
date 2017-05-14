<?php
use Models\ProbaBre as ProbaMdl;
use Modules\cart as CartModul;
class regController extends frontendController{

    public function __construct() {
       parent::__construct();
        $this->mod=new CartModul\CartProba();
     
    }
    public function index()
    { 
     //  echo 12344;
       $this->mod->index();
        
    }
}

