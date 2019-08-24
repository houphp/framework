<?php
/**
 * User: shenzhe
 * Date: 2014/2/7
 *
 * 内置route
 */


namespace houphp\Socket\Route;

use houphp\Protocol;
use houphp\Core;

class houphp
{
    public function run($data, $fd = null)
    {
        $server = Protocol\Factory::getInstance(Core\Config::getField('socket', 'protocol', 'Http'));
        $server->setFd($fd);
        $server->parse($data);
        return Core\Route::route($server);
    }

}
