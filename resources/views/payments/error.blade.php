@extends('layouts.default')
@include('partials.nav')
@section('content')

<div class="payment">
    <h1>Paiement refusé🚫 </h1>
    <p>Veuillez réessayer ultérieurement</p>
    <a  href="/" class="button-sub" id="button-sub2">
        retour
    </a>
</div>

<br> <br>
@include('partials.footer')
@endsection