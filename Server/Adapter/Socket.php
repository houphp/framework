<?php
/**
 * User: shenzhe
 * Date: 13-6-17
 */


namespace houphp\Server\Adapter;

use houphp\Protocol\Request;
use houphp\Protocol\Factory as ZProtocol;
use houphp\Socket\Factory as SFactory;
use houphp\Core\Config;
use houphp\Core\Factory as CFactory;
use houphp\Server\IServer;

class Socket implements IServer
{
    public function run()
    {
        $config = Config::get('socket');
        if (empty($config)) {
            throw new \Exception("socket config empty");
        }
        $socket = SFactory::getInstance($config['adapter'], $config);
        if (method_exists($socket, 'setClient')) {
            $client = CFactory::getInstance($config['client_class']);
            $socket->setClient($client);
        }
        Request::setServer(ZProtocol::getInstance(Config::getField('socket', 'protocol')));
        Request::setLongServer();
        Request::setHttpServer(0);
        $socket->run();
    }
}