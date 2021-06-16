@extends('layouts.default')
@section('content')
@include('partials.nav')
<div class="actus-container">
    @foreach ($actus as $actu)
        <div class="actu">
            <div class="actu-title">
                <img class="img-title-actu" src="/img/logo.png"  alt="">
                <h1>{{$actu->name}}</h1>
            </div>
            <div class="actu-img">
                <img class="img-actu" src="{{$actu->img}}"  alt="">
            </div>
            <div class="actu-more">
                <a href="/actus/{{$actu->id}}"><p>Lire la suite</p></a>
                
            </div>
        </div>
        <br>
    @endforeach

</div>
<br><br>

@include('partials.footer')