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
            <form action="">
                <div class="names">
                    <div>
                        <label for="first-name">Prénom:</label>
                        <input type="text" name="first-name">
                    </div>
                    <div>
                        <label for="last-name">Nom:</label>
                        <input type="text" name="last-name">
                    </div>
                </div>
                <div class="email-send">
                        <label for="email">Email:</label>
                        <input type="email" name="email">
                        <label for="object">Objet:</label>
                        <input type="text" name="object">
                        <label for="msg-email">Message:</label>
                        <textarea name="msg-email" id="" rows="3"></textarea>
                </div>
                <br>
                <div class="div-button-email">   
                    <a href="#" class="buttons-send-email">
                        Envoyer
                    </a>
                    <br>
                </div>
                
                
            </form>
            
        </div>
    </div>
</div>
<br><br>

@include('partials.footer')