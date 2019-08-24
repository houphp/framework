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
namespace houphp\Server;

use houphp\Core\Factory as CFactory;

class Factory
{
    private static $_map = [
        'Ant' => 1,
        'Cli' => 1,
        'Hprose' => 1,
        'Http' => 1,
        'Rpc' => 1,
        'Socket' => 1,
    ];

    public static function getInstance($adapter = 'Http')
    {
        $adapter = ucfirst(strtolower($adapter));
        if (isset(self::$_map[$adapter])) {
            $className = __NAMESPACE__ . "\\Adapter\\{$adapter}";
        } else {
            $className = $adapter;
        }
        return CFactory::getInstance($className);
    }
}