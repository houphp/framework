<?php

namespace Houphp\Support\Facades;

use Houphp\Contracts\Routing\ResponseFactory as ResponseFactoryContract;

/**
 * @method static \Houphp\Http\Response make(string $content = '', int $status = 200, array $headers = [])
 * @method static \Houphp\Http\Response noContent($status = 204, array $headers = [])
 * @method static \Houphp\Http\Response view(string $view, array $data = [], int $status = 200, array $headers = [])
 * @method static \Houphp\Http\JsonResponse json(string|array $data = [], int $status = 200, array $headers = [], int $options = 0)
 * @method static \Houphp\Http\JsonResponse jsonp(string $callback, string|array $data = [], int $status = 200, array $headers = [], int $options = 0)
 * @method static \Symfony\Component\HttpFoundation\StreamedResponse stream(\Closure $callback, int $status = 200, array $headers = [])
 * @method static \Symfony\Component\HttpFoundation\StreamedResponse streamDownload(\Closure $callback, string|null $name = null, array $headers = [], string|null $disposition = 'attachment')
 * @method static \Symfony\Component\HttpFoundation\BinaryFileResponse download(\SplFileInfo|string $file, string|null $name = null, array $headers = [], string|null $disposition = 'attachment')
 * @method static \Symfony\Component\HttpFoundation\BinaryFileResponse file($file, array $headers = [])
 * @method static \Houphp\Http\RedirectResponse redirectTo(string $path, int $status = 302, array $headers = [], bool|null $secure = null)
 * @method static \Houphp\Http\RedirectResponse redirectToRoute(string $route, array $parameters = [], int $status = 302, array $headers = [])
 * @method static \Houphp\Http\RedirectResponse redirectToAction(string $action, array $parameters = [], int $status = 302, array $headers = [])
 * @method static \Houphp\Http\RedirectResponse redirectGuest(string $path, int $status = 302, array $headers = [], bool|null $secure = null)
 * @method static \Houphp\Http\RedirectResponse redirectToIntended(string $default = '/', int $status = 302, array $headers = [], bool|null $secure = null)
 *
 * @see \Houphp\Contracts\Routing\ResponseFactory
 */
class Response extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return ResponseFactoryContract::class;
    }
}
