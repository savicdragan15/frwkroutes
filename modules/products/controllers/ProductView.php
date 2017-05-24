<?php
namespace Modules\products;
use Views\ModuleTemplate;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductView
 *
 * @author WIN 7 PRO
 */
class ProductView extends \Controllers\baseController{
   
    public function __construct() {
        $this->module_template = new ModuleTemplate('test_theme', 'products');
    }
    
    public function index() {
        $this->module_template->setData('name', 'Dragan');
        $this->module_template->render('index');
    }
}
