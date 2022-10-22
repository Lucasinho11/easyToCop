<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sub;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\subMail;
use App\Models\User;

class SubsController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()) {
            $subs = Sub::get();
            $stripeKey = env('STRIPE_KEY');
            $intent = $request->user()->createSetupIntent();

            return view('subs', compact('subs', 'intent', 'stripeKey'));
        } else {
            return redirect('/login');
        }
    }
    public function sub()
    {
        return view('sub');
    }
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'payment_method' => 'required',
            'sub' => 'required|exists:subs,id',
            'promo' => 'nullable'
        ]);

        $sub = Sub::find($request->sub);

        // if($request->promo){
        //     $promo =  DB::table('promos_code')->where('name', $request->promo)->first();
        //     if(!$promo){
        //         $request->promo = null;
        //     }
        // }
        $subscription = DB::table('subscriptions')->where('user_id', Auth::user()->id)->first();
        if ($subscription) {
            return view('payments.already');
        }
        $user = DB::table('users')->where('id', Auth::user()->id)->first();
        try {
            $request
                ->user()
                ->newSubscription('default', $sub->stripe_id)
                ->withCoupon($request->promo)
                ->create($request->payment_method);
            Mail::to($user->email)->send(new subMail($user, $sub));
        } catch (\Throwable $th) {
            return redirect()->route('subs');
        }

        return view('payments.success');
    }
}
