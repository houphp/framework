<?php

namespace Houphp\Broadcasting;

use Houphp\Contracts\Events\Dispatcher;

class PendingBroadcast
{
    /**
     * The event dispatcher implementation.
     *
     * @var \Houphp\Contracts\Events\Dispatcher
     */
    protected $events;

    /**
     * The event instance.
     *
     * @var mixed
     */
    protected $event;

    /**
     * Create a new pending broadcast instance.
     *
     * @param  \Houphp\Contracts\Events\Dispatcher  $events
     * @param  mixed  $event
     * @return void
     */
    public function __construct(Dispatcher $events, $event)
    {
        $this->event = $event;
        $this->events = $events;
    }

    /**
     * Broadcast the event to everyone except the current user.
     *
     * @return $this
     */
    public function toOthers()
    {
        if (method_exists($this->event, 'dontBroadcastToCurrentUser')) {
            $this->event->dontBroadcastToCurrentUser();
        }

        return $this;
    }

    /**
     * Handle the object's destruction.
     *
     * @return void
     */
    public function __destruct()
    {
        $this->events->dispatch($this->event);
    }
}
