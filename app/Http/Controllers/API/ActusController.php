<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class ActusController extends Controller
{
    public function index()
    {
        $actus = News::orderBy('created_at', 'DESC')->get();

        return response()->json([
                "success" => true ,
                $actus
            ], 200);
    }
    public function actu($id)
    {
        $actu =  News::where('id', $id)->get();
        if(!$actu){
            return response()->json([
                "success" => false,
                "msg"=> "Actualité introuvable"
            ], 404);
        }
        return response()->json([
            "success" => true ,
            $actu
        ], 200);
    }
}
