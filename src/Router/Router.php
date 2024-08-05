<?php
namespace App\Router;

use App\Http\Request;
use App\Http\Response;

class Router
{
    private $routes;
    private $request;
    private $response;

    public function __construct(array $routes, Request $request, Response $response)
    {
        $this->routes = $routes;
        $this->request = $request;
        $this->response = $response;
    }

    public function dispatch()
    {
        $uri = $this->request->getUri();

        if (isset($this->routes[$uri])) {
            list($controllerName, $action) = explode('@', $this->routes[$uri]);
            $controllerClass = "App\\Controller\\{$controllerName}";

            if (class_exists($controllerClass)) {
                $controller = new $controllerClass($this->request, $this->response);
                if (method_exists($controller, $action)) {
                    $controller->$action();
                    return;
                }
            }
        }

        $this->response->setStatusCode(404);
        $this->response->setContent("404 Not Found");
        $this->response->send();
    }
}
