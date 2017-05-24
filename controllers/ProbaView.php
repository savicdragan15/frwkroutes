<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controllers;
use Views\Template;
use Modules\products\ProductView;
/**
 * Description of ProbaView
 *
 * @author WIN 7 PRO
 */
class ProbaView extends baseController{
    
    public function __construct() {
        $this->template = new Template('test_theme');
        $this->productView = new ProductView();
    }
    
    public function index() {
        $this->template->setData('name', 'Jovan');
        $this->template->render('index');
    }
    
    public function theme(){
        $this->productView->index();
    }
}
