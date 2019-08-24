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
namespace houphp\Socket;

use houphp\Core\Factory as CFactory;
use houphp\Core\Config as ZConfig;

class Factory
{
    private static $_map = [
        'Hprose' => 1,
        'Php' => 1,
        'React' => 1,
        'Swoole' => 1,
    ];

    public static function getInstance($adapter = 'Swoole', $config = null)
    {
        if (empty($config)) {
            $config = ZConfig::get('socket');
            if (!empty($config['adapter'])) {
                $adapter = $config['adapter'];
            }
        }
        $adapter = ucfirst(strtolower($adapter));
        if (isset(self::$_map[$adapter])) {
            $className = __NAMESPACE__ . "\\Adapter\\{$adapter}";
        } else {
            $className = $adapter;
        }
        return CFactory::getInstance($className, $config);
    }
}