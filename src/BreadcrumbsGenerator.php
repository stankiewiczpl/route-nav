<?php


namespace Stankiewiczpl\RouteNav;

use Illuminate\Routing\Route;

class BreadcrumbsGenerator
{
    /**
     * @var Route
     */
    protected $route;

    public function generate(Route $route)
    {
        $name = $route->getName();
        $names = explode('.', $name);
        foreach (explode('.', $name) as $key =>$name) {
            $names[$key] = $name. (isset($names[$key-1]) ? '.'.$names[$key-1] : '');
        }

        $crumbs = collect($names)->transform(function ($name) {
            $name = implode('.', array_reverse(explode('.', $name)));
            $route = \Illuminate\Support\Facades\Route::getRoutes()->getByName($name);
            return new Link($route);
        });

        return $crumbs;
    }
}
