<?php


namespace Stankiewiczpl\RouteNav\Facades;

use Illuminate\Support\Facades\Facade;
use Stankiewiczpl\RouteNav\RouteNavManager;

class RouteNav extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return RouteNavManager::class;
    }
}
