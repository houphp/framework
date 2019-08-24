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