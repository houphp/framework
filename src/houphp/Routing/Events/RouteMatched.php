<?php

namespace Houphp\Routing\Events;

class RouteMatched
{
    /**
     * The route instance.
     *
     * @var \Houphp\Routing\Route
     */
    public $route;

    /**
     * The request instance.
     *
     * @var \Houphp\Http\Request
     */
    public $request;

    /**
     * Create a new event instance.
     *
     * @param  \Houphp\Routing\Route  $route
     * @param  \Houphp\Http\Request  $request
     * @return void
     */
    public function __construct($route, $request)
    {
        $this->route = $route;
        $this->request = $request;
    }
}
