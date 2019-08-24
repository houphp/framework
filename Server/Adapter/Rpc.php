<?php
/**
 * User: shenzhe
 * Date: 13-6-17
 */


namespace houphp\Server\Adapter;

use houphp\Core;
use houphp\Server\IServer;
use houphp\Protocol;

class Rpc implements IServer
{
    public function run()
    {
        $rpc = new \Yar_Server(new self());
        $rpc->handle();
    }

    public function api($params)
    {
        Protocol\Request::setServer(Protocol\Factory::getInstance('Rpc'));
        Protocol\Request::parse($params);
        return Core\Route::route();
    }

}