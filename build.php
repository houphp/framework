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
    require 'Common/Dir.php';
    echo "pls enter app path:".PHP_EOL;
    $app_path = trim(fgets(STDIN));

    if(is_dir($app_path)) {
        echo 'dir is exist, continue~~ pls input Y or N'.PHP_EOL;
        $ret = trim(fgets(STDIN));
        if('y' !== strtolower($ret)) {
            return;
        }
    }


    if(Common\Dir::make($app_path)) {
        $dirList = array(
            'apps'.DIRECTORY_SEPARATOR.'ctrl'.DIRECTORY_SEPARATOR.'index',
            'apps'.DIRECTORY_SEPARATOR.'entity',
            'apps'.DIRECTORY_SEPARATOR.'dao',
            'apps'.DIRECTORY_SEPARATOR.'service',
            'apps'.DIRECTORY_SEPARATOR.'common',
            'config'.DIRECTORY_SEPARATOR.'default',
            'config'.DIRECTORY_SEPARATOR.'public',
            'template',
            'public'.DIRECTORY_SEPARATOR.'static',
        );
        foreach($dirList as $realPath) {
            if(Common\Dir::make($app_path.DIRECTORY_SEPARATOR.$realPath)) {
                echo $realPath."  done...".PHP_EOL;
            }
        }
        $mainTxt = '<?php
use houphp;
$rootPath = dirname(__DIR__);
require \''.__DIR__.'\' . DIRECTORY_SEPARATOR . \'houphp.php\';
houphp::run($rootPath);';
        file_put_contents($app_path.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'index.php', $mainTxt);
        echo "index.php done...".PHP_EOL;

        $ctrlTxt = '<?php
namespace ctrl\index;
use houphp\Controller\IController,
    houphp\Core\Config,
    houphp\View;
use houphp\Protocol\Request;

class index implements IController
{

    public function _before()
    {
        return true;
    }

    public function _after()
    {
        //
    }

    public function index()
    {
        $project = Config::getField(\'project\', \'name\', \'houphp\');
        $data = $project." runing!\n";
        $params = Request::getParams();
        if(!empty($params)) {
            foreach($params as $key=>$val) {
                $data.= "key:{$key}=>{$val}\n";
            }
        }
        return $data;
    }
}

';
		file_put_contents($app_path.DIRECTORY_SEPARATOR.'apps'.DIRECTORY_SEPARATOR.'ctrl'.DIRECTORY_SEPARATOR.'index'.DIRECTORY_SEPARATOR.'index.php', $ctrlTxt);
        echo "ctrl done...".PHP_EOL;

        echo "pls enter project_name:".PHP_EOL;
    	$project_name = trim(fgets(STDIN));

       	$configTxt = '<?php

    return array(
        \'server_mode\' => (PHP_SAPI === \'cli\') ? \'Cli\' : \'Http\',
        \'app_path\'=>\'apps\',
        \'ctrl_path\'=>\'ctrl\',
        \'project\'=>array(
            \'name\'=>\''.$project_name.'\',                 
        	\'view_mode\'=>\'Str\',   		
        	\'ctrl_name\'=>\'a\',				
        	\'method_name\'=>\'m\',				
        )
    );
';
		file_put_contents($app_path.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'default'.DIRECTORY_SEPARATOR.'config.php', $configTxt);
        echo "config done...".PHP_EOL;
        echo "finish...".PHP_EOL;
    }


    return;