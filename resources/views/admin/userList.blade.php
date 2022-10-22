
@extends('layouts.default')
@section('content')
@include('partials.nav')
<div class="table w-full p-2" style="height: 80vh; padding-top: 10%">
    <a href="/admin" style="color: blue">Menu Admin</a>
    <h1 style="text-align: center; font-weight: bold; font-size: 30px">Tableau des utilisateurs</h1>
    <div style="display: flex; justify-content: center">
        <a href="/admin/users/create">
            <button style="width: 100%" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                Ajouter un utilisateur
            </button>
        </a>
        
    </div>
    <br>
        <table class="w-full border">
            <thead>
                <tr class="bg-gray-50 border-b">
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            ID
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Nom
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Email
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Statut
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Abonnement
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Action
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $u)
                    <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                        <td class="p-2 border-r">{{$u->id}}</td>
                        <td class="p-2 border-r">{{$u->name}}</td>
                        <td class="p-2 border-r">{{$u->email}}</td>
                        @if($u->is_admin == 1)
                            <td class="p-2 border-r">Admin</td>
                        @else
                            <td class="p-2 border-r">Non-Admin</td>
                        @endif
                        @if($u->sub)
                            <td class="p-2 border-r">
                                <a href="{{$u->billingPortalUrl(route('user'))}}">{{$u->sub}}</a>
                            </td>
                        @else
                            <td class="p-2 border-r">Aucun abonnement</td>
                        @endif
                        <td>
                            <a href="/admin/users/{{$u->id}}/edit" class="bg-blue-500 p-2 text-white hover:shadow-lg text-xs font-thin">Modifier</a>
                            <a href="/admin/users/{{$u->id}}/delete" class="bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin">Supprimer</a>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>

@include('partials.footer')