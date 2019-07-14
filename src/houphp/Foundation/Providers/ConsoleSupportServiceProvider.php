<?php

namespace Houphp\Foundation\Providers;

use Houphp\Support\AggregateServiceProvider;
use Houphp\Database\MigrationServiceProvider;
use Houphp\Contracts\Support\DeferrableProvider;

class ConsoleSupportServiceProvider extends AggregateServiceProvider implements DeferrableProvider
{
    /**
     * The provider class names.
     *
     * @var array
     */
    protected $providers = [
        ArtisanServiceProvider::class,
        MigrationServiceProvider::class,
        ComposerServiceProvider::class,
    ];
}
