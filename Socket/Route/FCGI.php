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


namespace houphp\Socket\Route;

use houphp\Core\Config as ZConfig;
use houphp\Client\Fcgi\Client;

class FCGI
{
    private $_client;

    public function run($data, $fd = null)
    {
        if ($this->_client === null) {
            $this->_client = new Client(ZConfig::getField('socket', 'fcgi_host', '127.0.0.1'), ZConfig::getField('socket', 'fcgi_port', 9000));
        }
        return $this->_client->request($data);
    }

}
