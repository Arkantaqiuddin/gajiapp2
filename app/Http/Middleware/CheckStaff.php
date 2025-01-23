<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CheckStaff
{
    public function handle($request, Closure $next)
    {
        // Periksa apakah user adalah staff
        if (Session::get('is_admin') === 1) {
            return redirect()->route('home')->withErrors(['error' => 'Akses tidak diizinkan.']);
        }

        return $next($request);
    }
}