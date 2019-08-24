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

class Xml extends Base
{
    public function xmlEncode()
    {
        $xml = '<?xml version="1.0" encoding="utf-8"?>';
        $xml .= "\n<root>\n";
        $xml .= $this->dataToXml($this->model);
        $xml .= "</root>\n";
        return $xml;
    }

    private function dataToXml($data)
    {
        $xml = "";
        foreach ($data as $key => $val) {
            \is_numeric(\substr($key, 0, 1)) && $key = "item id=\"$key\"";
            $xml .= "<{$key}>";
            $xml .= (\is_array($val) || \is_object($val)) ? $this->dataToXml($val) : $val;
            list($key) = \explode(' ', $key);
            $xml .= "</{$key}>\n";
        }

        return $xml;
    }

    public function display()
    {
        if (Request::isHttp()) {
            Response::sendHttpHeader();
            Response::header("Content-Type", "text/xml; charset=utf-8");
        }
        $data = $this->xmlEncode();

        if (Request::isLongServer()) {
            return $data;
        }

        echo $data;
        return null;


    }
}