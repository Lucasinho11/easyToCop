<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class ActusController extends Controller
{
    public function index()
    {
        $actus = News::orderBy('created_at', 'DESC')->get();
        return view('actus', ['actus' => $actus] );
    }
    public function actu($id)
    {
        $actu =  News::where('id', $id)->get();
        return view('actu', ['actu' => $actu]);
    }
}
