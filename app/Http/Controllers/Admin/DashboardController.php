<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PesanMasuk;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProduk = Product::count();
        $produkAktif = Product::aktif()->count();
        $totalPesan = PesanMasuk::count();
        $pesanBelumDibaca = PesanMasuk::where('is_read', false)->count();
        $pesanTerbaru = PesanMasuk::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalProduk',
            'produkAktif',
            'totalPesan',
            'pesanBelumDibaca',
            'pesanTerbaru'
        ));
    }
}
