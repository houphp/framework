<?php
namespace houphp\server;
// +----------------------------------------------------------------------
// | HOUCMS [ 厚匠科技 专注建站 APP PC 微站 小程序 WAP ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2017 http://www.houphp.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: Amos <447107108@qq.com> http://www.houjit.com
// +----------------------------------------------------------------------
class Websocket
{
    CONST WS_HOST = '127.0.0.1';
    CONST WS_PORT = '9876';

    protected $ws = null;
    public function __construct()
    {
        $this->ws = new \swoole_websocket_server(self::WS_HOST,self::WS_PORT);
        $this->ws->set([
            'worker_num'  => 4,
            'reactor_num' => 4,
            //'daemonize'   => 1,
            //'log_file' => '/www/wwwroot/website/face/service/logs,
            //'heartbeat_idle_time' => 600,
            //'heartbeat_check_interval' => 60,
        ]);
        $this->ws->on('open',[$this,'onOpen']);
        $this->ws->on('message',[$this,'onMessage']);
        $this->ws->on('close',[$this,'onClose']);
        $this->ws->start();
    }

    /**
     * 监听WS连接事件
     * @param $server
     * @param $request
     *
     */

    public function onOpen($ws,$request){
        var_dump($request->fd.PHP_EOL);
    }
    //取出redis里面当前用户的信息  供onmessage调用
    public function onMessage($ws,$frame){
        echo "Receive from {$frame->fd}:{$frame->data},opcode:{$frame->opcode},finish:{$frame->finish}".PHP_EOL;
        $ws->push($frame->fd,'Server Success '.date("Y-m-d H:i:s",time()).PHP_EOL);
    }
    public function onClose($ws,$fd){
        //如果服务器中断  则销毁redis里面的值
        var_dump("Close Client:{$fd}".PHP_EOL);
    }
}