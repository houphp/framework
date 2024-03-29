<?php
/**
 * User: shenzhe
 * Date: 13-6-17
 * Json view
 */


namespace Houphp\View\Adapter;

use Houphp\Protocol\Request;
use Houphp\Protocol\Response;
use Houphp\View\Base;
use Houphp\Core\Config;

class Json extends Base
{
    public function display()
    {
        $data = \json_encode($this->model, JSON_UNESCAPED_UNICODE);
        if (Request::isHttp()) {
            Response::sendHttpHeader();
            $params = Request::getParams();
            $key = Config::getField('project', 'jsonp', 'jsoncallback');
            if (isset($params[$key])) {
                Response::header("Content-Type", 'application/x-javascript; charset=utf-8');
                $data = $params[$key] . '(' . $data . ')';
            } else {
                Response::header("Content-Type", "application/json; charset=utf-8");
            }
        }
        if (Request::isLongServer()) {
            return $data;
        }
        echo $data;
        return null;

    }


}
