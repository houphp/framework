<?php

namespace Houphp\Auth\Events;

use Houphp\Http\Request;

class Lockout
{
    /**
     * The throttled request.
     *
     * @var \Houphp\Http\Request
     */
    public $request;

    /**
     * Create a new event instance.
     *
     * @param  \Houphp\Http\Request  $request
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}
