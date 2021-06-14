@extends('layouts.default')
@section('content')
@include('partials.nav')
<x-guest-layout>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <div class="all-login">
        <h1>S'inscrire</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3 pt-0">
                <x-input id="name" type="text" placeholder="name" name="name" :value="old('name')" class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:ring w-full" required autofocus/>
            </div>
            <div class="mb-3 pt-0">
                <input id="email" type="email" name="email" placeholder="email" class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:ring w-full" :value="old('email')" required/>
            </div>
            <div class="relative flex w-full flex-wrap items-stretch mb-3">
                <span class="z-10 h-full leading-snug font-normal absolute text-center text-blueGray-300 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-3 py-3">
                    <i class="fas fa-lock"></i>
                </span>
                <x-input type="password" id="password" name="password" placeholder="Mot de passe " class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:ring w-full pl-10" required autocomplete="new-password"/>
                
            </div>
            <div class="relative flex w-full flex-wrap items-stretch mb-3">
                <span class="z-10 h-full leading-snug font-normal absolute text-center text-blueGray-300 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-3 py-3">
                    <i class="fas fa-lock"></i>
                </span>
                <x-input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirmation du mot de passe " class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:ring w-full pl-10" required/>
                
            </div>
            <a href="" class="button-login">
                <button type="submit" style="width: 100%">
                    S'inscrire
                </button>
            </a>
        </form>
</x-guest-layout>

@include('partials.footer')
