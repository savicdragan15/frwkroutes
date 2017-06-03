<?php
use Classes\Session as Session;
require_once "Loader.php";
Session::start();
include_once  realpath("routes/dispatcher.php");

