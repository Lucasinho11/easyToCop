@extends('layouts.default')
@include('partials.nav')
@section('content')

<div class="payment">
    <h1>Vous avez déjà un abonnement🚫 </h1>
    <p>Cliquer ci-dessous pour le modifier</p>
    <a  href="{{Auth::user()->billingPortalUrl(route('subs'))}}" class="button-sub" id="button-sub2">
        Modifier
    </a>
</div>

<br> <br>
@include('partials.footer')
@endsection