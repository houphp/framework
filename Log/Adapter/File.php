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


class File extends Base
{

    private $_config;

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
            if ($this->_config['type_file']) {
                $logFile = $this->_config['dir'] . \DS . $level . '.' . $this->_config['suffix'];
            } else {
                $logFile = $this->_config['dir'] . \DS . ZConfig::getField('project', 'project_name', 'log') . '.' . $this->_config['suffix'];
            }
            \file_put_contents($logFile, $str . "\n", FILE_APPEND | LOCK_EX);
        }
        return false;
    }

}