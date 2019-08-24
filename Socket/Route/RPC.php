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
// | rpc方式，需扩展支持：https://github.com/laruence/yar
// +----------------------------------------------------------------------
namespace houphp\Socket\Route;

use houphp\Core\Config as ZConfig;

class RPC
{
    private $_rpc;

    public function run($data, $fd = null)
    {
        if ($this->_rpc === null) {
            $this->_rpc = new \Yar_Client(ZConfig::getField('socket', 'rpc_host'));
        }
        return $this->_rpc->api($data);

    }

}
