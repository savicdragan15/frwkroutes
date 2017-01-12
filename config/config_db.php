<?php
$config['db']=array(
    "host"=>"localhost",
    "dbname"=>"all_shine_out",
    "username"=>"root",
    "password"=>""
);

$database = new medoo([
    'database_type' => 'mysql',
    'database_name' => 'all_shine_out',
    'server' => 'localhost',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8'
]);

