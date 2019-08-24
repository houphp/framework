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
// | 内置route
// +----------------------------------------------------------------------
namespace houphp\Socket\Route;

use houphp\Protocol;
use houphp\Core;

class houphp
{
    public function run($data, $fd = null)
    {
        $server = Protocol\Factory::getInstance(Core\Config::getField('socket', 'protocol', 'Http'));
        $server->setFd($fd);
        $server->parse($data);
        return Core\Route::route($server);
    }

}
