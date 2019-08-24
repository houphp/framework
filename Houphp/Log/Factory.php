<?php
namespace Houphp\Log;

use Houphp\Core\Factory as CFactory;
use Houphp\Core\Config as ZConfig;

class Factory
{
    /**
     * @param string $adapter
     * @param null $config
     * @return mixed
     * @throws \Exception
     */
    public static function getInstance($adapter = 'File', $config = null)
    {
        if (empty($config)) {
            $config = ZConfig::get('log');
            if (!empty($config['adapter'])) {
                $adapter = $config['adapter'];
            }
        }
        $className = __NAMESPACE__ . "\\Adapter\\{$adapter}";
        return CFactory::getInstance($className, $config);
    }
}
