<?php

namespace App\Http\Controllers;

use App\Models\SocialProfile;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Laravel\Socialite\Facades\Socialite; 

class SocialLoginController extends Controller
{
    public function __construct(){
        $this->middleware(['guest','social_network']);
    }

    public function redirectToSocialNetwork($socialNetwork)
    {
        // dd($socialNetwork);
       return Socialite::dirver($socialNetwork)->stateless()->redirect();
          
    }
    
    public function handleSocialNetworkCallback($socialNetwork)
    {   
        // dd($socialNetwork);
   
        try
        {
            $socialUser = Socialite::driver($socialNetwork)->user();
        }
        catch(\Exception $e)
        {
            // dd($e->getMessage());
            return redirect()->route('login')->with('bye', 'Hubo un error...!');
        }

        // Verificar que existe un identificador de usuario de la red social
        $socialProfile = SocialProfile::firstOrNew([
            'social_network' => $socialNetwork,
            'social_network_user_id' => $socialUser->getId()
        ]);

        if(! $socialProfile->exists ){

            // Verificamos que existe un usuario con el email de la red social
            $user = User::firstOrNew(['email' => $socialUser->getEmail()]);

            if(! $user->exists){
                $user->name     = $socialUser->getName();
                $user->status   = 1;
                $user->save();
            }
            $socialProfile->avatar   = $socialUser->getAvatar();

            $user->profiles()->save( $socialProfile );

        }

        Auth::login($socialProfile->user);

        return redirect()->route('/')->with('welcome', 'Bienvenid@ '. $socialProfile->user->name);
    }
}
