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
    @foreach ($actus as $a)
        <div class="new-actu">
            <h2>{{$a->name}}</h2>
            <div class="details-actu">
                <div class="description-new">
                    <p>{{$a->description}}<br><br>{{Carbon\Carbon::parse($a->created_at)->translatedFormat('d M Y')}}</p>
                </div>
                <div class="img-new">
                    <img src="{{$a->img}}"  alt="">
                </div>
            </div>
        </div>
    @endforeach
</div>
<br>
<br>
<br>
@include('partials.footer')