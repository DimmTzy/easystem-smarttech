<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $produk = [
            [
                'nama_produk' => 'Easystem POS',
                'kategori' => 'Point of Sale',
                'deskripsi' => 'Sistem kasir modern berbasis cloud untuk retail dan F&B, dilengkapi laporan penjualan real-time.',
                'status' => 'aktif',
            ],
            [
                'nama_produk' => 'Easystem ERP',
                'kategori' => 'Enterprise',
                'deskripsi' => 'Solusi perencanaan sumber daya perusahaan yang mengintegrasikan keuangan, inventori, dan HR dalam satu platform.',
                'status' => 'aktif',
            ],
            [
                'nama_produk' => 'Easystem HRIS',
                'kategori' => 'Human Resource',
                'deskripsi' => 'Aplikasi manajemen sumber daya manusia untuk absensi, payroll, dan penilaian kinerja karyawan.',
                'status' => 'aktif',
            ],
            [
                'nama_produk' => 'Easystem CRM',
                'kategori' => 'Customer Relationship',
                'deskripsi' => 'Kelola hubungan pelanggan, pipeline penjualan, dan follow-up secara terpusat dan efisien.',
                'status' => 'aktif',
            ],
        ];

        foreach ($produk as $item) {
            Product::firstOrCreate(['nama_produk' => $item['nama_produk']], $item);
        }
    }
}
