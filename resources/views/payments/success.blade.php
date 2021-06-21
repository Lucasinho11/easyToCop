@extends('layouts.default')
@include('partials.nav')
@section('content')

<div class="payment">
    <h1>Paiement accepté✅ </h1>
    <p>Un email a été envoyé sur votre adresse mail ({{Auth::user()->email}})</p>
    <a  href="/" class="button-sub" id="button-sub2">
        retour
    </a>
</div>

<br> <br>
@include('partials.footer')
@endsection

