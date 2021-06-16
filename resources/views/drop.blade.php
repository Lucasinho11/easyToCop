@extends('layouts.default')
@section('content')
@include('partials.nav')
<div class="drop-container">
@if (session()->has('message'))

      <div class="fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
          <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
          </div>
          <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

          <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
              <div class="sm:flex sm:items-start">
                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                  <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                    Vous êtes inscrit ✅
                  </h3>
                  <div class="mt-2">
                    <p class="text-sm text-gray-500">
                      Un email vous sera envoyé si vous remportez le tirage 🤞
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <a href="/drops">
              <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                Retour
              </button></a>
            </div>
          </div>
        </div>
      </div>
    @endif
    @if($dropRegister == 0)
        @foreach ($drop as $d)
            <div class="text-drops">
                <p>{{$d->label}}</p>
                <h1>{{$d->name}}</h1>
            </div>
            <div class="img-drop">
                <img class="img-drop-img2" src="{{$d->img}}"  alt="">
                <br><br>
                <p>Prix: {{$d->price}}€</p>
                <form action="" method="POST" class="form-sub-drop">
                    @csrf
                    <a href="" class="buttons-subs-drop">
                        <button type="submit">
                            S'inscrire
                        </button>
                        
                    </a>
                </form>
                
            </div>
        @endforeach
    @else
        @foreach ($drop as $d)
            <div class="text-drops">
                <p>{{$d->label}}</p>
                <h1>{{$d->name}}</h1>
            </div>
            <div class="img-drop">
                <img class="img-drop-img2" src="{{$d->img}}"  alt="">
                <br><br>
                <p>Prix: {{$d->price}}€</p>
                <p>Vous êtes déjà inscrit ✅</p>
            </div>
        @endforeach
    @endif
</div>
<br><br>
@include('partials.footer')