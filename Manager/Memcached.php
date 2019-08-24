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


namespace houphp\Manager;

class Memcached
{
    private static $instances;

    public static function getInstance($config)
    {
        $name = $config['name'];
        $pconnect = $config['pconnect'];
        if (empty(self::$instances[$name])) {
            if ($pconnect) {
                $memcached = new \Memcached($name);
            } else {
                $memcached = new \Memcached();
            }
            foreach ($config['servers'] as $server) {
                $memcached->addServer($server['host'], $server['port']);
            }
            self::$instances[$name] = $memcached;
        }
        return self::$instances[$name];
    }
}