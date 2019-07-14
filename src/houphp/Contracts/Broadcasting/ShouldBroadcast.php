<?php

namespace Houphp\Contracts\Broadcasting;

interface ShouldBroadcast
{
    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Houphp\Broadcasting\Channel|\Houphp\Broadcasting\Channel[]
     */
    public function broadcastOn();
}
