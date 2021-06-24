@extends('layouts.default')
@section('content')
@include('partials.nav')
<x-guest-layout>

        <!-- Session Status -->
        

        <div class="all-login">
        <x-auth-session-status class="mb-4" :status="session('status')" />
            <h1>Se connecter</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3 pt-0">
                    <x-input id="email" type="email" placeholder="email" class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:ring w-full" name="email" value="{{ old('email') }}" required autofocus/>
                    
                </div>
                <div class="relative flex w-full flex-wrap items-stretch mb-3">
                    <span class="z-10 h-full leading-snug font-normal absolute text-center text-blueGray-300 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-3 py-3">
                        <i class="fas fa-lock"></i>
                    </span>
                    <x-input id="password" type="password" name="password" placeholder="Mot de passe " class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:ring w-full pl-10" required autocomplete="current-password"/>
                </div>
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <a href="" class="button-login">
                    <button type="submit" style="width: 100%">
                        Se connecter
                    </button>
                </a>
                <div style="display: flex; justify-content: center;">
                    <a href="/register" style="color: #5D19FF;">Vous n'avez pas de compte? Inscrivez-vous</a>
                </div>
                
            </form>
        </div>
</x-guest-layout>

@include('partials.footer')




