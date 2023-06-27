<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SopirMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role == 'Sopir') {
            return $next($request);
        }

        return redirect()->route('login'); // Ganti 'home' dengan rute beranda atau halaman login Anda
    }
}
