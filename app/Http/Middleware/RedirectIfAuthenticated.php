<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // Permitir acceso a la ruta 'register' para usuarios autenticados
                if ($request->route()->named('register')) {
                    return $next($request);
                }

                // Redirigir al dashboard si el usuario está autenticado
                return redirect('/dashboard');
            }
        }

        return $next($request);
    }
}
