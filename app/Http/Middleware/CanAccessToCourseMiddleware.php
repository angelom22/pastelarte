<?php

namespace App\Http\Middleware;

use Closure;


class CanAccessToCourseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        $blockAccess = false;
        if (!auth()->check()) $blockAccess = true;
        // $curso = $request->route()->parameter('curso');
        $curso = $request->curso;
        $isOwnerUser = auth()->id() === $curso->user_id;
        $cursoPurchased = $curso->estudiantes->contains(auth()->id());
        if (!$isOwnerUser && !$cursoPurchased) $blockAccess = true;

        if ($blockAccess) {
            session()->flash("message", ["danger", __("No puedes acceder a este curso")]);
            return redirect(route("cursos.show", ["curso" => $curso]));
        }

        return $next($request);
    }
}
