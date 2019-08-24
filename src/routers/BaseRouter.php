<?php
namespace houphp\routers;
// +----------------------------------------------------------------------
// | HOUCMS [ 厚匠科技 专注建站 APP PC 微站 小程序 WAP ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2017 http://www.houphp.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: Amos <447107108@qq.com> http://www.houjit.com
// +----------------------------------------------------------------------
// | 基础模型类
// +----------------------------------------------------------------------
use Swoole\IFace\Router;

class BaseRouter implements Router
{
    function handle(&$uri)
    {
        $request = \Swoole::$php->request;
        //根据GET请求处理
        if (!empty($request->get["c"]))
        {
            $array['controller'] = $request->get["c"];
        }
        if (!empty($request->get["v"]))
        {
            $array['view'] = $request->get["v"];
        }
        //未命中路由器，返回false，继续执行下一个路由器
        return false;
    }
}