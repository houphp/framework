<?php
// +----------------------------------------------------------------------
// | HOUCMS [ 厚匠科技 专注建站 APP PC 微站 小程序 WAP ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2017 http://www.houphp.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: Amos <447107108@qq.com> http://www.houjit.com
// +----------------------------------------------------------------------


namespace houphp\Server\Adapter;

use houphp\Protocol\Request;
use houphp\Protocol\Factory as ZProtocol;
use houphp\Socket\Adapter\Swoole;
use houphp\Socket\Factory as SFactory;
use houphp\Core\Config;
use houphp\Core\Factory as CFactory;
use houphp\Server\IServer;

class Ant implements IServer
{
    public function run()
    {
        $config = Config::get('socket');
        if (empty($config)) {
            throw new \Exception("socket config empty");
        }
        $socket = SFactory::getInstance(Config::getField('socket', 'adapter', 'Swoole'), $config);
        if (method_exists($socket, 'setClient')) {
            $type = Config::getField('socket', 'server_type');
            $clientClass = 'socket\Tcp';
            switch ($type) {
                case Swoole::TYPE_WEBSOCKET:
                case Swoole::TYPE_WEBSOCKETS:
                    $clientClass = 'socket\WebSocket';
                    break;
                case Swoole::TYPE_HTTP:
                case Swoole::TYPE_HTTPS:
                    $clientClass = 'socket\Http';
                    break;
                case Swoole::TYPE_UDP:
                    $clientClass = 'socket\Udp';
                    break;
            }
            $client = CFactory::getInstance(Config::getField('socket', 'client_class', $clientClass));
            $socket->setClient($client);
        }
        Request::setServer(ZProtocol::getInstance(Config::getField('socket', 'protocol', 'Ant')));
        Request::setLongServer();
        Request::setHttpServer(0);
        $socket->run();
    }
}