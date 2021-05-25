@extends('layouts.default')
@section('content')
@include('partials.nav')
<div class="pres-drops">
    <h1>Tous les prochains drops</h1>
</div>
<div class="all-drops">
    <div class="drop-date">
        <h1>Samedi 24 Avril</h1>
    </div>
    <a href="/drops/1">
        <div class="drop">
            <div>
                <p>NIKE AIR JORDAN 4 RETRO</p>
                <h1>MILITARY BLUE</h1>
            </div>
            <div class="img-drop">
                    <img class="img-drop-img" src="/img/aj4.png"  alt="">
            </div>
            
        </div>
    </a>
</div>
@include('partials.footer')