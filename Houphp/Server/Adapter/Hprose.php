<?php
/**
 * Created by PhpStorm.
 * User: lancelot
 * Date: 15-12-6
 * Time: 上午12:25
 */

namespace Houphp\Server\Adapter;

use Houphp\Protocol\Request;
use Houphp\Protocol\Factory as ZProtocol;
use Houphp\Socket\Factory as SFactory;
use Houphp\Core\Config;
use Houphp\Core\Factory as CFactory;
use Houphp\Server\IServer;

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

