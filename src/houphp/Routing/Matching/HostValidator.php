<?php

namespace Houphp\Routing\Matching;

use Houphp\Http\Request;
use Houphp\Routing\Route;

class HostValidator implements ValidatorInterface
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
        if (is_null($route->getCompiled()->getHostRegex())) {
            return true;
        }

        return preg_match($route->getCompiled()->getHostRegex(), $request->getHost());
    }
}
