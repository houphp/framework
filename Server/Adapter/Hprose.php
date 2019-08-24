<?php
/**
 * Created by PhpStorm.
 * User: lancelot
 * Date: 15-12-6
 * Time: 上午12:25
 */

namespace houphp\Server\Adapter;

use houphp\Protocol\Request;
use houphp\Protocol\Factory as ZProtocol;
use houphp\Socket\Factory as SFactory;
use houphp\Core\Config;
use houphp\Core\Factory as CFactory;
use houphp\Server\IServer;

class Hprose implements IServer
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
        Request::setHttpServer(1);
        $socket->run();
    }
}

