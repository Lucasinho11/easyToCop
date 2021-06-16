
@extends('layouts.default')
@section('content')
@include('partials.nav')
<div class="all-login">
    <h1>Ajouter un utilisateur</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="mb-3 pt-0">
        <input type="text" placeholder="name" name="name" class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:ring w-full"/>
        @error('name')
            <p style="color: red">{{$message}}</p>
                    
        @enderror
    </div>
    <div class="mb-3 pt-0">
        <input type="email" placeholder="lucas.ledieudu27@gmail.com" name="email" class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:ring w-full"/>
        @error('email')
            <p style="color: red">{{$message}}</p>
                    
        @enderror
    </div>
    <div class="mb-3 pt-0">
        <input type="password" placeholder="" name="password" class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:ring w-full"/>
        @error('password')
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