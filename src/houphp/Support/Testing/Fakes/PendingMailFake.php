<?php

namespace Houphp\Support\Testing\Fakes;

use Houphp\Mail\PendingMail;
use Houphp\Contracts\Mail\Mailable;

class PendingMailFake extends PendingMail
{
    /**
     * Create a new instance.
     *
     * @param  \Houphp\Support\Testing\Fakes\MailFake  $mailer
     * @return void
     */
    public function __construct($mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Send a new mailable message instance.
     *
     * @param  \Houphp\Contracts\Mail\Mailable $mailable;
     * @return mixed
     */
    public function send(Mailable $mailable)
    {
        return $this->sendNow($mailable);
    }

    /**
     * Send a mailable message immediately.
     *
     * @param  \Houphp\Contracts\Mail\Mailable $mailable;
     * @return mixed
     */
    public function sendNow(Mailable $mailable)
    {
        $this->mailer->send($this->fill($mailable));
    }

    /**
     * Push the given mailable onto the queue.
     *
     * @param  \Houphp\Contracts\Mail\Mailable $mailable;
     * @return mixed
     */
    public function queue(Mailable $mailable)
    {
        return $this->mailer->queue($this->fill($mailable));
    }
}
