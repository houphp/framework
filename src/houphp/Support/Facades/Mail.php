<?php

namespace Houphp\Support\Facades;

use Houphp\Support\Testing\Fakes\MailFake;

/**
 * @method static \Houphp\Mail\PendingMail to($users)
 * @method static \Houphp\Mail\PendingMail bcc($users)
 * @method static void raw(string $text, $callback)
 * @method static void send(string|array|\Houphp\Contracts\Mail\Mailable $view, array $data = [], \Closure|string $callback = null)
 * @method static array failures()
 * @method static mixed queue(string|array|\Houphp\Contracts\Mail\Mailable $view, string $queue = null)
 * @method static mixed later(\DateTimeInterface|\DateInterval|int $delay, string|array|\Houphp\Contracts\Mail\Mailable $view, string $queue = null)
 * @method static void assertSent(string $mailable, \Closure|string $callback = null)
 * @method static void assertNotSent(string $mailable, \Closure|string $callback = null)
 * @method static void assertNothingSent()
 * @method static void assertQueued(string $mailable, \Closure|string $callback = null)
 * @method static void assertNotQueued(string $mailable, \Closure|string $callback = null)
 * @method static void assertNothingQueued()
 * @method static \Houphp\Support\Collection sent(string $mailable, \Closure|string $callback = null)
 * @method static bool hasSent(string $mailable)
 * @method static \Houphp\Support\Collection queued(string $mailable, \Closure|string $callback = null)
 * @method static bool hasQueued(string $mailable)
 *
 * @see \Houphp\Mail\Mailer
 * @see \Houphp\Support\Testing\Fakes\MailFake
 */
class Mail extends Facade
{
    /**
     * Replace the bound instance with a fake.
     *
     * @return \Houphp\Support\Testing\Fakes\MailFake
     */
    public static function fake()
    {
        static::swap($fake = new MailFake);

        return $fake;
    }

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'mailer';
    }
}
