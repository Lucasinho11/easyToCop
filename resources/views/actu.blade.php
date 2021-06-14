@extends('layouts.default')
@section('content')
@include('partials.nav')
<div class="actu-container">
    @foreach ($actu as $ac)
        <h1>{{$ac->name}}</h1>
        <img class="img-actu-actu" src="/img/{{$ac->img}}" alt="">
        <p>{{$ac->description}}</p>
    @endforeach
</div>

@include('partials.footer')