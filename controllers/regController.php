<?php
namespace Controllers;
use Models\ProbaBre as ProbaMdl;
use Modules\cart\CartProba as CartModul;
use Modules\login\LoginProba as login;
use Views\Template;

class regController extends frontendController{

    public function __construct() {
       parent::__construct();
        //$this->mod=new login();
        $this->template = new Template('test_theme');
    }
    public function index()
    { 
       $this->template->setData('name', 'JJ');
       $this->template->render('index');
        
    }
}

