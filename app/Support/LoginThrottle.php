<?php

namespace App\Support;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

/**
 * Menyimpan seluruh logika pembatasan percobaan login di satu tempat,
 * supaya AuthController (saat membuka halaman login) dan LoginRequest
 * (saat submit form) selalu membaca sumber data yang sama persis.
 */
class LoginThrottle
{
    private const MAX_ATTEMPTS = 3;
    private const LOCKOUT_SECONDS = 60;

    private static function attemptsKey(Request $request): string
    {
        return 'login_attempts:' . $request->ip();
    }

    private static function lockoutKey(Request $request): string
    {
        return 'login_lockout:' . $request->ip();
    }

    /**
     * Menghitung ULANG sisa detik kunci berdasarkan waktu SEKARANG,
     * bukan dari nilai yang disimpan saat halaman terakhir dibuka.
     * Inilah yang membuat angkanya selalu akurat meski berpindah halaman.
     */
    public static function remainingLockoutSeconds(Request $request): int
    {
        $lockoutUntil = Cache::get(self::lockoutKey($request));

        if (! $lockoutUntil || now()->greaterThanOrEqualTo($lockoutUntil)) {
            return 0;
        }

        return now()->diffInSeconds($lockoutUntil);
    }

    /**
     * Mencatat 1 percobaan gagal. Mengembalikan jumlah detik kunci
     * jika baru saja kena limit (percobaan ke-3), atau 0 jika belum.
     */
    public static function registerFailedAttempt(Request $request): int
    {
        $percobaan = (int) Cache::get(self::attemptsKey($request), 0) + 1;

        if ($percobaan >= self::MAX_ATTEMPTS) {
            $lockoutUntil = now()->addSeconds(self::LOCKOUT_SECONDS);
            Cache::put(self::lockoutKey($request), $lockoutUntil, self::LOCKOUT_SECONDS);
            Cache::forget(self::attemptsKey($request));

            return self::LOCKOUT_SECONDS;
        }

        Cache::put(self::attemptsKey($request), $percobaan, self::LOCKOUT_SECONDS);

        return 0;
    }

    public static function remainingAttempts(Request $request): int
    {
        $percobaan = (int) Cache::get(self::attemptsKey($request), 0);

        return max(self::MAX_ATTEMPTS - $percobaan, 0);
    }

    public static function clear(Request $request): void
    {
        Cache::forget(self::attemptsKey($request));
        Cache::forget(self::lockoutKey($request));
    }
}