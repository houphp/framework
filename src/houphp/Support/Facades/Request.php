<?php

namespace Houphp\Support\Facades;

/**
 * @method static \Houphp\Http\Request instance()
 * @method static string method()
 * @method static string root()
 * @method static string url()
 * @method static string fullUrl()
 * @method static string fullUrlWithQuery(array $query)
 * @method static string path()
 * @method static string decodedPath()
 * @method static string|null segment(int $index, string|null $default = null)
 * @method static array segments()
 * @method static bool is(...$patterns)
 * @method static bool routeIs(...$patterns)
 * @method static bool fullUrlIs(...$patterns)
 * @method static bool ajax()
 * @method static bool pjax()
 * @method static bool secure()
 * @method static string ip()
 * @method static array ips()
 * @method static string userAgent()
 * @method static \Houphp\Http\Request merge(array $input)
 * @method static \Houphp\Http\Request replace(array $input)
 * @method static \Symfony\Component\HttpFoundation\ParameterBag|mixed json(string $key = null, $default = null)
 * @method static \Houphp\Session\Store session()
 * @method static \Houphp\Session\Store|null getSession()
 * @method static void setLaravelSession(\Houphp\Contracts\Session\Session $session)
 * @method static mixed user(string|null $guard = null)
 * @method static \Houphp\Routing\Route|object|string route(string|null $param = null)
 * @method static string fingerprint()
 * @method static \Houphp\Http\Request setJson(\Symfony\Component\HttpFoundation\ParameterBag $json)
 * @method static \Closure getUserResolver()
 * @method static \Houphp\Http\Request setUserResolver(\Closure $callback)
 * @method static \Closure getRouteResolver()
 * @method static \Houphp\Http\Request setRouteResolver(\Closure $callback)
 * @method static array toArray()
 * @method static bool offsetExists(string $offset)
 * @method static mixed offsetGet(string $offset)
 * @method static void offsetSet(string $offset, $value)
 * @method static void offsetUnset(string $offset)
 *
 * @see \Houphp\Http\Request
 */
class Request extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'request';
    }
}
