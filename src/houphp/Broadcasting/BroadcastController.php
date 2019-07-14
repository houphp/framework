<?php

namespace Houphp\Broadcasting;

use Houphp\Http\Request;
use Houphp\Routing\Controller;
use Houphp\Support\Facades\Broadcast;

class BroadcastController extends Controller
{
    /**
     * Authenticate the request for channel access.
     *
     * @param  \Houphp\Http\Request  $request
     * @return \Houphp\Http\Response
     */
    public function authenticate(Request $request)
    {
        if ($request->hasSession()) {
            $request->session()->reflash();
        }

        return Broadcast::auth($request);
    }
}
