@extends('layouts.default')
@section('content')
@include('partials.nav')
<div class="actus-container">
    <div class="actu">
        <div class="actu-title">
            <img class="img-title-actu" src="/img/logo.png"  alt="">
            <h1>Le retour des Air Jordan 4!</h1>
        </div>
        <div class="actu-img">
            <img class="img-actu" src="/img/wallpaper.jpeg"  alt="">
        </div>
        <div class="actu-more">
            <a href="/actus/1"><p>Lire la suite</p></a>
            
        </div>
    </div>

</div>
<br><br>

@include('partials.footer')