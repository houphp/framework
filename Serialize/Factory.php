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

namespace houphp\Serialize;

use houphp\Core\Factory as CFactory;

class Factory
{
    public static function getInstance($adapter = 'Php')
    {
        $className = __NAMESPACE__ . "\\Adapter\\{$adapter}";
        return CFactory::getInstance($className);
    }

    public static function serialize($adapter = 'Php', $data)
    {
        $class = self::getInstance($adapter);
        return $class->serialize($data);
    }

    public static function unserialize($adapter = 'Php', $data)
    {
        $class = self::getInstance($adapter);
        return $class->unserialize($data);
    }
}
