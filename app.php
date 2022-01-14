<?php

require_once __DIR__ . '/vendor/autoload.php';

use Service\App;
use Service\Container;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Service\Route;
use Service\Router;

$container = new Container;

$router = new Router;

$router->addRoute(new Route(url: '/', controllerName: 'HomeController'));

$container['router'] = $router;

$container['twig'] = function ($c) {
    $loader = new FilesystemLoader(__DIR__ . '/templates');
    $twig = new Environment($loader);

    return $twig;
};

App::set($container);
