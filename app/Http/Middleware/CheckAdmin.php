<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CheckAdmin
{
    public function handle($request, Closure $next)
    {
        // Periksa apakah user adalah admin
        if (Session::get('is_admin') !== 1) {
            return redirect()->route('home')->withErrors(['error' => 'Akses tidak diizinkan.']);
        }

        return $next($request);
    }
}