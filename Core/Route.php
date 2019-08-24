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
namespace houphp\Core;
use houphp\Controller\IController;
use houphp\Protocol\Request;
use houphp\Protocol\Response;
use houphp\Session\Swoole as SSESSION;

class Route
{
    public static function route()
    {
        $action = Config::get('ctrl_path', 'ctrl') . '\\' . Request::getCtrl();
        $class = Factory::getInstance($action);

        try {

            if (!($class instanceof IController)) {
                throw new \Exception("ctrl error");
            } else {
                $view = null;
                if ($class->_before()) {
                    $method = Request::getMethod();
                    if (!method_exists($class, $method)) {
                        throw new \Exception("method error");
                    }
                    $view = $class->$method();
                } else {
                    throw new \Exception($action . ':' . Request::getMethod() . ' _before() no return true');
                }
                $class->_after();
                if (Request::isLongServer()) {
                    SSESSION::save();
                }
                return Response::display($view);
            }
        } catch (\Exception $e) {
            if (Request::isLongServer()) {
                $result = \call_user_func(Config::getField('project', 'exception_handler', 'houphp\houphp::exceptionHandler'), $e);
                if ($class instanceof IController) {
                    $class->_after();
                }
                return $result;
            }
            if ($class instanceof IController) {
                $class->_after();
            }
            throw $e;
        }
    }
}
