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


namespace houphp\Cache\Adapter;

use houphp\Cache\ICache;

class Apc implements ICache
{
    public function enable()
    {
        return \function_exists('apcu_add');
    }

    public function selectDb($db)
    {
        return true;
    }

    public function add($key, $value, $timeOut = 0)
    {
        return \apcu_add($key, $value, $timeOut);
    }

    public function set($key, $value, $timeOut = 0)
    {
        return \apcu_store($key, $value, $timeOut);
    }

    public function get($key)
    {
        return \apcu_fetch($key);
    }

    public function delete($key)
    {
        return \apcu_delete($key);
    }

    public function increment($key, $step = 1)
    {
        return \apcu_inc($key, $step);
    }

    public function decrement($key, $step = 1)
    {
        return \apcu_dec($key, $step);
    }

    public function clear()
    {
        return \apcu_clear_cache();
    }
}