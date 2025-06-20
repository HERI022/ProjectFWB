<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class cekLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Periksa apakah pengguna sudah login (akses pembayaran)
        if (Auth::check()) {
            return $next($request);
        }

        // Jika belum, kembalikan modal error
        return redirect()->back()->with('errorHeader', 'Anda Belum Login')->with('error', 'Jika anda ingin melakukan donasi, harap melakukan login terlebih dahulu. Klik tombol login untuk melanjutkan.');
    }
}
