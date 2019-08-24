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

class Amf extends Base
{
    public function display()
    {
        if (Request::isHttp()) {
            Response::sendHttpHeader();
            Response::header('Content-Type', 'application/amf; charset=utf-8');
        }
        $data = \amf3_encode($this->model);
        if (Request::isLongServer()) {
            return $data;
        }
        echo $data;
        return null;

    }
}