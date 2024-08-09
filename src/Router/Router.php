<?php
namespace App\Router;

use App\Http\Request;
use App\Exceptions\RouteNotFound;

class Router
{
    /**
     * @var array<Route>
     */
    private array $routes = [];

    /**
     * @param array<Route> $routes
     */
    public function __construct(array $routes)
    {
        foreach ($routes as $route) {
            $this->add($route);
        }
    }

    /**
     * @throws RouteNotFound
     */
    public function match(Request $request): Route
    {
        $path = $request->getUri();
        foreach ($this->routes as $route) {
            if ($route->match($path, $request->getMethod())) {
                return $route;
            }
        }

        throw new RouteNotFound('No route found for ' . $path);
    }

    public function add(Route $route): self
    {
        $this->routes[] = $route;
        return $this;
    }
}
