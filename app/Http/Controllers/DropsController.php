<?php

namespace App\Http\Controllers;

use App\Models\Drops;
use App\Models\DropsRegistrations;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class DropsController extends Controller
{
    public function index()
    {

        $drops = Drops::orderBy('dropTime', 'ASC')->get();

        return view('drops', ['drops' => $drops]);
    }
    public function drop($id)
    {
        $drop =  Drops::where('id', $id)->get();
        if (Auth::user()) {
            $dropRegister = DropsRegistrations::where(['drop_id' => $id, 'user_id' => Auth::user()->id])->get();
        } else {
            $dropRegister = [];
        }
        return view('drop', ['drop' => $drop, 'dropRegister' => count($dropRegister)]);
    }
    public function dropRegistering($id)
    {
        if (Auth::user()) {
            $userId = Auth::user()->id;
            $subscription = DB::table('subscriptions')->where('user_id', $userId)->first();
            if (!$subscription) {
                return redirect('/subs');
            }
            $drop =  Drops::where('id', $id)->get();
            $dropRegister = DropsRegistrations::create([
                'user_id' => $userId,
                'drop_id' => $id,
            ]);
            //Redirect::to('/drops/'.$id);
            $dropRegister = DropsRegistrations::where(['drop_id' => $id, 'user_id' => Auth::user()->id])->get();
            session()->flash('message', 'success');

            //return redirect()->to('/drops');
            return view('drop', ['drop' => $drop, 'dropRegister' => count($dropRegister)]);
        } else {
            return redirect('/login');
        }
    }
}
