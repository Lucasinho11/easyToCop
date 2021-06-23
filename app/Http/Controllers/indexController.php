<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class IndexController extends Controller
{
    public function index()
    {
        //test
        $actus = News::orderBy('created_at', 'DESC')->take(5)->get();
        return view('index', ['actus' => $actus] );
    }
}
