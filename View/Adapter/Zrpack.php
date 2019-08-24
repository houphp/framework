<?php
/**
 * User: shenzhe
 * Date: 13-6-17
 *
 */


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
