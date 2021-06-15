<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;


class DropsController extends Controller
{
    public function create(Request $request){
        $uploadedFileUrl = Cloudinary::upload($request->file('img')->getRealPath())->getSecurePath();
        //return view('admin/dropForm');
        dd($uploadedFileUrl);
    }
    public function index(){

        return view('admin/dropForm');
    }
}
