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
namespace houphp\View;

interface IView
{
    //存入数据
    public function setModel($model);

    //获取数据
    public function getModel();
    //删除该方法  , Base抽象类 未实现该方法  change by ahuo 2013-09-12 21:49
    //function display();

    //渲染数据
    public function render();
}
