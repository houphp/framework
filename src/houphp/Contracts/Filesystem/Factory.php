<?php

namespace Houphp\Contracts\Filesystem;

interface Factory
{
    /**
     * Get a filesystem implementation.
     *
     * @param  string|null  $name
     * @return \Houphp\Contracts\Filesystem\Filesystem
     */
    public function disk($name = null);
}
