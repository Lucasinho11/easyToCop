<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function index()
    {
            if(!Auth::user()){
                return redirect('/login');
            }
            $error = '';
            $subscription = DB::table('subscriptions')->where('user_id',Auth::user()->id )->first();
            $sub = DB::table('subs')->where('stripe_id',$subscription->stripe_plan )->first();
            return view('user', ['error' => $error , 'sub' => $sub]);
    }
    public function update(Request $request)
    {
        
        if($request->email == Auth::user()->email){
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'password' => ['required', Rules\Password::defaults()],
            ]);
        }
        if($request->email != Auth::user()->email){
             $request->validate([
                'name' => 'required|string|max:255|unique:users',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => ['required', Rules\Password::defaults()],
        ]);
        }
       
        $id = Auth::user()->id;
        if (Hash::check($request->password, Auth::user()->password)) {
            if(!$request->name){
                $request->name = Auth::user()->name;
            }
            if(!$request->password){
                $request->name = Auth::user()->password;
            }
            if(!$request->email){
                $request->name = Auth::user()->email;
            }
            if($request->email == Auth::user()->email){
                $user = User::find($id)->update(['name' => $request->name,'password' => Hash::make($request->password) ]); 
                $error = '';
                return view('user', ['error' => $error ]);
            }
            //$user = User::whereId($id)->update($request->all());
            $user = User::find($id)->update(['name' => $request->name,'email' => $request->email,'password' => Hash::make($request->password) ]); 
            return view('user');
        }
        else{
            $error = 'Password not valid';
            return view('user', ['error' => $error ]);
        }
        
    }

}
