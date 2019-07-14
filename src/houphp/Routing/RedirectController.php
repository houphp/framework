<?php

namespace Houphp\Routing;

use Houphp\Http\RedirectResponse;

class RedirectController extends Controller
{
    /**
     * Invoke the controller method.
     *
     * @param  array  $args
     * @return \Houphp\Http\RedirectResponse
     */
    public function __invoke(...$args)
    {
        [$destination, $status] = array_slice($args, -2);

        return new RedirectResponse($destination, $status);
    }
}
