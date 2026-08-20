<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'nama_produk',
        'slug',
        'gambar',
        'kategori',
        'deskripsi',
        'status',
    ];

    protected static function booted(): void
    {
        static::saving(function (Product $product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->nama_produk) . '-' . Str::random(5);
            }
        });
    }

    public function scopeAktif($query)
    {
        return $query->where('status', 'aktif');
    }

    public function getGambarUrlAttribute(): string
    {
        return $this->gambar
            ? asset('storage/' . $this->gambar)
            : asset('images/no-image.png');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
