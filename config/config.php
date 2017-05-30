<?php

error_reporting(-1);
include_once "config_poruke.php";
include_once "config_db.php";
include_once "config_module.php";

define('_ENVIROMENT', 'DEVELOPMENT'); // DEVELOPMENT or PRODUCTION
define("_DEFAULT_CONTROLLER", "home");

define('_WEB_PATH',"http://".$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']));

define("_NEW_PRODUCT_HOME_PAGE",6);

define("_VIEWS_FOLDER", "views");
define("_FOLDER_CLASSES", "classes");

define("_VIEWS_PATH", $_SERVER['DOCUMENT_ROOT']."/all_shine_out/"._VIEWS_FOLDER);
define("_CACHE_FOLDER", $_SERVER['DOCUMENT_ROOT']."/all_shine_out/views/cache/");
