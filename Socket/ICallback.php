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

namespace houphp\Socket;

interface ICallback
{
    /**
     * 当socket服务启动时，回调此方法
     */
    public function onStart();

    /**
     * 当有client连接上socket服务时，回调此方法
     */
    public function onConnect();

    /**
     * 当有数据到达时，回调此方法
     */
    public function onReceive();

    /**
     * 当有client断开时，回调此方法
     */
    public function onClose();

    /**
     * 当socket服务关闭时，回调此方法
     */
    public function onShutdown();
}