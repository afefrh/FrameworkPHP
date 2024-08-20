<?php

require_once '../vendor/autoload.php';

use App\Container\Container;
use App\Router\Router;
use App\Http\Request;
use App\Http\Response;
use App\Router\Exceptions\RouteNotFoundException;

$container = new Container(require '../config/dependencies.php');
$request = $container->get(Request::class);
$response = $container->get(Response::class);

$router = new Router(require '../config/routes.php');

try {
    $route = $router->match($request);
    $controller = $container->get($route->getController());
    $action = $route->getAction();
    $controller->$action($request, $response);
} catch (RouteNotFoundException $e) {
    $response->setStatusCode(404);
    $response->setContent($e->getMessage());
    $response->send();
}
