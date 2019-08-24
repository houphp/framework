<?php
/**
 * User: shenzhe
 * Date: 2014/2/7
 *
 * 内置route
 */


namespace Houphp\Socket\Route;

use Houphp\Protocol;
use Houphp\Core;

class Houphp
{
    public function run($data, $fd = null)
    {
        $server = Protocol\Factory::getInstance(Core\Config::getField('socket', 'protocol', 'Http'));
        $server->setFd($fd);
        $server->parse($data);
        return Core\Route::route($server);
    }

}
