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


namespace houphp\Server\Adapter;

use houphp\Core;
use houphp\Server\IServer;
use houphp\Protocol;

class Rpc implements IServer
{
    public function run()
    {
        $rpc = new \Yar_Server(new self());
        $rpc->handle();
    }

    public function api($params)
    {
        Protocol\Request::setServer(Protocol\Factory::getInstance('Rpc'));
        Protocol\Request::parse($params);
        return Core\Route::route();
    }

}