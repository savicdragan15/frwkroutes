<?php
require "frontendController.php";
class adminController extends frontendController{
    private $adminModule, $loginModule;
    
    public function __construct(){
        parent::__construct();
        $this->adminModule = new admnController();
        $this->loginModule = new loginController();
    }
    
    public function index(){
        $this->loginModule->index();
    }
    public function kontrolnaTabla(){
        $this->adminModule->kontrolnaTabla();
    }

    public function login(){
        $this->loginModule->login();
    }
    public function logOut(){
        $this->loginModule->logOut();
    }
    public function unos_proizvoda(){
        $this->adminModule->unos_proizvoda();
    }
    
     public function unesiProizvod(){
        $this->adminModule->unesiProizvod();
    }
    
    public function dobaviPodkategoriju(){
         $this->adminModule->dobaviPodkategoriju();
    }
    
    public function unesiSliku(){
       $this->adminModule->unesiSliku(); 
    }
    public function promeniSliku(){
        $this->adminModule->promeniSliku();
    }
    public function dobaviSliku(){
        $this->adminModule->dobaviSliku();
    }
    
    public function administracijaProizvoda(){
        $this->adminModule->administracijaProizvoda();
    }
    
     public function dobaviSveProizvode(){
        $this->adminModule->dobaviSveProizvode();
    }
    
    public function dobaviProizvodPoId(){
        $this->adminModule->dobaviProizvodPoId();
    }
    
    public function izmenaProizvoda(){
        $this->adminModule->izmenaProizvoda();
    }
}
