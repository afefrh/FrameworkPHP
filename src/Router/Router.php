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
        $this->response->setStatusCode(404);
        $this->response->setContent("error 404");
        $this->response->send();
    }
}
