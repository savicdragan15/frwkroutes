<?php
error_reporting(-1);
include_once "config_poruke.php";
include_once "config_db.php";
include_once "config_module.php";
define("_DEFAULT_CONTROLLER", "home");
//define("_WEB_PATH","http://localhost:8888/all_shine_out/");
define('_WEB_PATH',"http://".$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']));
define("_COOKIE_WEB_PATH","localhost/all_shine_out/");
define("_POSTARINA",250);
define("_NEW_PRODUCT_HOME_PAGE",8);