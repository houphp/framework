<?php

namespace Houphp\Queue\Connectors;

interface ConnectorInterface
{
    /**
     * Establish a queue connection.
     *
     * @param  array  $config
     * @return \Houphp\Contracts\Queue\Queue
     */
    public function connect(array $config);
}
