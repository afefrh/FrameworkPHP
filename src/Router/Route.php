<?php
namespace App\Router;

class Route
{
    private string $path;
    private string $method;
    private string $controller;
    private string $action;

    public function __construct(string $path, string $method, string $controller, string $action)
    {
        $this->path = $path;
        $this->method = $method;
        $this->controller = $controller;
        $this->action = $action;
    }

    public function match(string $uri, string $requestMethod): bool
    {
        return $this->path === $uri && $this->method === $requestMethod;
    }

    public function getController(): string
    {
        return $this->controller;
    }

    public function getAction(): string
    {
        return $this->action;
    }
}
