<?php

namespace Houphp\Foundation\Bootstrap;

use Houphp\Foundation\AliasLoader;
use Houphp\Support\Facades\Facade;
use Houphp\Foundation\PackageManifest;
use Houphp\Contracts\Foundation\Application;

class RegisterFacades
{
    /**
     * Bootstrap the given application.
     *
     * @param  \Houphp\Contracts\Foundation\Application  $app
     * @return void
     */
    public function bootstrap(Application $app)
    {
        Facade::clearResolvedInstances();

        Facade::setFacadeApplication($app);

        AliasLoader::getInstance(array_merge(
            $app->make('config')->get('app.aliases', []),
            $app->make(PackageManifest::class)->aliases()
        ))->register();
    }
}
