@extends('layouts.admin')

@section('title', 'Edit Produk')

@section('content')
<div class="card stat-card p-4" style="max-width:700px;">
    <h5 class="fw-bold mb-3">Edit Produk</h5>

    @if ($errors->any())
        <div class="alert alert-danger small">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.update', $produk) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nama Produk</label>
            <input type="text" name="nama_produk" value="{{ old('nama_produk', $produk->nama_produk) }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <input type="text" name="kategori" value="{{ old('kategori', $produk->kategori) }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" rows="4" class="form-control" required>{{ old('deskripsi', $produk->deskripsi) }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="aktif" @selected(old('status', $produk->status) == 'aktif')>Aktif</option>
                <option value="nonaktif" @selected(old('status', $produk->status) == 'nonaktif')>Nonaktif</option>
            </select>
        </div>
        <div class="mb-3">
            <img src="{{ $produk->gambar_url }}" style="width:100px;height:100px;object-fit:cover;" class="rounded-3 mb-2" alt="">
        </div>
        <div class="mb-4">
            <label class="form-label">Ganti Gambar Produk (opsional)</label>
            <input type="file" name="gambar" class="form-control" accept="image/*">
        </div>
        <button type="submit" class="btn btn-gradient">
            <i class="bi bi-save me-1"></i> Perbarui
        </button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">Batal</a>
    </form>
</div>
@endsection
