<?php
namespace Controllers;
use Models\ProbaBre as ProbaBre;
use Models\ProbaBre123 as ProbaBre123;
class Seksoman extends baseController
{
    public function __construct() {
       parent::__construct();
        //$this->mod=new login();
       $this->model=new ProbaBre();
    }
    public function index()
    {
      //  echo "Seksoman";
        echo $this->model->index();
    }
}
