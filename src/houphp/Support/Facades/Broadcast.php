<?php

namespace Houphp\Support\Facades;

use Houphp\Contracts\Broadcasting\Factory as BroadcastingFactoryContract;

/**
 * @method static void connection($name = null);
 * @method static \Houphp\Broadcasting\Broadcasters\Broadcaster channel(string $channel, callable|string  $callback)
 * @method static mixed auth(\Houphp\Http\Request $request)
 *
 * @see \Houphp\Contracts\Broadcasting\Factory
 */
class Broadcast extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return BroadcastingFactoryContract::class;
    }
}
