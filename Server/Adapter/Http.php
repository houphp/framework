<?php
/**
 * User: shenzhe
 * Date: 13-6-17
 */


namespace houphp\Server\Adapter;

use houphp\Core;
use houphp\Server\IServer;
use houphp\Protocol;

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