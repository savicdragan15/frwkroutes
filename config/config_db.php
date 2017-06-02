<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(realpath('models')), $isDevMode);
//var_dump(__DIR__);
// or if you prefer yaml or XML
//$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
//$config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);

// the connection configuration
$conn = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'all_shine_out',
);

// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);

//$config['db']=array(
//    "host"=>"localhost",
//    "dbname"=>"all_shine_out",
//    "username"=>"root",
//    "password"=>""
//);

/*$database = new medoo([
    'database_type' => 'mysql',
    'database_name' => 'all_shine_out',
    'server' => 'localhost',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8'
]);*/

$configEloquentORM = [
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'all_shine_out',
            'username'  => 'root',
            'password'  => '',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
];

