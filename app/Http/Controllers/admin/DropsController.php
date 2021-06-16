<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Auth;
use App\Models\Drops;


class DropsController extends Controller
{
    public function create(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'label' => 'required|string|max:255',
            'price' => 'numeric|min:1',
            'img' => 'required|mimes:jpeg,png,jpg',
            'dropTime'=>'required|date|date_format:Y-m-d|after:today'
        ]);
        $uploadedFileUrl = Cloudinary::upload($request->file('img')->getRealPath())->getSecurePath();
        $drop = Drops::create([
            'name' => $request->name,
            'label' => $request->label,
            'dropTime'=> $request->dropTime,
            'price'=>$request->price,
            'img' => $uploadedFileUrl,
        ]);
        return redirect('/admin/drops/list');

    }
    public function index(){
        if(Auth::user() && Auth::user()->is_admin){
            return view('admin/dropForm');
        }
        else{
            return redirect('/');
        }
    }
    public function list(){
        if(Auth::user() && Auth::user()->is_admin){
            $drops = Drops::get();
            return view('admin/dropList', ['drops' => $drops] );
        }
        else{
            return redirect('/');
        }
    }
    public function delete($id){
        if(Auth::user() && Auth::user()->is_admin){
            $drop = Drops::where('id',$id)->delete();
            return redirect('/admin/drops/list');
        }
        else{
            return redirect('/');
        }
        
    }
    public function edit( $id){
        if(Auth::user() && Auth::user()->is_admin){
            $drop = Drops::where('id',$id)->get();
            return view('admin/dropEdit', ['drop' => $drop] );
        }
        else{
            return redirect('/');
        }
        
    }
    public function editDrop(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
            'label' => 'required|string|max:255',
            'price' => 'numeric|min:1',
            'img' => 'mimes:jpeg,png,jpg',
            'dropTime'=>'required|date|date_format:Y-m-d|after:today'
        ]);
        if($request->img){
            $uploadedFileUrl = Cloudinary::upload($request->file('img')->getRealPath())->getSecurePath();
            $dropEdited = Drops::find($id)->update(['name' => $request->name,'label' => $request->label, 'price' => $request->price, 'img' => $uploadedFileUrl ,'dropTime' => $request->dropTime ]);
        }
        else{
            $dropEdited = Drops::find($id)->update(['name' => $request->name,'label' => $request->label, 'price' => $request->price, 'dropTime' => $request->dropTime ]);
        }
        return redirect('/admin/drops/list');
    }
    
}
