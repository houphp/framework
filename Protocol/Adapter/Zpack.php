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
use houphp\Common\MessagePacker;
use houphp\Protocol\IProtocol;
use houphp\Protocol\Request;

class Zpack implements IProtocol
{
    private $_buffer = [];

    /**
     * client包格式： writeString(json_encode(array("a"='main/main',"m"=>'main', 'k1'=>'v1')));
     * server包格式：包总长+数据(json_encode)
     * @param $_data
     * @return bool
     */
    public function parse($_data)
    {
        $ctrlName = Config::getField('project', 'default_ctrl_name', 'main\\main');
        $methodName = Config::getField('project', 'default_method_name', 'main');
        $fd = Request::getFd();
        if (!empty($this->_buffer[$fd])) {
            $_data = $this->_buffer . $_data;
        }
        $packData = new MessagePacker($_data);
        $packLen = $packData->readInt();
        $dataLen = \strlen($_data);
        if ($packLen > $dataLen) {
            $this->_buffer[$fd] = $_data;
            return false;
        } elseif ($packLen < $dataLen) {
            $this->_buffer[$fd] = \substr($_data, $packLen, $dataLen - $packLen);
        } else {
            if (!empty($this->_buffer[$fd])) {
                unset($this->_buffer[$fd]);
            }
        }
        $packData->resetOffset();
        $params = $packData->readString();
        $data = \json_decode($params, true);
        $apn = Config::getField('project', 'ctrl_name', 'a');
        $mpn = Config::getField('project', 'method_name', 'm');
        if (isset($params[$apn])) {
            $ctrlName = \str_replace('/', '\\', $params[$apn]);
        }
        if (isset($params[$mpn])) {
            $methodName = $params[$mpn];
        }
        Request::init($ctrlName, $methodName, $data, Config::getField('project', 'view_mode', 'Zpack'));
        return true;
    }
}