<?php

namespace Houphp\Contracts\Support;

interface MessageProvider
{
    /**
     * Get the messages for the instance.
     *
     * @return \Houphp\Contracts\Support\MessageBag
     */
    public function getMessageBag();
}
