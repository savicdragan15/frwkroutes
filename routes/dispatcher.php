<?php

use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;

$collector = new RouteCollector();

require_once 'routes.php';

try {
    
    $dispatcher =  new Dispatcher($collector->getData(), null);
    echo $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], isset($_GET['rt']) ? $_GET['rt'] : '/');
    
} catch (Exception $e) {
    
    if(_ENVIROMENT == 'DEVELOPMENT'){
        var_dump($e->getMessage(), $e->getCode(), $e->getFile(), $e->getLine(), $e->getTrace());
    }else{
        echo $dispatcher->dispatch('GET', '404'), "\n";
    }
    
}