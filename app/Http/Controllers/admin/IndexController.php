<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(){
        if(Auth::user() && Auth::user()->is_admin){
            return view('admin/index');
        }
        else{
            return redirect('/');
        }
    }
}
