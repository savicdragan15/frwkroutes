<?php
/**
 * Define your routes
 */
$collector->get('/', function(){
   Loader::loadController('TestController','index', array());
});

