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

namespace houphp\Common;
use houphp\Core\Config as ZConfig;


class Lang
{
    public static function get($key)
    {
        $local = ZConfig::getField('project', 'lang', 'zh_cn');
        if (isset($config['lang'][$local][$key])) {
            return $config['lang'][$local][$key];
        }

        return $key;
    }
}