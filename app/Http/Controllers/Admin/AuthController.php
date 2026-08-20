<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Support\LoginThrottle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman login admin.
     * Sisa waktu kunci dihitung ULANG setiap kali halaman ini dibuka —
     * baik lewat submit form maupun berpindah halaman lalu kembali lagi —
     * supaya angkanya selalu sesuai waktu sebenarnya di server.
     */
    public function create(Request $request)
    {
        $sisaDetik = LoginThrottle::remainingLockoutSeconds($request);

        return view('auth.login', [
            'lockoutSeconds' => $sisaDetik > 0 ? $sisaDetik : null,
        ]);
    }

    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('admin.dashboard'));
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', 'Anda berhasil logout.');
    }
}