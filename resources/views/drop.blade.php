@extends('layouts.default')
@section('content')
@include('partials.nav')
<div class="drop-container">
    @foreach ($drop as $d)
        <div class="text-drops">
            <p>{{$d->label}}</p>
            <h1>{{$d->name}}</h1>
        </div>
        <div class="img-drop">
            <img class="img-drop-img2" src="/img/{{$d->img}}"  alt="">
            <br><br>
            <p>Prix: {{$d->price}}€</p>
            <a href="#" class="buttons-subs-drop">
                S'inscrire
            </a>
        </div>
    @endforeach
</div>
<br><br>
@include('partials.footer')