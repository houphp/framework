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