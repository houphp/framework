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
namespace houphp\Queue\Adapter;

use houphp\Manager;
use houphp\Queue\IQueue;

class Redis implements IQueue
{
    private $redis;

    public function __construct($config)
    {
        if (empty($this->redis)) {
            $this->redis = Manager\Redis::getInstance($config);
        }
    }

    public function add($key, $data)
    {
        return $this->redis->rPush($key, $data);
    }

    public function get($key)
    {
        return $this->redis->lPop($key);
    }

    /**
     * 批量取出并清空所有的数据
     * 需最新redis-storage支持
     * @param $key
     * @return mixed
     */
    public function getAll($key)
    {
        return $this->redis->lAll($key);
    }

}