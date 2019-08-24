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

class Str extends Base
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