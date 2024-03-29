<?php
/**
 * User: shenzhe
 * Date: 13-6-17
 *
 */
namespace Houphp\Rank;

use Houphp\Core\Factory as CFactory;
use Houphp\Core\Config as ZConfig;

class Factory
{
    public static function getInstance($adapter = 'Redis', $config = null)
    {
        if (empty($config)) {
            $config = ZConfig::get('rank');
            if (!empty($config['adapter'])) {
                $adapter = $config['adapter'];
            }
        }

        $className = __NAMESPACE__ . "\\Adapter\\{$adapter}";
        return CFactory::getInstance($className, $config);
    }
}