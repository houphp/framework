<?php

namespace Houphp\Foundation\Http\Events;

class RequestHandled
{
    /**
     * The request instance.
     *
     * @var \Houphp\Http\Request
     */
    public $request;

    /**
     * The response instance.
     *
     * @var \Houphp\Http\Response
     */
    public $response;

    /**
     * Create a new event instance.
     *
     * @param  \Houphp\Http\Request  $request
     * @param  \Houphp\Http\Response  $response
     * @return void
     */
    public function __construct($request, $response)
    {
        $this->request = $request;
        $this->response = $response;
    }
}
