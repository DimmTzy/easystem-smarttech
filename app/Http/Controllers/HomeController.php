<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Halaman Home.
     */
    public function index()
    {
        $produkUnggulan = Product::aktif()->latest()->take(3)->get();

        return view('home', compact('produkUnggulan'));
    }

    /**
     * Halaman Tentang Kami.
     */
    public function about()
    {
        return view('about');
    }

    /**
     * Halaman Layanan.
     */
    public function services()
    {
        return view('services');
    }
}
