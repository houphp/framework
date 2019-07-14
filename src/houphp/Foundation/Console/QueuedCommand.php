<?php

namespace Houphp\Foundation\Console;

use Houphp\Bus\Queueable;
use Houphp\Contracts\Queue\ShouldQueue;
use Houphp\Foundation\Bus\Dispatchable;
use Houphp\Contracts\Console\Kernel as KernelContract;

class QueuedCommand implements ShouldQueue
{
    use Dispatchable, Queueable;

    /**
     * The data to pass to the Artisan command.
     *
     * @var array
     */
    protected $data;

    /**
     * Create a new job instance.
     *
     * @param  array  $data
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Handle the job.
     *
     * @param  \Houphp\Contracts\Console\Kernel  $kernel
     * @return void
     */
    public function handle(KernelContract $kernel)
    {
        call_user_func_array([$kernel, 'call'], $this->data);
    }
}
