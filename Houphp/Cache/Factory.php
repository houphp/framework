<?php
/**
 * author: shenzhe
 * Date: 13-6-17
 */
namespace Houphp\Cache;

use Houphp\Core\Factory as ZFactory;
use Houphp\Core\Config as ZConfig;

class Factory
{
    /**
     * @param string $adapter
     * @param null $config
     * @return ICache
     * @throws \Exception
     */
    public static function getInstance($adapter = 'Redis', $config = null)
    {
        if (empty($config)) {
            $config = ZConfig::get('cache');
            if (!empty($config['adapter'])) {
                $adapter = $config['adapter'];
            }
        }
        $className = __NAMESPACE__ . "\\Adapter\\{$adapter}";
        return ZFactory::getInstance($className, $config);
    }
}
