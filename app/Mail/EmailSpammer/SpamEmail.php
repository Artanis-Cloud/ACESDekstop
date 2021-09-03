<?php

namespace App\Mail\EmailSpammer;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SpamEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($victim)
    {
        $this->victim = $victim;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $victim = $this->victim;
        return $this->to($victim->email, $victim->name)
            ->from(env('MAIL_FROM_ADDRESS'))
            ->subject('Jemputan Ke Program Latihan: THE ACES-ECER JOBS TRAIN AND PLACE PROGRAM')
            ->view('mail.template');
    }
}
