<?php
/**
 * User: shenzhe
 * Date: 13-6-17
 */


namespace Houphp\Server\Adapter;

use Houphp\Core;
use Houphp\Server\IServer;
use Houphp\Protocol;

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