<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubsController extends Controller
{
    public function index()
    {
        return view('subs');
    }
    public function sub()
    {
        return view('sub');
    }
}
