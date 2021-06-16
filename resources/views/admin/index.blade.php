
@extends('layouts.default')
@section('content')
@include('partials.nav')
<div style="height: 90vh; display: flex; flex-direction: column; align-items: center; justify-content: center;">
    <h1 style="font-weight: bold; font-size: 20px">Menu Admin</h1>
    <a href="/admin/drops/list">Drops</a>
    <a href="/admin/actus/list">Actualités</a>
    <a href="/admin/users/list">Utilisateurs</a>
</div>
@include('partials.footer')