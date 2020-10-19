<?php

namespace App\Http\Middleware;

use App\Models\SocialProfile;
use Closure;
use Illuminate\Http\Request;

class RedirectSocialNetworkSupported
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // dd($request->route('socialNetwork'));
        if( collect(SocialProfile::$allowed)->contains($request->route('socialNetwork')))
        {
            return $next($request);
        }

        return redirect()
                ->route('login')
                ->with('bye', "No es posible autenticarte con {$request->route('socialNetwork')}");
    }
}
