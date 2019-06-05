<?php

require '../vendor/autoload.php';

//Autoloader
// spl_autoload_register(function($class)
// {
//     $root = dirname(__DIR__);

//     $class = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $class);

//     require $root . DIRECTORY_SEPARATOR . "$class.php";
// });

use Core\Router;

//Pobranie adresu
$url = $_SERVER['QUERY_STRING'];

//Obiekt routingu
$router = new Router();

//dodanie routy
$router->add('{controller}/{action}');

//Tworzenie obiektu kontrolera i wywołanie akcji $controller -> action()
$router->dispatch($url);
