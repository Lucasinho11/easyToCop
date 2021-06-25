<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendMail;

class ApiController extends Controller
{
    public function sendEmail(Request $request){
        if(!$request->email || !$request->first_name || !$request->last_name || !$request->msg_email || !$request->object){
            return response()->json([
                "success"=> false,
                "msg"=> "Veuillez remplir tous les champs"
            ], 400);
        }
        Mail::to('f519cb4802-1671dd@inbox.mailtrap.io')->send(new sendMail($request));
        return response()->json([
            "success" => true,
            "msg" => "Mail envoyé"
        ], 200);
    }
}
