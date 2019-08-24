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

namespace houphp\Serialize\Adapter;

class Msgpack
{
    public function serialize($data)
    {
        return \msgpack_pack($data);
    }

    public function unserialize($data)
    {
        return \msgpack_unpack($data);
    }
}
