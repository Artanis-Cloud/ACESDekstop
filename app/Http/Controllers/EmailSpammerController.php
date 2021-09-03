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
        //done
        $user = User::where('is_student', '1')->where('is_approved', '1')->where('email', 'not like', '%aces%')->where('email', 'not like', '%uitm%')->where('email', 'not like', '%ecerdc%')->get(); //done

        foreach ($user as $prey) {
            $this->dispatch(new EmailSpammer($prey));
        }


        return redirect()->route('admin.spammer.view')->with('success', 'Email spammed successfully');
    }
}
