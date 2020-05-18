<?php


namespace Stankiewiczpl\RouteNav;

use Illuminate\Routing\Route;

class Link
{
    /**
     * @var Route
     */
    private $route;

    /**
     * @var $title
     */
    public $title;

    /**
     * @var $icon
     */
    public $icon;

    /**
     * @var $url
     */
    public $url;

    /**
     * Link constructor.
     * @param Route $route
     */
    public function __construct(Route $route)
    {
        $this->route = $route;
        $this->title = $this->resolveTitle();
        $this->icon = $this->route->getAction('icon');
        $this->url = $this->route->uri();
    }

    /**
     * @return string
     * TODO generate title by route parameter
     */
    private function resolveTitle(): string
    {
        return $this->route->getAction('title') ?? str_replace('.', ' ', $this->route->getName());
    }
}
