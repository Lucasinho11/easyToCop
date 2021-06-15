
@extends('layouts.default')
@section('content')
@include('partials.nav')
<div class="all-login">
    <h1>admin</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf

    <div class="mb-3 pt-0">
        <input type="file" placeholder="" name="img" class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:ring w-full"/>
    </div>
    <a href="#" class="button-login">
        <button type="submit">
            enregistrer
        </button>
    </a>
       
    
    </form>
</div>

@include('partials.footer')