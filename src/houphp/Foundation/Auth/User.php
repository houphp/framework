<?php

namespace Houphp\Foundation\Auth;

use Houphp\Auth\Authenticatable;
use Houphp\Auth\MustVerifyEmail;
use Houphp\Database\Eloquent\Model;
use Houphp\Auth\Passwords\CanResetPassword;
use Houphp\Foundation\Auth\Access\Authorizable;
use Houphp\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Houphp\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Houphp\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, MustVerifyEmail;
}
