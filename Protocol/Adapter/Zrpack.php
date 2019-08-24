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
use houphp\Cache\Factory as ZCache;
use houphp\Common\Route as ZRoute;
use houphp\Protocol\Request;

class Zrpack implements IProtocol
{
    private $_cache;

    /**
     * 包格式： 包总长+命令id+请求id+数据
     *
     * @param $_data
     * @return bool
     */
    public function parse($_data)
    {
        $ctrlName = Config::getField('project', 'default_ctrl_name', 'main\\main');
        $methodName = Config::getField('project', 'default_method_name', 'main');
        if (empty($this->_cache)) {
            $this->_cache = ZCache::getInstance('Php');
        }
        $fd = Request::getFd();
        $cacheData = $this->_cache->get($fd);
        if (!empty($cacheData)) {
            $_data = $cacheData . $_data;
            $this->_cache->delete($fd);
        }
        if (empty($_data)) {
            return false;
        }
        $packData = new MessagePacker($_data);
        $packLen = $packData->readInt();
        $dataLen = \strlen($_data);
        if ($packLen > $dataLen) {
            $this->_cache->set($fd, $_data);
            return false;
        } elseif ($packLen < $dataLen) {
            $this->_cache->set($fd, \substr($_data, $packLen, $dataLen - $packLen));
        }
        $packData->resetOffset(4);
        $data = [];
        $data['_cmd'] = $packData->readInt();
        $pathinfo = Config::getField('cmdlist', $data['_cmd']);
        $data['_rid'] = $packData->readInt();
        $params = $packData->readString();
        $unpackData = \json_decode(gzdecode($params), true);
        if (!empty($unpackData) && \is_array($unpackData)) {
            $data += $unpackData;
        }
        $routeMap = ZRoute::match(Config::get('route', false), $pathinfo);
        if (is_array($routeMap)) {
            $ctrlName = $routeMap[0];
            $methodName = $routeMap[1];
            if (!empty($routeMap[2]) && is_array($routeMap[2])) {
                //参数优先
                $data = $data + $routeMap[2];
            }
        }
        Request::init($ctrlName, $methodName, $data, Config::getField('project', 'view_mode', 'Zpack'));
        return true;
    }
}