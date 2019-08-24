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


namespace houphp\Protocol\Adapter;

use houphp\Core\Config;
use houphp\Protocol\IProtocol;
use houphp\Common\Route as ZRoute;
use houphp\Protocol\Request;

class Http implements IProtocol
{
    /**
     * 直接 parse $_REQUEST
     * @param $_data
     * @return bool
     */
    public function parse($data)
    {
        $ctrlName = Config::getField('project', 'default_ctrl_name', 'main\\main');
        $methodName = Config::getField('project', 'default_method_name', 'main');
        $apn = Config::getField('project', 'ctrl_name', 'a');
        $mpn = Config::getField('project', 'method_name', 'm');
        if (isset($data[$apn])) {
            $ctrlName = \str_replace('/', '\\', $data[$apn]);
        }
        if (isset($data[$mpn])) {
            $methodName = $data[$mpn];
        }

        $pathInfo = Request::getPathInfo();
        if (!empty($pathInfo) && '/' !== $pathInfo) {
            $routeMap = ZRoute::match(Config::get('route', false), $pathInfo);
            if (is_array($routeMap)) {
                $ctrlName = \str_replace('/', '\\', $routeMap[0]);
                $methodName = $routeMap[1];
                if (!empty($routeMap[2]) && is_array($routeMap[2])) {
                    //参数优先
                    $data = $data + $routeMap[2];
                }
            }
        }
        Request::init($ctrlName, $methodName, $data, Config::getField('project', 'view_mode', 'Php'));
        return true;
    }
}
