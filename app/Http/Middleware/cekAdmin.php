<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class cekAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Periksa apakah pengguna yang masuk adalah admin
        if (Auth::check() && $request->user()->jenisAkun === 'admin') {
            return $next($request);
        }

        // Jika bukan admin, kembalikan modal error
        return redirect()->back()->with('errorHeader', 'Akses Dibatasi')->with('error', 'Hanya admin yang dapat masuk!');
    }
}
