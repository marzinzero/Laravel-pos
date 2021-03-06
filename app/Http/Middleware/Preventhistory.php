<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Preventhistory
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $respons =  $next($request);
        return $respons
            ->header('Cache-Control', 'nocache, no-store, max-age:0;must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', 'Wed, 19 oct 1994 00:00:00 GMT');
    }
}
