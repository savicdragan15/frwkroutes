<?php
class testController extends baseController
{
    public function __construct()
    {
        
        $this->_callMdl("navigation");
       //var_dump($nest);
       // echo $_callMdl;
    }
    public function index()
    {
        var_dump($this->_navigation->getAll());
    }
}

