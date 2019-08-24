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


use houphp\Queue\IQueue;

class Php implements IQueue
{
    private $key;
    private $queue;

    public function setKey($key)
    {
        if ($this->key !== $key) {
            $this->key = $key;
            $this->queue = msg_get_queue($this->key);
        }
    }

    public function add($key, $data)
    {
        $this->setKey($key);
        return msg_send($this->queue, 1, $data);
    }

    public function get($key)
    {
        $this->setKey($key);
        msg_receive($this->queue, 0, $messageType, 1024, $data, true, MSG_IPC_NOWAIT);
        return $data;
    }
}