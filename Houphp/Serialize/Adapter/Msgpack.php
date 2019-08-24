<?php
/**
 * User: shenzhe
 * Date: 13-6-17
 */

namespace Houphp\Serialize\Adapter;

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
