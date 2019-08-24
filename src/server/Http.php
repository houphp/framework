<?php
namespace houphp\server;
class Http
{
    protected $ht = null;
    public function __construct($param)
    {
        $param['host'] = $param['host']?'127.0.0.1':$param['host'];
        $param['port'] = $param['port']?'8191':$param['port'];
        $this->http = new \swoole_websocket_server($param['host'],$param['prot']);
        $this->http->set([
            'enable_static_handler' => true,
            //'document_root' => '/www/wwwroot/linu.yeyuqian.top/swoole_http/'
        ]);
        $this->http->on("workerstart", [$this, 'onWorkerStart']);
        $this->http->on("request", [$this, 'onRequest']);
        $this->http->on("close", [$this, 'onClose']);
        $this->http->start();
    }
    /**
     * 此事件在Worker进程/Task进程启动时发生,这里创建的对象可以在进程生命周期内使用
     * 在onWorkerStart中加载框架的核心文件后
     * 1.不用每次请求都加载框架核心文件，提高性能
     * 2.可以在后续的回调中继续使用框架的核心文件或者类库
     *
     * @param $server
     * @param $worker_id
     */
    public function onWorkerStart($server,  $worker_id) {
        // 定义应用目录
        // define('APP_PATH', __DIR__ . '/../../../../application/');
        // // 加载框架里面的文件
        // require __DIR__ . '/../../../../thinkphp/base.php';

    }

    /**
     * request回调
     * 输入的变量例：$_SERVER  =  []
     * @param $request
     * @param $response
     */
    public function onRequest($request, $response) {
        $_SERVER  =  [];
        if(isset($request->server)) {
            foreach($request->server as $k => $v) {
                $_SERVER[strtoupper($k)] = $v;
            }
        }
        if(isset($request->header)) {
            foreach($request->header as $k => $v) {
                $_SERVER[strtoupper($k)] = $v;
            }
        }

        $_GET = [];// 接收get请求的参数
        if(isset($request->get)) {
            foreach($request->get as $k => $v) {
                $_GET[$k] = $v;
            }
        }
        $_POST = []; // 接收post请求的参数
        if(isset($request->post)) {
            foreach($request->post as $k => $v) {
                $_POST[$k] = $v;
            }
        }
        $_POST['http_server'] = $this->http;

        $res = 121321;
        $response->end($res);
    }
    /**
     * close
     * @param $http
     * @param $fd
     */
    public function onClose($http, $fd) {
        echo "clientid:{$fd}\n";
    }
}