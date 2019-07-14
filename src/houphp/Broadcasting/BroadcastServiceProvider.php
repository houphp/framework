<?php

namespace Houphp\Broadcasting;

use Houphp\Support\ServiceProvider;
use Houphp\Contracts\Support\DeferrableProvider;
use Houphp\Contracts\Broadcasting\Factory as BroadcastingFactory;
use Houphp\Contracts\Broadcasting\Broadcaster as BroadcasterContract;

class BroadcastServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(BroadcastManager::class, function ($app) {
            return new BroadcastManager($app);
        });

        $this->app->singleton(BroadcasterContract::class, function ($app) {
            return $app->make(BroadcastManager::class)->connection();
        });

        $this->app->alias(
            BroadcastManager::class, BroadcastingFactory::class
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            BroadcastManager::class,
            BroadcastingFactory::class,
            BroadcasterContract::class,
        ];
    }
}
