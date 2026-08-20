<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Mencegah browser menyimpan cache halaman dashboard admin.
 * Tanpa ini, setelah logout, tombol "Back" di browser bisa menampilkan
 * versi halaman dashboard yang sempat ter-cache sebelum logout —
 * meskipun sebenarnya session sudah tidak valid (celah keamanan umum).
 */
class PreventBackHistory
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $response->headers->set('Cache-Control', 'nocache, no-store, max-age=0, must-revalidate');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expires', 'Sat, 01 Jan 2000 00:00:00 GMT');

        return $response;
    }
}
