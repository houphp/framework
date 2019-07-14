<?php

namespace Houphp\Support\Facades;

use Houphp\Contracts\Auth\Access\Gate as GateContract;

/**
 * @method static bool has(string $ability)
 * @method static \Houphp\Contracts\Auth\Access\Gate define(string $ability, callable|string $callback)
 * @method static \Houphp\Contracts\Auth\Access\Gate policy(string $class, string $policy)
 * @method static \Houphp\Contracts\Auth\Access\Gate before(callable $callback)
 * @method static \Houphp\Contracts\Auth\Access\Gate after(callable $callback)
 * @method static bool allows(string $ability, array|mixed $arguments = [])
 * @method static bool denies(string $ability, array|mixed $arguments = [])
 * @method static bool check(iterable|string $abilities, array|mixed $arguments = [])
 * @method static bool any(iterable|string $abilities, array|mixed $arguments = [])
 * @method static \Houphp\Auth\Access\Response authorize(string $ability, array|mixed $arguments = [])
 * @method static mixed raw(string $ability, array|mixed $arguments = [])
 * @method static mixed getPolicyFor(object|string $class)
 * @method static \Houphp\Contracts\Auth\Access\Gate forUser(\Houphp\Contracts\Auth\Authenticatable|mixed $user)
 * @method static array abilities()
 *
 * @see \Houphp\Contracts\Auth\Access\Gate
 */
class Gate extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return GateContract::class;
    }
}
