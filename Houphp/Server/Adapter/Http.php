<?php
/**
 * User: shenzhe
 * Date: 13-6-17
 */


namespace Houphp\Server\Adapter;

use Houphp\Core;
use Houphp\Server\IServer;
use Houphp\Protocol;

class Http implements IServer
{

    public function run()
    {
        Protocol\Request::setServer(
            Protocol\Factory::getInstance(
                Core\Config::getField('Project', 'protocol', 'Http')
            )
        );
        Protocol\Request::parse($_REQUEST);
        return Core\Route::route();
    }

}