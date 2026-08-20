<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Menampilkan daftar produk aktif ke publik (dengan filter kategori & pencarian).
     */
    public function index(Request $request)
    {
        $query = Product::aktif()->latest();

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->string('kategori'));
        }

        if ($request->filled('cari')) {
            $keyword = $request->string('cari');
            $query->where(function ($q) use ($keyword) {
                $q->where('nama_produk', 'like', "%{$keyword}%")
                    ->orWhere('deskripsi', 'like', "%{$keyword}%");
            });
        }

        $produk = $query->paginate(9)->withQueryString();
        $kategoriList = Product::aktif()->distinct()->pluck('kategori');

        return view('products.index', compact('produk', 'kategoriList'));
    }

    /**
     * Menampilkan detail produk berdasarkan slug.
     */
    public function show(Product $product)
    {
        abort_if($product->status !== 'aktif', 404);

        $produkLain = Product::aktif()
            ->where('id', '!=', $product->id)
            ->inRandomOrder()
            ->take(3)
            ->get();

        return view('products.show', ['produk' => $product, 'produkLain' => $produkLain]);
    }
}
