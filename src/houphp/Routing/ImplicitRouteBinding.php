<?php

namespace Houphp\Routing;

use Houphp\Support\Str;
use Houphp\Contracts\Routing\UrlRoutable;
use Houphp\Database\Eloquent\ModelNotFoundException;

class ImplicitRouteBinding
{
    /**
     * Resolve the implicit route bindings for the given route.
     *
     * @param  \Houphp\Container\Container  $container
     * @param  \Houphp\Routing\Route  $route
     * @return void
     *
     * @throws \Houphp\Database\Eloquent\ModelNotFoundException
     */
    public static function resolveForRoute($container, $route)
    {
        $parameters = $route->parameters();

        foreach ($route->signatureParameters(UrlRoutable::class) as $parameter) {
            if (! $parameterName = static::getParameterName($parameter->name, $parameters)) {
                continue;
            }

            $parameterValue = $parameters[$parameterName];

            if ($parameterValue instanceof UrlRoutable) {
                continue;
            }

            $instance = $container->make($parameter->getClass()->name);

            if (! $model = $instance->resolveRouteBinding($parameterValue)) {
                throw (new ModelNotFoundException)->setModel(get_class($instance), [$parameterValue]);
            }

            $route->setParameter($parameterName, $model);
        }
    }

    /**
     * Return the parameter name if it exists in the given parameters.
     *
     * @param  string  $name
     * @param  array  $parameters
     * @return string|null
     */
    protected static function getParameterName($name, $parameters)
    {
        if (array_key_exists($name, $parameters)) {
            return $name;
        }

        if (array_key_exists($snakedName = Str::snake($name), $parameters)) {
            return $snakedName;
        }
    }
}
