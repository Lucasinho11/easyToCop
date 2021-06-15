<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class ContactsController extends Controller
{

    public function index(){

        $adress = Config::get('informations.adress');
        $mail = Config::get('informations.mail');
        $phone = Config::get('informations.phone');
        return view('contacts', compact('adress','mail', 'phone'));
    }
    
}
