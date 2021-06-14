@extends('layouts.default')
@section('content')
@include('partials.nav')
<div class="text-main">
    <h1 class="h1-main">Ne manque plus la paire de tes rêves ! </h1>
    <p class="p-main">
        Marre de ne pas être sélectionné ?<br>
        Avec nos services, tu as beaucoup plus de chance<br>
        de cop ta paire de speakers préférée !
    </p>
    <br>
    <br>
        <a href="/subs" class="buttons-subs-index">
            Voir les abonnements
        </a>

</div>
<div class="top5-news">
    <h1>Les dernières news:</h1>
    <div class="new-actu">
        <h2>La nouvelle air jordan 4 !</h2>
        <div class="details-actu">
            <div class="description-new">
                <p>La jordan 4 military blue sort<br> prochainement. Ne la rate pas !<br><br> 18/04/2021</p>
            </div>
            <div class="img-new">
                <img src="/img/aj4.png"  alt="">
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
@include('partials.footer')