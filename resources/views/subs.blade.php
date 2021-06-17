@extends('layouts.default')
@include('partials.nav')
@section('content')

<div class="all-subs-container">
    <h1 class="subs-title">Tarifs des abonnements:</h1>
    <div class="subs-container">
        <div class="premium-sub">
            <div class="premium-sub-title">
                <h1>Premium</h1>
                <p>5,99€/mois</p>
                <div class="div-sub-button">
                    <a class="button-sub" id="button-sub">
                        S'abonner
                    </a>
                </div>
                
            </div>
            <div class="premium-sub-details">
                <h1>Inclus:</h1>
                <p>-Accès à quelques drops</p><br>
            </div>
        </div>
        
        <div class="vip-sub">
            <div class="vip-sub-title">
                <h1>Vip</h1>
                <p>19,99€/mois</p>
                <div class="div-sub-button">
                    <a class="button-sub" id="button-sub2">
                        S'abonner
                    </a>
                </div>
            </div>
            <div class="vip-sub-details">
                <h1>Inclus:</h1>
                <p>-Accès à tous les drops</p>
                <p>-Gagne une box spéciale annuelle</p><br>
            </div>
        </div>
</div>
<!-- This example requires Tailwind CSS v2.0+ -->
<div class="fixed z-10 inset-0 overflow-y-auto hidden" id="modal" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <!--
      Background overlay, show/hide based on modal state.

      Entering: "ease-out duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100"
        To: "opacity-0"
    -->
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

    <!-- This element is to trick the browser into centering the modal contents. -->
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

    <!--
      Modal panel, show/hide based on modal state.

      Entering: "ease-out duration-300"
        From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        To: "opacity-100 translate-y-0 sm:scale-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100 translate-y-0 sm:scale-100"
        To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
    -->
    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="sm:flex sm:items-start">

          <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
              Abonnement
            </h3>
            <div class="div-radio">
                <form method="post" id="payment-form">
                    @csrf

                    @foreach ($subs as $sub)
                        <div>
                            <input type="radio" value="{{$sub->id}}" id="{{$sub->id}}" name="sub" class="checked">
                            <label for="{{$sub->id}}">Abonnement {{ $sub->name }} ({{ $sub->price }} €)</label>
                        </div>
                    @endforeach
                    <br>
                    <div class="mb-3 pt-0">
                        <label for="name">Nom</label>
                        <input type="text" placeholder="name" name="name" class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:ring w-full"/>
                        @error('name')
                            <p style="color: red">{{$message}}</p>
                                    
                        @enderror
                    </div>
                    <div id="card-element" class="mt-4"></div>

                    <div class="text-danger" id="card-errors" role="alert" class="mb-4"></div>

                    <div class="mb-3 pt-0">
                        <label for="promo">Code Promo</label>
                        <input type="text" placeholder="name" name="promo" class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:ring w-full"/>
                        @error('promo')
                            <p style="color: red">{{$message}}</p>
                                    
                        @enderror
                    </div>

                </form>
            </div>
          </div>
        </div>
      </div>
      <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 text-base font-medium text-white focus:outline-none sm:ml-3 sm:w-auto sm:text-sm" style="background-color: #5D19FF;">
          Payer
        </button>
        <button type="button" id="cancel-button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
          Cancel
        </button>
      </div>
    </div>
  </div>
</div>
</div>
<script>
    document.getElementById('button-sub').onclick = function(){
                document.getElementById("modal").classList.toggle("hidden");
            }
            document.getElementById('button-sub2').onclick = function(){
                document.getElementById("modal").classList.toggle("hidden");
            }
            document.getElementById('cancel-button').onclick = function(){
                document.getElementById("modal").classList.toggle("hidden");
            }

            const stripe = Stripe('{{ $stripeKey }}');
    const elements = stripe.elements();

    const card = elements.create("card");
    card.mount("#card-element");

    const cardHolderName = document.getElementById('name');
    const cardButton = document.getElementById('card-button');
    const clientSecret = cardButton.dataset.secret;

    card.on('change', ({error}) => {
      let displayError = document.getElementById('card-errors');
      if (error) {
        displayError.textContent = error.message;
      } else {
        displayError.textContent = '';
      }
    });

    const form = document.getElementById('payment-form');

form.addEventListener('submit', async (e) => {
  e.preventDefault();

  let displayError = document.getElementById('card-errors');

   const { setupIntent, error } = await stripe.confirmCardSetup(
        clientSecret, {
            payment_method: {
                card: card,
                billing_details: { name: cardHolderName.value }
            }
        }
    );

    if (error) {
        displayError.textContent = error.message;
    } else {
        displayError.textContent = '';
        //console.log(setupIntent);
        
        let paymentMethod = document.createElement('input');
        paymentMethod.setAttribute('type', 'hidden');
        paymentMethod.setAttribute('name', 'payment_method');
        paymentMethod.value = setupIntent.payment_method;

        form.appendChild(paymentMethod);
        form.submit();
    }
});
</script>
<br> <br>
@include('partials.footer')
@endsection

