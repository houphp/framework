<?php

namespace Houphp\Foundation\Console;

use Houphp\Console\Command;
use Houphp\Filesystem\Filesystem;

class EventClearCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'event:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear all cached events and listeners';

    /**
     * The filesystem instance.
     *
     * @var \Houphp\Filesystem\Filesystem
     */
    protected $files;

    /**
     * Create a new config clear command instance.
     *
     * @param  \Houphp\Filesystem\Filesystem  $files
     * @return void
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    /**
     * Execute the console command.
     *
     * @return void
     *
     * @throws \RuntimeException
     */
    public function handle()
    {
        $this->files->delete($this->laravel->getCachedEventsPath());

        $this->info('Cached events cleared!');
    }
}
