<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Social;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    /**
     * @param string $network
     * @return RedirectResponse|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function index(string $network){
        return Socialite::driver('github')->redirect();
    }

    /**
     * @param string $network
     * @param Social $social
     * @return string
     */
    public function callback(string $network, Social $social)
    {
        return redirect($social->authUser( Socialite::driver($network)->user()));
    }
}
