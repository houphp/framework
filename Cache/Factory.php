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
namespace houphp\Cache;

use houphp\Core\Factory as ZFactory;
use houphp\Core\Config as ZConfig;

class Factory
{
    /**
     * @param string $adapter
     * @param null $config
     * @return ICache
     * @throws \Exception
     */
    public static function getInstance($adapter = 'Redis', $config = null)
    {
        if (empty($config)) {
            $config = ZConfig::get('cache');
            if (!empty($config['adapter'])) {
                $adapter = $config['adapter'];
            }
        }
        $className = __NAMESPACE__ . "\\Adapter\\{$adapter}";
        return ZFactory::getInstance($className, $config);
    }
}
