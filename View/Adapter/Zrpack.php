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


namespace houphp\View\Adapter;

use houphp\Protocol\Request;
use houphp\Protocol\Response;
use houphp\View\Base;
use houphp\Common\MessagePacker;

class Zrpack extends Base
{
    public function display()
    {
        $jsonData = \json_encode($this->model);
        $data = gzencode($jsonData);
        $pack = new MessagePacker();
        $len = strlen($data);
        $pack->writeInt($len + 16);
        $pack->writeInt($this->model['cmd']);
        $pack->writeInt($this->model['rid']);
        $pack->writeString($data, $len);
        if (Request::isHttp()) {
            Response::sendHttpHeader();
            Response::header("Content-Type", "application/zrpack; charset=utf-8");
        }
        if (Request::isLongServer()) {
            return array(
                $jsonData, $pack->getData()
            );
        }
        echo $pack->getData();
        return null;
    }

}
