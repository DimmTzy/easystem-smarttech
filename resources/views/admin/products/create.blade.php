@extends('layouts.admin')

@section('title', 'Tambah Produk')

@section('content')
<div class="card stat-card p-4" style="max-width:700px;">
    <h5 class="fw-bold mb-3">Tambah Produk</h5>

    @if ($errors->any())
        <div class="alert alert-danger small">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama Produk</label>
            <input type="text" name="nama_produk" value="{{ old('nama_produk') }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <input type="text" name="kategori" value="{{ old('kategori') }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" rows="4" class="form-control" required>{{ old('deskripsi') }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="aktif" @selected(old('status') == 'aktif')>Aktif</option>
                <option value="nonaktif" @selected(old('status') == 'nonaktif')>Nonaktif</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="form-label">Gambar Produk</label>
            <input type="file" name="gambar" class="form-control" accept="image/*">
        </div>
        <button type="submit" class="btn btn-gradient">
            <i class="bi bi-save me-1"></i> Simpan
        </button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">Batal</a>
    </form>
</div>
@endsection
