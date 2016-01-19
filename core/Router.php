<?php

class Router
{
    private $routes;
    private $_default_actaction = '/index';

    function __construct($routesPath)
    {
        $this->routes = include($routesPath);
    }

    function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }

        if (!empty($_SERVER['PATH_INFO'])) {
            return trim($_SERVER['PATH_INFO'], '/');
        }

        if (!empty($_SERVER['QUERY_STRING'])) {
            return trim($_SERVER['QUERY_STRING'], '/');
        }
    }

    function run()
    {
        $uri = $this->getURI();


        $loc = explode('/', $uri);
        if (empty ($loc[1])) {
            $uri = $uri . $this->_default_actaction;

        }

        foreach ($this->routes as $pattern => $route) {

            if (preg_match("~$pattern~", $uri)) {
                $internalRoute = preg_replace("~$pattern~", $route, $uri);
                $segments = explode('/', $internalRoute);
                $controller = ucfirst(array_shift($segments)) . 'Controller';
                $action = 'action' . ucfirst(array_shift($segments));
                $parameters = $segments;
                $controllerFile = ROOT . './controllers/' . $controller . '.php';
                if (file_exists($controllerFile) && !in_array($controller, get_declared_classes())) {
                    include($controllerFile);
                }

                if (!is_callable(array($controller, $action))) {
                    return false;
                }

                $controller = new $controller;
                call_user_func_array(array($controller, $action), $parameters);
            }
        }

        return;
    }
}