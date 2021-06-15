
@extends('layouts.default')
@section('content')
@include('partials.nav')
<div class="all-login">
    <h1>Ajouter une actualité</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="mb-3 pt-0">
        <input type="text" placeholder="name" name="name" class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:ring w-full"/>
        @error('name')
            <p style="color: red">{{$message}}</p>
                    
        @enderror
    </div>
    <div class="mb-3 pt-0">
        <textarea placeholder="description" name="description" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4"></textarea>
        @error('description')
            <p style="color: red">{{$message}}</p>
                    
        @enderror
    </div>
    <div class="mb-3 pt-0">
        <input type="file" placeholder="" name="img" class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:ring w-full"/>
        @error('img')
            <p style="color: red">{{$message}}</p>
                    
        @enderror
    </div>
    <a href="" class="button-login">
        <button type="submit" style="width: 100%">
            enregistrer
        </button>
    </a>
       
    
    </form>
</div>

@include('partials.footer')