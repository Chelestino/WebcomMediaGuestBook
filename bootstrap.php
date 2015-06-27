<?php

// bootstrap.php
require_once "vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array("src/Entity/");
$isDevMode = false;

// the connection configuration
$dbParams = array(
    'driver' => 'pdo_mysql',
    'user' => 'root',
    'password' => 'zxfw3zdY',
    'dbname' => 'GuestBook',
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);


Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('src/Resources/views/');

$twig = new Twig_Environment($loader, array('auto_reload' => true));