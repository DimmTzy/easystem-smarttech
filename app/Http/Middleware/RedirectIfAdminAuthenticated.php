<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

/**
 * Jika admin sudah login, mencegah dia membuka kembali halaman login.
 * Contoh: admin sudah login di tab lain / sesi masih aktif, lalu membuka
 * kembali /admin/login secara manual → langsung diarahkan ke dashboard,
 * bukan menampilkan form login lagi.
 */
class RedirectIfAdminAuthenticated
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }

        return $next($request);
    }
}
