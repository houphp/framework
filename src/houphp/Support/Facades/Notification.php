<?php

namespace Houphp\Support\Facades;

use Houphp\Notifications\ChannelManager;
use Houphp\Notifications\AnonymousNotifiable;
use Houphp\Support\Testing\Fakes\NotificationFake;

/**
 * @method static void send(\Houphp\Support\Collection|array|mixed $notifiables, $notification)
 * @method static void sendNow(\Houphp\Support\Collection|array|mixed $notifiables, $notification)
 * @method static mixed channel(string|null $name = null)
 * @method static \Houphp\Notifications\ChannelManager locale(string|null $locale)
 *
 * @see \Houphp\Notifications\ChannelManager
 */
class Notification extends Facade
{
    /**
     * Replace the bound instance with a fake.
     *
     * @return \Houphp\Support\Testing\Fakes\NotificationFake
     */
    public static function fake()
    {
        static::swap($fake = new NotificationFake);

        return $fake;
    }

    /**
     * Begin sending a notification to an anonymous notifiable.
     *
     * @param  string  $channel
     * @param  mixed  $route
     * @return \Houphp\Notifications\AnonymousNotifiable
     */
    public static function route($channel, $route)
    {
        return (new AnonymousNotifiable)->route($channel, $route);
    }

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return ChannelManager::class;
    }
}
