<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function redirect($service) {
        return Socialite::driver()->redirect();
    }

    public function callback($service) {
        return $user = socialite::with ($service) -> user();
    }    
}


