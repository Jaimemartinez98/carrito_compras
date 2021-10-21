<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$role)
    {
        if ((in_array($request->user()->perfil_id, $role)==false)) {
            return redirect('home')->with('message','USTED NO TIENE PERMISO DE ACCESO A ESTA SECCIÓN!');
        }

        return $next($request);
    }
}
