<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DropsController extends Controller
{
    public function index()
    {
        return view('drops');
    }
    public function drop()
    {
        return view('drop');
    }

}
