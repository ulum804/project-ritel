<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah user_id ada di session
        if (!$request->session()->has('id_user')) {
            return redirect('/')->with('error', 'Silahkan login terlebih dahulu');
        }

        return $next($request);
    }
}
