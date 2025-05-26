<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RolUsuario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if( $request->user()->rol ) {
            // caso de que el usuario tenga rol 2,  redireccionar a la vista de home
            if( $request->user()->rol === 1 ) {
                return redirect()->route(route: 'home');
            }
        }
        return $next($request);
    }
}
