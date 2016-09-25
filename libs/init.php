<?php
require_once "Loader.php";
require_once 'Router.php';
include_once 'interfaces.php';
include_once realpath("controllers/baseController.php");
include_once realpath("models/baseModel.php");
if(file_exists(realpath("controllers/frontendController.php")))
{
   include_once  realpath("controllers/frontendController.php");
}

Loader::loadClass('Session');
Loader::loadClass('Cookie');
Loader::loadClass('User');
Session::start();



//Loader::loadClass('Cookie');
//Cookie::set('interval', "100", "1", "/", false, false);
//Cookie::set('intervalDrugi', "100", "1", "/", false, false);
//$cookie = Cookie::get("interval");
//var_dump($cookie);
//$del = Cookie::delete("intervalDrugi");
//var_dump($del);
/**
 * $_GET['rt'] automatski setova u .htaccess fajlu regularnim izrazom
 */

$route = new Router($_GET['rt']);
$controller=$route->getController();
$method=$route->getMethod(); 
$params = $route->getParams();

Loader::loadController($controller,$method,$params);