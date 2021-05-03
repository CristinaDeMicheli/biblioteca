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
        
       //
        //if (auth()->check() && auth()->user()->role()->'Bibliotecario')
//if (auth()->check() && auth()->user()->hasRole('biblioteca')
        return $next($request);

    return redirect('/');
       // return $next($request);
    }
}
