@extends('layouts.default')
@section('content')
@include('partials.nav')
<div class="all-user">
    <h1>Informations du compte</h1>
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
    
        <h2>Votre abonnement</h2>
        <div class="div-edit-sub">
            <a href="">Modifier la méthode de paiement</a>
            <a href="">Changer d'abonnement</a>
            <a href="">Suspendre l'abonnement</a>
        </div>
        <a href="" class="annul-sub">Annuler l'abonnement</a>
        <p>Code Promo</p>
        <div class="mb-3 pt-0">
            <input type="text" placeholder="CLEMENT10" class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:ring w-full"/>
        </div>
        <a href="">Télécharger la facture</a>
        <a href="#" class="button-edit-sub">
            <button type="submit">
                Enregistrer
            </button>
        </a>
    </form>
</div>

@include('partials.footer')