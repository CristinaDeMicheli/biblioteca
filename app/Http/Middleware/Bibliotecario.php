<?php

namespace App\Http\Middleware;

use Closure;

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
        if (auth()->check() && auth()->user()->'Bibliotecario')
        return $next($request);

    return redirect('/');
       // return $next($request);
    }
}
