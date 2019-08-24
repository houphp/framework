<?php
/**
 * User: shenzhe
 * Date: 13-6-17
 */

namespace houphp\Serialize\Adapter;

class Php
{
    public function serialize($data)
    {
        return \serialize($data);
    }

    public function unserialize($data)
    {
        return \unserialize($data);
    }
}
