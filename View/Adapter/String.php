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