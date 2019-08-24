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

namespace houphp\Client\Async;

use houphp\Protocol\Request;

class Tcp
{

    private static $clients;

    /**
     * @param $ip
     * @param $port
     * @return \swoole_client
     */
    public static function singleton($ip, $port)
    {
        $key = "{$ip}:{$port}";
        if (empty(self::$clients[$key])) {
            self::$clients[$key] = new Tcp($ip, $port);
        }

        return self::$clients[$key];
    }

    public function __construct($ip, $port)
    {
        if (!Request::isLongServer()) {
            throw new \Exception('must long server', -1);
        }

        $client = new \swoole_client(SWOOLE_SOCK_TCP, SWOOLE_SOCK_ASYNC);
        $client->connect($ip, $port);
        return $client;
    }

}