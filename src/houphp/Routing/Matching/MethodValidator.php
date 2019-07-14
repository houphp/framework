<?php

namespace Houphp\Routing\Matching;

use Houphp\Http\Request;
use Houphp\Routing\Route;

class MethodValidator implements ValidatorInterface
{
    /**
     * Validate a given rule against a route and request.
     *
     * @param  \Houphp\Routing\Route  $route
     * @param  \Houphp\Http\Request  $request
     * @return bool
     */
    public function matches(Route $route, Request $request)
    {
        return in_array($request->getMethod(), $route->methods());
    }
}
