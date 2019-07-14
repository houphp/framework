<?php

namespace Houphp\Contracts\Mail;

use Houphp\Contracts\Queue\Factory as Queue;

interface Mailable
{
    /**
     * Send the message using the given mailer.
     *
     * @param  \Houphp\Contracts\Mail\Mailer  $mailer
     * @return void
     */
    public function send(Mailer $mailer);

    /**
     * Queue the given message.
     *
     * @param  \Houphp\Contracts\Queue\Factory  $queue
     * @return mixed
     */
    public function queue(Queue $queue);

    /**
     * Deliver the queued message after the given delay.
     *
     * @param  \DateTimeInterface|\DateInterval|int  $delay
     * @param  \Houphp\Contracts\Queue\Factory  $queue
     * @return mixed
     */
    public function later($delay, Queue $queue);
}
