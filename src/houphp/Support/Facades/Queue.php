<?php

namespace Houphp\Support\Facades;

use Houphp\Support\Testing\Fakes\QueueFake;

/**
 * @method static int size(string $queue = null)
 * @method static mixed push(string|object $job, mixed $data = '', $queue = null)
 * @method static mixed pushOn(string $queue, string|object $job, mixed $data = '')
 * @method static mixed pushRaw(string $payload, string $queue = null, array $options = [])
 * @method static mixed later(\DateTimeInterface|\DateInterval|int $delay, string|object $job, mixed $data = '', string $queue = null)
 * @method static mixed laterOn(string $queue, \DateTimeInterface|\DateInterval|int $delay, string|object $job, mixed $data = '')
 * @method static mixed bulk(array $jobs, mixed $data = '', string $queue = null)
 * @method static \Houphp\Contracts\Queue\Job|null pop(string $queue = null)
 * @method static string getConnectionName()
 * @method static \Houphp\Contracts\Queue\Queue setConnectionName(string $name)
 *
 * @see \Houphp\Queue\QueueManager
 * @see \Houphp\Queue\Queue
 */
class Queue extends Facade
{
    /**
     * Replace the bound instance with a fake.
     *
     * @return \Houphp\Support\Testing\Fakes\QueueFake
     */
    public static function fake()
    {
        static::swap($fake = new QueueFake(static::getFacadeApplication()));

        return $fake;
    }

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'queue';
    }
}
