@extends('layouts.default')
@section('content')
@include('partials.nav')
<div class="all-user">
    @auth
        <h1>Informations du compte</h1>
        <form action="/user" method="POST">
            @csrf
        <div class="mb-3 pt-0">
                <input type="text" name="name" placeholder="{{ Auth::user()->name }}" class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:ring w-full"/>
                @error('name')
                    <p style="color: red">{{$message}}</p>
                    
                @enderror
            </div>
            <div class="mb-3 pt-0">
                <input type="email" name="email" placeholder="{{ Auth::user()->email }}" class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:ring w-full"/>
                @error('email')
                    <p style="color: red">{{$message}}</p>
                    
                @enderror
            </div>
            <div class="relative flex w-full flex-wrap items-stretch mb-3">
                <span class="z-10 h-full leading-snug font-normal absolute text-center text-blueGray-300 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-3 py-3">
                    <i class="fas fa-lock"></i>
                </span>
                <input type="password" name="password" placeholder="Mot de passe " class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:ring w-full pl-10"/>
                @error('password')
                    <p style="color: red">{{$message}}</p>
                @enderror
                @if($error)
                    <p style="color: red"> {{$error}}</p>
                @endif
            </div>
            @if($sub)
                <h2>Votre abonnement</h2>
                <div class="div-edit-sub">
                    <a href="{{Auth::user()->billingPortalUrl(route('user'))}}">Modifier l'abonnement</a>
                </div>
                <a href="">Télécharger la facture</a>
            @endif
            <a href="#" class="button-edit-sub">
                <button type="submit" style="width: 100%;">
                    Enregistrer
                </button>
            </a>
        </form>
    @else
        <h1>Vous n'êtes pas connecté</h1>
    @endauth
</div>

@include('partials.footer')