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

namespace houphp\Queue;

interface IQueue
{
    /**
     * @param $key
     * @return mixed
     * @desc 取出队头数据
     */
    public function get($key);

    /**
     * @param $key
     * @param $data
     * @return mixed
     * @desc 向队尾里添加数据
     */
    public function add($key, $data);
}