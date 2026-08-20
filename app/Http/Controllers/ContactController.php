<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\PesanMasuk;

class ContactController extends Controller
{
    /**
     * Menampilkan halaman kontak.
     */
    public function index()
    {
        return view('contact');
    }

    /**
     * Menyimpan pesan dari form kontak ke database.
     */
    public function store(ContactRequest $request)
    {
        PesanMasuk::create($request->validated());

        return redirect()
            ->route('contact')
            ->with('success', 'Pesan Anda berhasil dikirim. Tim kami akan segera menghubungi Anda.');
    }
}
