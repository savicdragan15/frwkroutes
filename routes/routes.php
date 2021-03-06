<?php
/**
 * Define your routes
 */
$collector->get('/', function(){
   Loader::loadController('home','index', array());
});

$collector->get('/loginpage', function(){
   Loader::loadController('login','index', array());
});

$collector->get('products/{id}/{page}/{name}', function($id, $page, $name){
    Loader::loadController('products','allProductsByCategory', array($id, $page));
});

$collector->get('404', function(){
    Loader::loadController('home','page404');
});

$collector->post('probica', function(){
   Loader::loadController('test','test');
});
