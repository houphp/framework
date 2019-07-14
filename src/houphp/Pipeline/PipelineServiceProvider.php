<?php

namespace Houphp\Pipeline;

use Houphp\Support\ServiceProvider;
use Houphp\Contracts\Support\DeferrableProvider;
use Houphp\Contracts\Pipeline\Hub as PipelineHubContract;

class PipelineServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            PipelineHubContract::class, Hub::class
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
            PipelineHubContract::class,
        ];
    }
}
