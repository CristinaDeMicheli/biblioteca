<?php

namespace App\Http\Middleware;

use Closure;
use User;
use Role;
class Bibliotecario
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
        
       //en esta parte va la funcion de condicion que tiene q cumplir para permitir la visualizacion de la ruta o no, como no termine de declarar como asignar los roles a los user queda comentado
        //if (auth()->check() && auth()->user()->role()->'Bibliotecario')
     //if (auth()->check() && auth()->user()->hasRole('biblioteca')
        return $next($request);

    return redirect('/');
       // return $next($request);
    }
}
