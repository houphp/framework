<?php

namespace Houphp\Console\Events;

class ArtisanStarting
{
    /**
     * The Artisan application instance.
     *
     * @var \Houphp\Console\Application
     */
    public $artisan;

    /**
     * Create a new event instance.
     *
     * @param  \Houphp\Console\Application  $artisan
     * @return void
     */
    public function __construct($artisan)
    {
        $this->artisan = $artisan;
    }
}
