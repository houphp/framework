<?php

namespace houphp\Socket;

use houphp\Core\Factory as CFactory;

class Route
{
    public static function getInstance($adapter = 'houphp')
    {
        $className = __NAMESPACE__ . "\\Route\\{$adapter}";
        return CFactory::getInstance($className);
    }

}