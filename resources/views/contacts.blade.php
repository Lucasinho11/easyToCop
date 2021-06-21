@extends('layouts.default')
@section('content')
@include('partials.nav')
<script>

function initMap() {
  const webstart = { lat: 48.8704843, lng: 2.3608514};

  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 15,
    center: webstart,
  });

  const marker = new google.maps.Marker({
    position: webstart,
    map: map,
  });
}

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=<?=env('API_KEY')?>&callback=initMap&libraries=&v=weekly" async></script>
<style>
#map {
    width: 60vw;
    height: 40vh;
    z-index: -1;

}
</style>
<div class="all-contacts">
    <div class="div-contacts">
        <p>📍Adresse: {{$adress}}</p>
        <p>✉️Email: {{$mail}}</p>
        <p>📞Tél: {{$phone}}</p>
    </div>
    <div id="map">

    </div>
    <div class="contact-form">
        <h1>Contactez-nous!</h1>
        <div>
            <form action="" method="post">
                @csrf
                <div class="names">
                    <div>
                        <label for="first_name">Prénom:</label>
                        <input type="text" name="first_name">
                        @error('first_name')
                            <p style="color: red">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="last-name">Nom:</label>
                        <input type="text" name="last_name">
                        @error('last_name')
                            <p style="color: red">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="email-send">
                        <label for="email">Email:</label>
                        <input type="email" name="email">
                        @error('email')
                            <p style="color: red">{{$message}}</p>
                        @enderror
                        <label for="object">Objet:</label>
                        <input type="text" name="object">
                        @error('object')
                            <p style="color: red">{{$message}}</p>
                        @enderror
                        <label for="msg-email">Message:</label>
                        <textarea name="msg_email" id="" rows="3"></textarea>
                        @error('msg_email')
                            <p style="color: red">{{$message}}</p>
                        @enderror
                </div>
                <br>
                <div class="div-button-email">   
                    <a href="" class="buttons-send-email">
                    <button type="submit" style="width:100%">
                    Envoyer
                    </button>
                        
                    </a>
                    <br>
                </div>
                
                
            </form>
            
        </div>
    </div>
</div>
<br><br>

@include('partials.footer')