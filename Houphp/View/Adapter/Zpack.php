<?php
/**
 * User: shenzhe
 * Date: 13-6-17
 *
 */


namespace Houphp\View\Adapter;

use Houphp\Protocol\Request;
use Houphp\Protocol\Response;
use Houphp\View\Base;
use Houphp\Common\MessagePacker;

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
