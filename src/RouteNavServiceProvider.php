<?php

namespace Stankiewiczpl\RouteNav;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Route;

class RouteNavServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../views/', 'route-nav');
    }

    public function register()
    {
        if (!Route::hasMacro('menu')) {
            Route::macro('menu', function ($menu) {
                $this->action['menu'] = $menu;
                return $this;
            });
        }

        if (!Route::hasMacro('icon')) {
            Route::macro('icon', function ($title) {
                $this->action['icon'] = $title;
                return $this;
            });
        }
        if (!Route::hasMacro('title')) {
            Route::macro('title', function ($title) {
                $this->action['title'] = $title;
                return $this;
            });
        }
    }
}
