<?php
use App\Router\Router;
use App\Http\Request;
use App\Http\Response;

require_once '../vendor/autoload.php';

$request = new Request();
$response = new Response();

$routes = require '../config/routes.php';

$router = new Router($routes, $request, $response);
$router->dispatch();
