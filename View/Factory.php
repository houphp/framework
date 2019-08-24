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
namespace houphp\View;

use houphp\Core\Factory as CFactory;

class Factory
{
    private static $_map = [
        'Amf' => 1,
        'Ant' => 1,
        'Json' => 1,
        'Php' => 1,
        'Str' => 1,
        'String' => 1,
        'Xml' => 1,
        'Zpack' => 1,
        'Zrpack' => 1,
    ];

    public static function getInstance($adapter = 'Json')
    {
        $adapter = ucfirst(strtolower($adapter));
        if ('String' == $adapter) {
            $adapter = 'Str';
        }
        if (isset(self::$_map[$adapter])) {
            $className = __NAMESPACE__ . "\\Adapter\\{$adapter}";
        } else {
            $className = $adapter;
        }
        return CFactory::getInstance($className);
    }
}