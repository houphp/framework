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