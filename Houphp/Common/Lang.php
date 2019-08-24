<?php
/**
 * Created by PhpStorm.
 * User: shenzhe
 * Date: 16-4-5
 * Time: 上午11:00
 */

namespace Houphp\Common;

use Houphp\Core\Config as ZConfig;


class Lang
{
    public static function get($key)
    {
        $local = ZConfig::getField('project', 'lang', 'zh_cn');
        if (isset($config['lang'][$local][$key])) {
            return $config['lang'][$local][$key];
        }

        return $key;
    }
}