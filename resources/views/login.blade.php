@extends('layouts.default')
@section('content')
@include('partials.nav')
<div class="all-login">
    <h1>Se connecter</h1>
    <form action="">
    <div class="mb-3 pt-0">
        <input type="email" placeholder="email" class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:ring w-full"/>
    </div>
    <div class="relative flex w-full flex-wrap items-stretch mb-3">
        <span class="z-10 h-full leading-snug font-normal absolute text-center text-blueGray-300 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-3 py-3">
            <i class="fas fa-lock"></i>
        </span>
        <input type="password" name="login-password" placeholder="Mot de passe " class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:ring w-full pl-10"/>
        
    </div>
    <a href="#" class="button-login">
        <button type="submit">
            Se connecter
        </button>
    </a>
       
    
    </form>
</div>

@include('partials.footer')