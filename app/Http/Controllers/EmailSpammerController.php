<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\EmailSpammer\Spam;
use Illuminate\Http\Request;

class EmailSpammerController extends Controller
{
    public function view(){
        
        return view('admin.spammer.view');
    }

    public function spamming(){
        $test = User::get()->first();//random data.

        $test->notify(new Spam());

        return redirect()->route('admin.spammer.view')->with('success', 'Email spammed successfully');
    }
}
