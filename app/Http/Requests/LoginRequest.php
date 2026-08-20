<?php

namespace App\Http\Requests;

use App\Support\LoginThrottle;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email'    => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        if (! Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {
            $detikTerkunci = LoginThrottle::registerFailedAttempt($this);

            if ($detikTerkunci > 0) {
                event(new Lockout($this));

                throw ValidationException::withMessages([
                    'email' => 'Anda salah memasukkan password 3 kali. Silakan coba lagi dalam 1 menit.',
                ]);
            }

            $sisaPercobaan = LoginThrottle::remainingAttempts($this);

            throw ValidationException::withMessages([
                'email' => "Email atau password yang Anda masukkan salah. Sisa percobaan: {$sisaPercobaan}.",
            ]);
        }

        LoginThrottle::clear($this);
    }

    public function ensureIsNotRateLimited(): void
    {
        $detik = LoginThrottle::remainingLockoutSeconds($this);

        if ($detik <= 0) {
            return;
        }

        event(new Lockout($this));

        $waktu = $this->formatSisaWaktu($detik);

        throw ValidationException::withMessages([
            'email' => "Terlalu banyak percobaan login yang gagal. Silakan coba lagi dalam {$waktu}.",
        ]);
    }

    private function formatSisaWaktu(int $detik): string
    {
        $menit = intdiv($detik, 60);
        $sisaDetik = $detik % 60;

        if ($menit > 0 && $sisaDetik > 0) {
            return "{$menit} menit {$sisaDetik} detik";
        }

        if ($menit > 0) {
            return "{$menit} menit";
        }

        return "{$sisaDetik} detik";
    }
}