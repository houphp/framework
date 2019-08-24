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

class Beanstalk
{
    private static $instances;

    public static function getInstance($config)
    {
        $name = $config['name'];
        if (empty(self::$instance[$name])) {
            $beanstalk = new \Beanstalk();
            foreach ($config['servers'] as $server) {
                $beanstalk->addServer($server['host'], $server['port']);
            }
            self::$instances[$name] = $beanstalk;
        }
        return self::$instances[$name];
    }
}