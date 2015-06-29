<?php

// подключаем автозагрузчик composer
require_once "vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use WebcomMediaGuestBook\Controller\MessageController;

// здесь указать абсолютный путь до корневой папки приложения
$absolutePath = '';

//назначаем аргументы для получения экземпляра entityManager
$paths = array("src/Entity/");
$isDevMode = false;

// параметры подключения к БД
$dbParams = array(
    'driver' => 'pdo_mysql',
    'user' => 'root',
    'password' => 'root',
    'dbname' => 'GuestBook',
);

// получаем entityManager
$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);

// получаем инстанс  MessageController и передаем в него entityManager
$message = new MessageController($entityManager);

// получаем инстанс загрузчика шаблонов
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('src/Resources/views/');
$twig = new Twig_Environment($loader, array('auto_reload' => true));