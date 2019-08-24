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

class Zpack extends Base
{
    public function display()
    {
        $pack = new MessagePacker();
        $pack->writeString(json_encode($this->model));

        if (Request::isHttp()) {
            Response::sendHttpHeader();
            Response::header("Content-Type", "application/zpack; charset=utf-8");
        }

        if (Request::isLongServer()) {
            return array($this->model, $pack->getData());
        }
        echo $pack->getData();
        return null;


    }


}
