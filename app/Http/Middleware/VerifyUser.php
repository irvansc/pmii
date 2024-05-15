<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class VerifyUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah pengguna terautentikasi
        if (Auth::check()) {
            // Cek apakah kolom 'verified' pengguna adalah 1
            if (Auth::user()->verified == 1) {
                // Jika sudah diverifikasi, lanjutkan request
                return $next($request);
            } else {
                // Jika belum diverifikasi, lempar ke halaman login atau halaman lain
                Auth::logout(); // Opsional: logout pengguna
                return redirect('/login')->with('fail', 'Akun Anda belum diverifikasi.');
            }
        }

        // Jika pengguna tidak terautentikasi, arahkan ke halaman login
        return redirect('/login')->with('fail', 'Anda harus login terlebih dahulu.');
    }
}
