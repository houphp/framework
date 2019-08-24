<?php
/**
 * author: shenzhe
 * Date: 13-6-17
 * 日志输出类
 */

namespace houphp\Common;

use houphp\houphp;
use houphp\Core\Config;
use houphp\Protocol\Request;

class Log
{
    const SEPARATOR = "\t";

    public static function info($type, $params = array())
    {
        $t = \date("Ymd");
        $logPath = Config::getField('project', 'log_path', '');
        if (empty($logPath)) {
            $dir = houphp::getRootPath() . DS . 'log' . DS . $t;
        } else {
            $dir = $logPath . DS . $t;
        }
        Dir::make($dir);
        $requestId = Request::getRequestId();
        $str = \date('Y-m-d H:i:s', Config::get('now_time', time())) . self::SEPARATOR . Request::getCtrl() . '.' . Request::getMethod() . self::SEPARATOR . $requestId . self::SEPARATOR . \implode(self::SEPARATOR, array_map('houphp\Common\Log::myJson', $params));
        $logFile = $dir . \DS . $type . '.log';
        \file_put_contents($logFile, $str . "\n", FILE_APPEND | LOCK_EX);
    }

    public static function myJson($data)
    {
        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }
}
