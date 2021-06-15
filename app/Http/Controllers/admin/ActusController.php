<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Auth;
use App\Models\News;

class ActusController extends Controller
{
    public function create(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'img' => 'required|mimes:jpeg,png,jpg',
        ]);
        $uploadedFileUrl = Cloudinary::upload($request->file('img')->getRealPath())->getSecurePath();
        $actu = News::create([
            'name' => $request->name,
            'description' => $request->description,
            'img' => $uploadedFileUrl,
        ]);
        return redirect('/admin/actus/list');

    }
    public function index(){
        if(Auth::user() && Auth::user()->is_admin){
            return view('admin/actuForm');
        }
        else{
            return redirect('/');
        }
    }
    public function list(){
        if(Auth::user() && Auth::user()->is_admin){
            $actus = News::get();
            return view('admin/actuList', ['actus' => $actus] );
        }
        else{
            return redirect('/');
        }
    }
    public function delete($id){
        $actu = News::where('id',$id)->delete();
        return redirect('/admin/actus/list');
    }
    public function edit( $id){
        if(Auth::user() && Auth::user()->is_admin){
            $actu = News::where('id',$id)->get();
            return view('admin/actuEdit', ['actu' => $actu] );
        }
        else{
            return redirect('/');
        }
        
    }
    public function editActu(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'img' => 'mimes:jpeg,png,jpg',
        ]);
        if($request->img){
            $uploadedFileUrl = Cloudinary::upload($request->file('img')->getRealPath())->getSecurePath();
            $actuEdited = News::find($id)->update(['name' => $request->name,'description' => $request->description, 'img' => $uploadedFileUrl]);
        }
        else{
            $actuEdited = News::find($id)->update(['name' => $request->name,'description' => $request->description]);
        }
        return redirect('/admin/actus/list');
    }
}
