<?php

namespace App\Http\Controllers;

use App\Jobs\EmailSpammer;
use App\Models\User;
use App\Notifications\EmailSpammer\Spam;
use Illuminate\Http\Request;
use \Carbon\Carbon;

class EmailSpammerController extends Controller
{
    public function view(){
        
        return view('admin.spammer.view');
    }

    public function spamming(){
        $test = User::get()->first(); //random data.

        $this->dispatch(new EmailSpammer($test));

        // $emailJob = (new EmailSpammer($test))->delay(Carbon::now()->addSeconds(30));

        // dispatch($emailJob);

        return redirect()->route('admin.spammer.view')->with('success', 'Email spammed successfully');
    }
}
