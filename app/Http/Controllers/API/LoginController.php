<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if (!$request->email || !$request->password) {
            return response()->json([
                "success" => false,
                "msg" => "Veuillez remplir tous les champs"
            ], 400);
        }
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                "msg" => "Identifiants incorrects"
            ], 401);
        }

        $user->tokens()->where('tokenable_id',  $user->id)->delete();

        $token = $user->createToken($request->device_name)->plainTextToken;

        return response()->json([
            "token" => $token,
            "name" => $user->name,
            "email" => $user->email,
            "stripe_id" => $user->stripe_id
        ], 200);
    }
    public function logout(Request $request)
    {

        $request->user()->currentAccessToken()->delete();

        return response()->json(null, 204);
    }
}
