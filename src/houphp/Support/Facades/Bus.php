<?php

namespace Houphp\Support\Facades;

use Houphp\Support\Testing\Fakes\BusFake;
use Houphp\Contracts\Bus\Dispatcher as BusDispatcherContract;

/**
 * @method static mixed dispatch($command)
 * @method static mixed dispatchNow($command, $handler = null)
 * @method static bool hasCommandHandler($command)
 * @method static bool|mixed getCommandHandler($command)
 * @method static \Houphp\Contracts\Bus\Dispatcher pipeThrough(array $pipes)
 * @method static \Houphp\Contracts\Bus\Dispatcher map(array $map)
 *
 * @see \Houphp\Contracts\Bus\Dispatcher
 */
class Bus extends Facade
{
    /**
     * Replace the bound instance with a fake.
     *
     * @return \Houphp\Support\Testing\Fakes\BusFake
     */
    public static function fake()
    {
        static::swap($fake = new BusFake);

        return $fake;
    }

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return BusDispatcherContract::class;
    }
}
