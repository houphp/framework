<?php

namespace Houphp\Support\Facades;

/**
 * @method static \Houphp\Routing\Route get(string $uri, \Closure|array|string|callable|null $action = null)
 * @method static \Houphp\Routing\Route post(string $uri, \Closure|array|string|callable|null $action = null)
 * @method static \Houphp\Routing\Route put(string $uri, \Closure|array|string|callable|null $action = null)
 * @method static \Houphp\Routing\Route delete(string $uri, \Closure|array|string|callable|null $action = null)
 * @method static \Houphp\Routing\Route patch(string $uri, \Closure|array|string|callable|null $action = null)
 * @method static \Houphp\Routing\Route options(string $uri, \Closure|array|string|callable|null $action = null)
 * @method static \Houphp\Routing\Route any(string $uri, \Closure|array|string|callable|null $action = null)
 * @method static \Houphp\Routing\Route match(array|string $methods, string $uri, \Closure|array|string|callable|null $action = null)
 * @method static \Houphp\Routing\RouteRegistrar prefix(string  $prefix)
 * @method static \Houphp\Routing\RouteRegistrar where(array  $where)
 * @method static \Houphp\Routing\PendingResourceRegistration resource(string $name, string $controller, array $options = [])
 * @method static \Houphp\Routing\PendingResourceRegistration apiResource(string $name, string $controller, array $options = [])
 * @method static void apiResources(array $resources)
 * @method static \Houphp\Routing\RouteRegistrar middleware(array|string|null $middleware)
 * @method static \Houphp\Routing\Route substituteBindings(\Houphp\Support\Facades\Route $route)
 * @method static void substituteImplicitBindings(\Houphp\Support\Facades\Route $route)
 * @method static \Houphp\Routing\RouteRegistrar as(string $value)
 * @method static \Houphp\Routing\RouteRegistrar domain(string $value)
 * @method static \Houphp\Routing\RouteRegistrar name(string $value)
 * @method static \Houphp\Routing\RouteRegistrar namespace(string $value)
 * @method static \Houphp\Routing\Router|\Houphp\Routing\RouteRegistrar group(array|\Closure|string $attributes, \Closure|string $routes)
 * @method static \Houphp\Routing\Route redirect(string $uri, string $destination, int $status = 302)
 * @method static \Houphp\Routing\Route permanentRedirect(string $uri, string $destination)
 * @method static \Houphp\Routing\Route view(string $uri, string $view, array $data = [])
 * @method static void bind(string $key, string|callable $binder)
 * @method static void model(string $key, string $class, \Closure|null $callback = null)
 * @method static \Houphp\Routing\Route current()
 * @method static string|null currentRouteName()
 * @method static string|null currentRouteAction()
 *
 * @see \Houphp\Routing\Router
 */
class Route extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'router';
    }
}
