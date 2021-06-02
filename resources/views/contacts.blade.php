@extends('layouts.default')
@section('content')
@include('partials.nav')
<div class="all-contacts">
    <div class="div-contacts">
        <p>📍Adresse: 19 rue Yves Toudic 75010 Paris</p>
        <p>✉️Email: contact@ecole-webstart.com</p>
        <p>📞Tél: 01 42 41 97 76</p>
    </div>
    <div class="google-map">

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
                        <textarea name="msg-email" id="" rows="5"></textarea>
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