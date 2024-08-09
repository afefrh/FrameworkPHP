<?php

use App\Container\Container;
use App\Router\Router;
use App\Exceptions\RouteNotFound;
use App\Http\Request;
use App\Http\Response;

require_once '../vendor/autoload.php';

$definitions = require '../config/dependencies.php';

$container = new Container($definitions);

$request = $container->get(Request::class);
$response = $container->get(Response::class);

$routes = require '../config/routes.php';

$router = new Router($routes);

try {
    $route = $router->match($request);

    $controllerName = $route->getController();
    $action = $route->getAction();

    $controller = new $controllerName();
    $controller->$action($request, $response);
} catch (RouteNotFound $e) {
    $response->setStatusCode(404);
    $response->setContent("404 Not Found: " . $e->getMessage());
    $response->send();
}
