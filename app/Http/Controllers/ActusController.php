<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActusController extends Controller
{
    public function index()
    {
        return view('actus');
    }
    public function actu()
    {
        return view('actu');
    }
}
