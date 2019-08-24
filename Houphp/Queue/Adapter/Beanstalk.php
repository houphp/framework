<?php
/**
 * User: shenzhe
 * Date: 13-6-17
 */
namespace Houphp\Queue\Adapter;

use Houphp\Manager;
use Houphp\Queue\IQueue;

class Beanstalk implements IQueue
{
    private $beanstalk;

    public function __construct($config)
    {
        if (empty($this->beanstalk)) {
            $this->beanstalk = Manager\Beanstalk::getInstance($config);
        }
    }

    public function add($key, $data)
    {
        return $this->beanstalk->put($key, $data);
    }

    public function get($key)
    {
        $job = $this->beanstalk->reserve($key);
        $this->beanstalk->delete($job['id'], $key);
        return $job;
    }
}