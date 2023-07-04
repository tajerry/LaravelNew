<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Contracts\User as SocialContract;

class SocialService implements \App\Contracts\Social
{


    public function authUser(SocialContract $socialUser): string
    {
        $user = User::where('email', $socialUser->getEmail())->first();
        if($user){
            $user->name = $socialUser->getName();
            $user->avatar = $socialUser->getAvatar();
            if($user->save()){
                Auth::loginUsingId($user->id);
                return route('accounts.index');
            }
            throw new Exception("Wasn't auth user");
        }
        else{
            $user = User::create([
                'name' => $socialUser->getName(),
                'email' => $socialUser->getEmail(),
                'avatar' => $socialUser->getAvatar(),
                'password' =>Hash::make( $socialUser->getEmail()),
            ]);
            Auth::login($user);
            return route('accounts.index');
        }
    }
}
