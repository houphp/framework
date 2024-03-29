<?php
/**
 * author: shenzhe
 * Date: 13-6-17
 * 公用方法类
 */

namespace Houphp\Common;

class Utils
{

    /**
     * @return bool
     * @desc 是否ajax请求
     */
    public static function isAjax()
    {
        if (!empty($_REQUEST['ajax'])
            || !empty($_REQUEST['jsoncallback'])
            || (isset($_SERVER['HTTP_X_REQUESTED_WITH'])
                && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
        ) {
            return true;
        }
        return false;
    }

    /**
     *
     */
    public static function getCurrentTime()
    {

    }
}
