<?php

namespace Houphp\Support\Facades;

/**
 * @method static bool matchesType(string $actual, string $type)
 * @method static bool isJson()
 * @method static bool expectsJson()
 * @method static bool wantsJson()
 * @method static bool accepts(string|array $contentTypes)
 * @method static bool prefers(string|array $contentTypes)
 * @method static bool acceptsAnyContentType()
 * @method static bool acceptsJson()
 * @method static bool acceptsHtml()
 * @method static string format($default = 'html')
 * @method static string|array old(string|null $key = null, string|array|null $default = null)
 * @method static void flash()
 * @method static void flashOnly(array|mixed $keys)
 * @method static void flashExcept(array|mixed $keys)
 * @method static void flush()
 * @method static string|array|null server(string|null $key = null, string|array|null $default = null)
 * @method static bool hasHeader(string $key)
 * @method static string|array|null header(string|null $key = null, string|array|null $default = null)
 * @method static string|null bearerToken()
 * @method static bool exists(string|array $key)
 * @method static bool has(string|array $key)
 * @method static bool hasAny(string|array $key)
 * @method static bool filled(string|array $key)
 * @method static bool anyFilled(string|array $key)
 * @method static array keys()
 * @method static array all(array|mixed|null $keys = null)
 * @method static string|array|null input(string|null $key = null, string|array|null $default = null)
 * @method static array only(array|mixed $keys)
 * @method static array except(array|mixed $keys)
 * @method static string|array|null query(string|null $key = null, string|array|null $default = null)
 * @method static string|array|null post(string|null $key = null, string|array|null $default = null)
 * @method static bool hasCookie(string $key)
 * @method static string|array|null cookie(string|null $key = null, string|array|null $default = null)
 * @method static array allFiles()
 * @method static bool hasFile(string $key)
 * @method static \Houphp\Http\UploadedFile|\Houphp\Http\UploadedFile[]|array|null file(string|null $key = null, mixed $default = null)
 * @method static \Houphp\Http\Request capture()
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
 * @method static bool is(mixed ...$patterns)
 * @method static bool routeIs(mixed ...$patterns)
 * @method static bool fullUrlIs(mixed ...$patterns)
 * @method static bool ajax()
 * @method static bool pjax()
 * @method static bool prefetch()
 * @method static bool secure()
 * @method static string|null ip()
 * @method static array ips()
 * @method static string userAgent()
 * @method static \Houphp\Http\Request merge(array $input)
 * @method static \Houphp\Http\Request replace(array $input)
 * @method static \Symfony\Component\HttpFoundation\ParameterBag|mixed json(string|null $key = null, mixed $default = null)
 * @method static \Houphp\Http\Request createFrom(\Houphp\Http\Request $from, \Houphp\Http\Request|null $to = null)
 * @method static \Houphp\Http\Request createFromBase(\Symfony\Component\HttpFoundation\Request $request)
 * @method static \Houphp\Http\Request duplicate(array|null $query = null, array|null $request = null, array|null $attributes = null, array|null $cookies = null, array|null $files = null, array|null $server = null)
 * @method static mixed filterFiles(mixed $files)
 * @method static \Houphp\Session\Store session()
 * @method static \Houphp\Session\Store|null getSession()
 * @method static void setLaravelSession(\Houphp\Contracts\Session\Session $session)
 * @method static mixed user(string|null $guard = null)
 * @method static \Houphp\Routing\Route|object|string route(string|null $param = null, string|null $default = null)
 * @method static string fingerprint()
 * @method static \Houphp\Http\Request setJson(\Symfony\Component\HttpFoundation\ParameterBag $json)
 * @method static \Closure getUserResolver()
 * @method static \Houphp\Http\Request setUserResolver(\Closure $callback)
 * @method static \Closure getRouteResolver()
 * @method static \Houphp\Http\Request setRouteResolver(\Closure $callback)
 * @method static array toArray()
 * @method static bool offsetExists(string $offset)
 * @method static mixed offsetGet(string $offset)
 * @method static void offsetSet(string $offset, mixed $value)
 * @method static void offsetUnset(string $offset)
 *
 * @see \Houphp\Http\Request
 */
class Input extends Facade
{
    /**
     * Get an item from the input data.
     *
     * This method is used for all request verbs (GET, POST, PUT, and DELETE)
     *
     * @param  string|null  $key
     * @param  mixed   $default
     * @return mixed
     */
    public static function get($key = null, $default = null)
    {
        return static::$app['request']->input($key, $default);
    }

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
