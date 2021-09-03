<?php

namespace App\Jobs;

use App\Mail\EmailSpammer\SpamEmail;
use App\Models\User;
use App\Notifications\EmailSpammer\Spam;
use Illuminate\Support\Facades\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;


class EmailSpammer implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $prey;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($prey)
    {
        $this->prey = $prey;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // $prey = $this->prey;
        // dd("masuk job");

        $test = User::get()->first(); //random data.

        $test->notify(new Spam($this->prey));

        // $user = User::where('is_student', '1')->where('is_approved', '1')->get();

        // $test = $this->test;

        // foreach ($user as $prey) {
        // }

        // +++++++++++++++++++++++++++++++  USE THIS TO TEST EMAIL +++++++++++++++++++++++++++++++++++++++++++++
        // $user = User::findorfail(1920);
        // Mail::send(new SpamEmail($user)); 


    }
}
