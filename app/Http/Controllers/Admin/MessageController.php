<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PesanMasuk;

class MessageController extends Controller
{
    /**
     * Menampilkan daftar pesan masuk, terbaru di atas.
     */
    public function index()
    {
        $pesan = PesanMasuk::latest()->paginate(10);

        return view('admin.messages.index', compact('pesan'));
    }

    /**
     * Menampilkan detail sebuah pesan dan menandainya sebagai sudah dibaca.
     */
    public function show(PesanMasuk $pesanMasuk)
    {
        if (! $pesanMasuk->is_read) {
            $pesanMasuk->update(['is_read' => true]);
        }

        return view('admin.messages.show', ['pesan' => $pesanMasuk]);
    }

    /**
     * Menghapus pesan.
     */
    public function destroy(PesanMasuk $pesanMasuk)
    {
        $pesanMasuk->delete();

        return redirect()
            ->route('admin.messages.index')
            ->with('success', 'Pesan berhasil dihapus.');
    }
}
