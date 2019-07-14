<?php

namespace Houphp\Console;

use Houphp\Container\Container;

trait DetectsApplicationNamespace
{
    /**
     * Get the application namespace.
     *
     * @return string
     */
    protected function getAppNamespace()
    {
        return Container::getInstance()->getNamespace();
    }
}
