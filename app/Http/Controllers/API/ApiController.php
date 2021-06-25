<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendMail;

class ApiController extends Controller
{
    public function sendEmail(Request $request){
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'object' => 'required|string|max:255',
            'msg_email'=>'required|min:3|max:1000'
        ]);
        Mail::to('f519cb4802-1671dd@inbox.mailtrap.io')->send(new sendMail($request));
        return redirect('/contacts');
    }
}
