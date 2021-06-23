<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Drops;
use App\Models\DropsRegistrations;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class DropsController extends Controller
{
    public function index()
    {
        $drops = Drops::get();
        foreach($drops as $d){
            $d->dropTime = Carbon::parse($d->dropTime)->translatedFormat('d M Y');
        }
        return response()->json([
            "success" => true ,
            $drops
        ], 200);        
    }
    public function drop($id)
    {
        $drop =  Drops::where('id', $id)->get();
        if(!$drop){
            return response()->json([
                "success" => false ,
                "msg"=>"Drop introuvable"
            ], 404);
        }
        if(Auth::user()){
            $dropRegister = DropsRegistrations::where(['drop_id'=> $id, 'user_id' => Auth::user()->id])->get();
        }
        else{
            $dropRegister = [];
        }
        $dropCount = count($dropRegister);
        return response()->json([
            "success" => true ,
            $drop,
            $dropCount
        ], 200);
    }
    public function dropRegistering($id)
    {
        if(Auth::user()){
            $userId = Auth::user()->id;
            $drop =  Drops::where('id', $id)->get();
            $dropRegister = DropsRegistrations::create([
                'user_id' => $userId,
                'drop_id' => $id,
            ]);
            //Redirect::to('/drops/'.$id);
            $dropRegister = DropsRegistrations::where(['drop_id'=> $id, 'user_id' => Auth::user()->id])->get();
            session()->flash('message', 'success');

            $dropCount = count($dropRegister);
            return response()->json([
                "success" => true ,
                $drop,
                $dropCount
            ], 200);
        }
        else{
            return response()->json([
                "success" => false ,
                "msg"=> "Vous devez vous connecter"
            ], 403);
        }
        
    }

    
}
