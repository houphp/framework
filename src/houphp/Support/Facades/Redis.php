<?php

namespace Houphp\Support\Facades;

/**
 * @method static \Houphp\Redis\Connections\Connection connection(string $name = null)
 *
 * @see \Houphp\Redis\RedisManager
 * @see \Houphp\Contracts\Redis\Factory
 */
class Redis extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'redis';
    }
}
