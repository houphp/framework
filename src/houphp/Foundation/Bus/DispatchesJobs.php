<?php

namespace Houphp\Foundation\Bus;

use Houphp\Contracts\Bus\Dispatcher;

trait DispatchesJobs
{
    /**
     * Dispatch a job to its appropriate handler.
     *
     * @param  mixed  $job
     * @return mixed
     */
    protected function dispatch($job)
    {
        return app(Dispatcher::class)->dispatch($job);
    }

    /**
     * Dispatch a job to its appropriate handler in the current process.
     *
     * @param  mixed  $job
     * @return mixed
     */
    public function dispatchNow($job)
    {
        return app(Dispatcher::class)->dispatchNow($job);
    }
}
