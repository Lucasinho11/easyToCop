
@extends('layouts.default')
@section('content')
@include('partials.nav')
<div class="all-login">
    <h1>Modification</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
    @foreach ($drop as $d)
        <div class="mb-3 pt-0">
            <input type="text" placeholder="name" name="name" value="{{$d->name}}" class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:ring w-full"/>
            @error('name')
                <p style="color: red">{{$message}}</p>
                        
            @enderror
        </div>
        <div class="mb-3 pt-0">
            <input type="text" placeholder="label" name="label" value="{{$d->label}}" class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:ring w-full"/>
            @error('label')
                <p style="color: red">{{$message}}</p>
                        
            @enderror
        </div>
        <div class="mb-3 pt-0">
            <input type="number" placeholder="prix" name="price" value="{{$d->price}}" class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:ring w-full"/>
            @error('price')
                <p style="color: red">{{$message}}</p>
                        
            @enderror
        </div>
        <div class="mb-3 pt-0">
            <input type="date" placeholder="" name="dropTime" value="{{Carbon\Carbon::parse($d->dropTime)->translatedFormat('Y-m-d')}}" class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:ring w-full"/>
            @error('dropTime')
                <p style="color: red">{{$message}}</p>
                        
            @enderror
        </div>
        <div class="mb-3 pt-0">
            <input type="file" placeholder="" name="img" class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:ring w-full"/>
            @error('img')
                <p style="color: red">{{$message}}</p>
                        
            @enderror
        </div>
    @endforeach
        <a href="" class="button-login">
            <button type="submit" style="width: 100%">
                enregistrer
            </button>
        </a>
       
    
    </form>
</div>

@include('partials.footer')