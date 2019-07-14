<?php

namespace Houphp\Contracts\Redis;

interface Factory
{
    /**
     * Get a Redis connection by name.
     *
     * @param  string|null  $name
     * @return \Houphp\Redis\Connections\Connection
     */
    public function connection($name = null);
}
