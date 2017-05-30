<?php
/**
 * Define your routes
 */
$collector->get('/', function(){
   Loader::loadController('home','index', array());
});

