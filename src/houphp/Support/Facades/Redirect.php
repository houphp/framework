<?php

namespace Houphp\Support\Facades;

/**
 * @method static \Houphp\Http\RedirectResponse home(int $status = 302)
 * @method static \Houphp\Http\RedirectResponse back(int $status = 302, array $headers = [], $fallback = false)
 * @method static \Houphp\Http\RedirectResponse refresh(int $status = 302, array $headers = [])
 * @method static \Houphp\Http\RedirectResponse guest(string $path, int $status = 302, array $headers = [], bool $secure = null)
 * @method static intended(string $default = '/', int $status = 302, array $headers = [], bool $secure = null)
 * @method static \Houphp\Http\RedirectResponse to(string $path, int $status = 302, array $headers = [], bool $secure = null)
 * @method static \Houphp\Http\RedirectResponse away(string $path, int $status = 302, array $headers = [])
 * @method static \Houphp\Http\RedirectResponse secure(string $path, int $status = 302, array $headers = [])
 * @method static \Houphp\Http\RedirectResponse route(string $route, array $parameters = [], int $status = 302, array $headers = [])
 * @method static \Houphp\Http\RedirectResponse action(string $action, array $parameters = [], int $status = 302, array $headers = [])
 * @method static \Houphp\Routing\UrlGenerator getUrlGenerator()
 * @method static void setSession(\Houphp\Session\Store $session)
 *
 * @see \Houphp\Routing\Redirector
 */
class Redirect extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'redirect';
    }
}
