<?php
spl_autoload_register(function ($class) {
    require_once str_replace('\\', '/', $class). '.php';
});

define('ROOT', dirname(__FILE__));
require_once(ROOT . '/core/Router.php');
// connect url configuration
$routes = ROOT . '/Setting/Routes.php';

// run router
$router = new Router($routes);
$router->run();