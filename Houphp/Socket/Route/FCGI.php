<?php
/**
 * User: shenzhe
 * Date: 2014/2/7
 *
 *  fcgi方式
 */


namespace Houphp\Socket\Route;

use Houphp\Core\Config as ZConfig;
use Houphp\Client\Fcgi\Client;

class FCGI
{
    private $_client;

    public function run($data, $fd = null)
    {
        if ($this->_client === null) {
            $this->_client = new Client(ZConfig::getField('socket', 'fcgi_host', '127.0.0.1'), ZConfig::getField('socket', 'fcgi_port', 9000));
        }
        return $this->_client->request($data);
    }

}
