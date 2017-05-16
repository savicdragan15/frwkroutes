<?php
use Classes\Session as Session;
require_once "Loader.php";
include_once 'interfaces.php';
Session::start();
include_once  realpath("routes/dispatcher.php");

