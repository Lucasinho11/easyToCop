<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function me(Request $request)
    {
        return response()->json([
            "name" => $request->user()->name,
            "email" => $request->user()->email,
            "created_at" => $request->user()->created_at,
        ], 200);
    }
    public function update(Request $request)
    {
        if(!$request->email || !$request->password || !$request->name){
            return response()->json([
                "success"=> false,
                "msg"=> "Veuillez remplir tous les champs"
            ], 400);
        }
        $user = User::where('email', $request->email)->update(['name' => $request->name,'password' => Hash::make($request->password) ]); 
        return response()->json([
            "success" => true,
            "msg" => "Compte modifié"
        ], 200);
    }

}
