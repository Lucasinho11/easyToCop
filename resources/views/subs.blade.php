@extends('layouts.default')
@section('content')
@include('partials.nav')
<div class="all-subs-container">
    <h1 class="subs-title">Tarifs des abonnements:</h1>
    <div class="subs-container">
        <div class="premium-sub">
            <div class="premium-sub-title">
                <h1>Premium</h1>
                <p>5,99€/mois</p>
                <div class="div-sub-button">
                    <a href="/subs/1" class="button-sub">
                        S'abonner
                    </a>
                </div>
                
            </div>
            <div class="premium-sub-details">
                <h1>Inclus:</h1>
                <p>-Accès à quelques drops</p><br>
            </div>
        </div>
        
        <div class="vip-sub">
            <div class="vip-sub-title">
                <h1>Vip</h1>
                <p>19,99€/mois</p>
                <div class="div-sub-button">
                    <a href="/subs/2" class="button-sub">
                        S'abonner
                    </a>
                </div>
            </div>
            <div class="vip-sub-details">
                <h1>Inclus:</h1>
                <p>-Accès à tous les drops</p>
                <p>-Gagne une box spéciale annuelle</p><br>
            </div>
        </div>
</div>
</div>
<br> <br>

@include('partials.footer')