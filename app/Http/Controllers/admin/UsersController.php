<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{
    public function list()
    {
        if (Auth::user() && Auth::user()->is_admin) {
            $users = User::get();
            $subs = DB::table('subscriptions')->get();
            foreach ($users as $u) {
                foreach ($subs as $s) {
                    if ($u->id == $s->user_id) {
                        $sub = DB::table('subs')->where('stripe_id', $s->stripe_plan)->get()->first();
                        $u->sub = $sub->name;
                    }
                }
            }
            return view('admin/userList', ['users' => $users]);
        } else {
            return redirect('/');
        }
    }
    public function delete($id)
    {
        if (Auth::user() && Auth::user()->is_admin) {
            $user = User::where('id', $id)->delete();
            return redirect('/admin/users/list');
        } else {
            return redirect('/');
        }
    }
    public function edit($id)
    {
        if (Auth::user() && Auth::user()->is_admin) {
            $user = User::where('id', $id)->get();
            return view('admin/userEdit', ['user' => $user]);
        } else {
            return redirect('/');
        }
    }
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect('/admin/users/list');
    }
    public function editUser(Request $request, $id)
    {
        $user = User::where('id', $id)->get();
        foreach ($user as $u) {
            $userEmail = $u->email;
        }
        if ($request->email == $userEmail) {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'password' => ['required', Rules\Password::defaults()],
            ]);
        }
        if ($request->email != $userEmail) {
            $request->validate([
                'name' => 'required|string|max:255|unique:users',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => ['required', Rules\Password::defaults()],
            ]);
        }
        $userEdited = User::find($id)->update(['name' => $request->name, 'email' => $request->email, 'password' => Hash::make($request->password)]);
        return redirect('/admin/users/list');
    }
    public function index()
    {
        if (Auth::user() && Auth::user()->is_admin) {
            return view('admin/userForm');
        } else {
            return redirect('/');
        }
    }
}
