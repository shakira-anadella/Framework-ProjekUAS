<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Pastikan pengguna terautentikasi dan memiliki usertype 'admin'
        if (auth()->check() && auth()->user()->usertype === 'admin') {
            return $next($request);
        }

        // Jika bukan admin, arahkan ke dashboard atau tampilkan error
        return redirect('dashboard')->with('error', 'Anda tidak memiliki akses sebagai admin.');
    }

}
