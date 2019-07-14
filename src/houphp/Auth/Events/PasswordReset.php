<?php

namespace Houphp\Auth\Events;

use Houphp\Queue\SerializesModels;

class PasswordReset
{
    use SerializesModels;

    /**
     * The user.
     *
     * @var \Houphp\Contracts\Auth\Authenticatable
     */
    public $user;

    /**
     * Create a new event instance.
     *
     * @param  \Houphp\Contracts\Auth\Authenticatable  $user
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }
}
