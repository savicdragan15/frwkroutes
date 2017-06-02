<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Models;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
/**
 * Description of EloquentBaseModel
 *
 * @author WIN 7 PRO
 */
abstract class EloquentBaseModel extends Model{
    
    private $capsule;
    
    public function __construct() 
    {
        $this->capsule = new Capsule();
        $this->connect();
       
    }
    
    private function connect()
    {
        global $configEloquentORM;
        $this->capsule->addConnection($configEloquentORM);
        $this->capsule->setEventDispatcher(new Dispatcher(new Container));
        $this->capsule->setAsGlobal();
        $this->capsule->bootEloquent();
    }
}