<?php
namespace Controllers;
use Models\ProbaBre as ProbaBre;
use Classes\Seksoklasa as Seksoklasa;
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
      //  echo $this->model->index();
        $s=new Seksoklasa();
        $s->proba();
    }
}
