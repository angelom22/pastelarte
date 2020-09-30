<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserActivationToken;


class UserActivationTokenController extends Controller
{
    public function activate(UserActivationToken $token)
    {
        // se delega el metodo active que se encuentra en el model user
        $token->user->activate();

        return redirect('/')->with('registro','Tu cuenta ha sido activada');
    }
}
