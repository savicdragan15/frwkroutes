<?php
require_once "Loader.php";
require_once 'Router.php';
include_once 'interfaces.php';
include_once realpath("controllers/baseController.php");
//include_once realpath("models/baseModel.php");
if(file_exists(realpath("controllers/frontendController.php")))
{
   include_once  realpath("controllers/frontendController.php");
}

Loader::loadClass('Session');
Loader::loadClass('Cookie');
Loader::loadClass('User');
Session::start();

include_once  realpath("routes/dispatcher.php");

