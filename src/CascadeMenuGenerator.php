<?php


namespace Stankiewiczpl\RouteNav;

use Illuminate\Routing\Route;
use Illuminate\Routing\Router;
use Illuminate\Support\Str;

class CascadeMenuGenerator
{
    protected $router;
    protected $current;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }


    public function generate(string $menu)
    {
        $links = collect(\Route::getRoutes())->filter(function (Route $route) use ($menu) {
            return $this->filter($route, $menu);
        })->transform(function (Route $route) {
            return new Link($route);
        });
        return $links;
    }

    private function current()
    {
        return $this->current ?? $this->current = $this->router->getCurrentRoute();
    }

    private function filter(Route $route, $menu)
    {
        return (Str::startsWith($route->getName(), $this->current()->getName()))
            && ($route->getAction('menu') === $menu)
            && substr_count($this->current()->getName(), '.') + 1 === substr_count($route->getName(), '.');
    }
}
