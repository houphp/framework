<?php

namespace Houphp\Routing\Middleware;

use Closure;
use Houphp\Routing\Exceptions\InvalidSignatureException;

class ValidateSignature
{
    /**
     * Handle an incoming request.
     *
     * @param  \Houphp\Http\Request  $request
     * @param  \Closure  $next
     * @return \Houphp\Http\Response
     *
     * @throws \Houphp\Routing\Exceptions\InvalidSignatureException
     */
    public function handle($request, Closure $next)
    {
        if ($request->hasValidSignature()) {
            return $next($request);
        }

        throw new InvalidSignatureException;
    }
}
