<?php

namespace App\Http\Controllers;

use App\Models\Drops;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DropsController extends Controller
{
    public function index()
    {
        
        $drops = Drops::get();

        return view('drops', ['drops' => $drops] );
        
    }
    public function drop()
    {
        return view('drop');
    }

}
