<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();   
    }
    
    public function handleFacebookCallback()
    {
        if(!request('code')){
            return redirect()->route('login')->with('bye', 'Hubo un error...!');
        }

        $UserFacebook = Socialite::driver('facebook')->user();

        $user = User::firstOrNew(['facebook_id' => $UserFacebook->getId()]);

        if(!$user->exists){
            $user->name     = $UserFacebook->getName();
            $user->email    = $UserFacebook->getEmail();
            $user->avatar    = $UserFacebook->getAvatar();
            $user->save();

        }

        Auth::login($user);

        return redirect()->route('/')->with('welcome', 'Bienvenid@ '. $user->name);
    }
}
