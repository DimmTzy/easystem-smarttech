@extends('layouts.app')

@section('title', $produk->nama_produk)
@section('meta_description', Str::limit($produk->deskripsi, 150))

@section('content')
<section class="py-5 mt-4">
    <div class="container">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Produk</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $produk->nama_produk }}</li>
            </ol>
        </nav>

        <div class="row g-5 mb-5">
            <div class="col-lg-6">
                <img src="{{ $produk->gambar_url }}" class="img-fluid rounded-4 shadow-sm w-100" style="max-height:420px;object-fit:cover;" alt="{{ $produk->nama_produk }}">
            </div>
            <div class="col-lg-6">
                <span class="badge rounded-pill text-bg-light border mb-3">{{ $produk->kategori }}</span>
                <h1 class="fw-bold text-primary">{{ $produk->nama_produk }}</h1>
                <p class="text-secondary mt-3" style="white-space: pre-line;">{{ $produk->deskripsi }}</p>
                <a href="{{ route('contact') }}" class="btn btn-gradient mt-3">
                    <i class="bi bi-envelope-paper-fill me-1"></i> Konsultasikan Kebutuhan Anda
                </a>
            </div>
        </div>

        @if ($produkLain->count())
            <h4 class="fw-bold section-title mb-4">Produk Lainnya</h4>
            <div class="row g-4">
                @foreach ($produkLain as $item)
                    <div class="col-md-4">
                        <a href="{{ route('products.show', $item) }}" class="text-decoration-none text-dark">
                            <div class="card card-modern h-100">
                                <img src="{{ $item->gambar_url }}" class="card-img-top" style="height:180px;object-fit:cover;" alt="{{ $item->nama_produk }}">
                                <div class="card-body">
                                    <h6 class="fw-bold">{{ $item->nama_produk }}</h6>
                                    <p class="text-secondary small mb-0">{{ Str::limit($item->deskripsi, 70) }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
@endsection
