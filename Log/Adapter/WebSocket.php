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

namespace houphp\Log\Adapter;

use houphp\Log\Level;
use houphp\Log\Base;
use houphp\Core\Config as ZConfig;
use houphp\Common\WebSocketClient;


class WebSocket extends Base
{

    private $_config;
    private $_client;

    const SEPARATOR = ' | ';

    public function __construct($config)
    {
        if (!empty($config)) {
            $this->_config = $config;
        }
    }

    /**
     * @param $level
     * @param $message
     * @param array $context
     * @return bool
     * @throws \Exception
     * @desc {type} | {timeStamp} |{dateTime} | {$message}
     */
    public function log($level, $message, array $context = array())
    {
        $logLevel = ZConfig::getField('project', 'log_level', Level::ALL);
        if (Level::$levels[$level] & $logLevel) {
            $str = $level . self::SEPARATOR . $message . self::SEPARATOR . \implode(self::SEPARATOR, array_map('\houphp\Common\Log::myJson', $context));
            if (!$this->_client) {
                $this->_client = new WebSocketClient($this->_config['host'], $this->_config['port']);
                $this->_client->connect();
            }
            $this->_client->send($str);
        }
        return false;
    }

}