<?php

namespace Houphp\Contracts\Queue;

interface Factory
{
    /**
     * Resolve a queue connection instance.
     *
     * @param  string|null  $name
     * @return \Houphp\Contracts\Queue\Queue
     */
    public function connection($name = null);
}
