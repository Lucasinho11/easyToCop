<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sub;

use Illuminate\Support\Facades\Auth;

class SubsController extends Controller
{
    public function index(Request $request)
    {
        $subs = Sub::get();
        $stripeKey = env('STRIPE_KEY');
        $intent = $request->user()->createSetupIntent();

        return view('subs', compact('subs','intent', 'stripeKey'));
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
            
        try {
            $subscription = $request
                ->user()
                ->newSubscription('default', $sub->stripe_id)
                ->withCoupon($request->promo)
                ->create($request->payment_method);
        } catch (\Laravel\Cashier\Exceptions\IncompletePayment $e) {
            return redirect()->route('cashier.payment', [
                $e->payment->id, 'redirect' => route('payments.error')
            ]);
        }

        return view('payments.success');
    }
}
