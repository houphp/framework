<?php
/**
 * User: shenzhe
 * Date: 13-6-17
 */


namespace Houphp\Server\Adapter;

use Houphp\Core;
use Houphp\Server\IServer;
use Houphp\Protocol;

class Cli implements IServer
{
    public function run()
    {
        $server = Protocol\Factory::getInstance('Cli');
        Protocol\Request::setServer($server);
        Protocol\Request::parse($_SERVER['argv']);
        Protocol\Request::setHttpServer(0);
        return Core\Route::route();
    }

}
