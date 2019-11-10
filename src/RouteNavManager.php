<?php


namespace Stankiewiczpl\RouteNav;

use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Support\HtmlString;

class RouteNavManager
{
    /**
     * @var \Illuminate\Routing\Router
     */
    protected $router;
    /**
     * @var \Illuminate\Http\Request
     */
    protected $request;
    /**
     * @var \Illuminate\Support\Collection|\Illuminate\Routing\Route[]|null
     */
    protected $routes;

    /**
     * @var BreadcrumbsGenerator
     */
    protected $breadcrumbsGenerator;

    /**
     * @var CascadeMenuGenerator
     */
    protected $cascadeMenuGenerator;

    /**
     * @var array|null The current route name and parameters.
     */
    protected $route;

    /**
     * RouteNavManager constructor.
     * @param BreadcrumbsGenerator $breadcrumbsGenerator
     * @param CascadeMenuGenerator $cascadeMenuGenerator
     * @param Router $router
     * @param Request $request
     */
    public function __construct(BreadcrumbsGenerator $breadcrumbsGenerator, CascadeMenuGenerator $cascadeMenuGenerator, Router $router, Request $request)
    {
        $this->breadcrumbsGenerator = $breadcrumbsGenerator;
        $this->cascadeMenuGenerator = $cascadeMenuGenerator;
        $this->router = $router;
        $this->request = $request;
    }

    /**
     * @param string $menu
     * @return HtmlString
     * @throws \Throwable
     */
    public function cascadeMenu(string $menu)
    {
        $links = $this->cascadeMenuGenerator->generate($menu);
        $html =  view('route-nav::menu.cascade-menu', compact('links'))->render();
        return new HtmlString($html);
    }

    /**
     * @param string $view
     * @return HtmlString
     * @throws \Throwable
     */
    public function breadcrumbs(string $view)
    {
        $crumbs = $this->breadcrumbsGenerator->generate($this->router->current());
        $html =  view($view, compact('crumbs'))->render();
        return new HtmlString($html);
    }
}
