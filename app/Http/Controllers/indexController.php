<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class indexController extends Controller
{
    public function index()
    {
        $actus = News::orderBy('created_at', 'DESC')->take(5)->get();
        return view('index', ['actus' => $actus] );
    }
}
