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

class String extends Base
{
    public function display()
    {
        if (Request::isHttp()) {
            Response::sendHttpHeader();
            Response::header("Content-Type", "text/plain; charset=utf-8");
        }

        if (\is_array($this->model) || \is_object($this->model)) {
            $data = json_encode($this->model);
        } else {
            $data = $this->model;
        }
        if (Request::isLongServer()) {
            return $data;
        }

        echo $data;
        return null;
    }
}