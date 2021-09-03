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

    protected $test;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($test)
    {
        $this->test = $test;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // $user = User::where('is_student', '1')->where('is_approved', '1')->get();

        // foreach ($user as $prey) {
        //     Mail::send(new SpamEmail($prey));
        // }

        $test = $this->test;

        $test->notify(new Spam());

    }
}
