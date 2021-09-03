<?php

namespace App\Mail\EmailSpammer;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SpamEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $prey;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($prey)
    {
        $this->prey = $prey;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $prey = $this->prey;
        return $this->to($prey->email, $prey->name)
            ->from(env('MAIL_FROM_ADDRESS'))
            ->subject('Jemputan Ke Program Latihan')
            ->view('mail.template');
    }
}
