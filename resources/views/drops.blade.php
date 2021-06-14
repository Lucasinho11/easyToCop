@extends('layouts.default')
@section('content')
@include('partials.nav')
<div class="pres-drops">
    <h1>Tous les prochains drops</h1>
</div>
<div class="all-drops">
@foreach ($drops as $drop)
    <div class="drop-date">
            <h1>{{Carbon\Carbon::parse($drop->dropTime)->translatedFormat('d M Y')}}</h1>
            
    </div>
        <a href="/drops/{{$drop->id}}">
            <div class="drop">
                <div>
                    <p>{{$drop->label}}</p>
                    <h1>{{$drop->name}}</h1>
                </div>
                <div class="img-drop">
                        <img class="img-drop-img" src="/img/{{$drop->img}}"  alt="">
                </div>
                
            </div>
        </a>
@endforeach
    
</div>
@include('partials.footer')