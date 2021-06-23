<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
