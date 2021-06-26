<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
        $id = Auth::user()->id;
        $user = User::find($id)->update(['name' => $request->name,'password' => Hash::make($request->password), 'email'=> $request->email ]); 
        return response()->json([
            "success" => true,
            "msg" => "Modifications enregistrées"
        ], 200);
    }

}
