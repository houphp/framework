<?php

namespace Houphp\Socket;

use Houphp\Core\Factory as CFactory;

class Route
{
    public static function getInstance($adapter = 'Houphp')
    {
        $className = __NAMESPACE__ . "\\Route\\{$adapter}";
        return CFactory::getInstance($className);
    }

}