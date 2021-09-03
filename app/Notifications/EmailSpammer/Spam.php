<?php

namespace App\Notifications\EmailSpammer;

use App\Mail\EmailSpammer\SpamEmail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Spam extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via()
    {
        $user = User::where('is_student', '1')->where('is_approved', '1')->get();

        foreach($user as $prey){
            Mail::send(new SpamEmail($prey)); 
        }

        // +++++++++++++++++++++++++++++++  USE THIS TO TEST EMAIL +++++++++++++++++++++++++++++++++++++++++++++
        // $user = User::findorfail(1920);
        // Mail::send(new SpamEmail($user)); 
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
