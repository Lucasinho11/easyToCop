<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        if (!$request->name || !$request->email || !$request->password) {
            return response()->json([
                "success" => false,
                "msg" => "Veuillez remplir tous les champs"
            ], 400);
        }
        if (strlen($request->password) < 8) {
            return response()->json([
                "success" => false,
                "msg" => "Votre mot de passe doit contenir au moins 8 caractères"
            ], 400);
        }
        $exists = User::where('email', $request->email)->exists();

        if ($exists) {
            return response()->json(["msg" => "You are already registered. Please login instead."], 409);
        }
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'name' => $request->name
        ]);


        $token = $user->createToken($request->device_name)->plainTextToken;

        return response()->json([
            "token" => $token,
            "name" => $user->name,
            "email" => $user->email,
            "stripe_id" => $user->stripe_id,
            "created_at" => $user->created_at
        ], 200);
    }
}
