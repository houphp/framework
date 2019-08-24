<?php
/**
 * User: shenzhe
 * Date: 13-6-17
 */
namespace Houphp\Queue\Adapter;


use Houphp\Queue\IQueue;

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