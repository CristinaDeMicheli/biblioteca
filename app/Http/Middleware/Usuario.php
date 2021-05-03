<?php

namespace App\Http\Middleware;

use Closure;
use User;
use Role;
class Usuario
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
       // if (auth()->check() && auth()->user()->role()->'Usuario')
        return $next($request);

    return redirect('/');
        //return $next($request);
    }
}
