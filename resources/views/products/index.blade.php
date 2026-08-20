@extends('layouts.app')

@section('title', 'Produk')

@section('content')
<section class="py-5 mt-4">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="section-title">Produk Kami</h1>
            <p class="text-secondary">Solusi teknologi yang dirancang untuk kebutuhan bisnis Anda.</p>
        </div>

        <form method="GET" action="{{ route('products.index') }}" class="row g-2 justify-content-center mb-5">
            <div class="col-md-4">
                <input type="text" name="cari" value="{{ request('cari') }}" class="form-control" placeholder="Cari produk...">
            </div>
            <div class="col-md-3">
                <select name="kategori" class="form-select">
                    <option value="">Semua Kategori</option>
                    @foreach ($kategoriList as $kategori)
                        <option value="{{ $kategori }}" @selected(request('kategori') == $kategori)>{{ $kategori }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-auto">
                <button type="submit" class="btn btn-gradient"><i class="bi bi-search"></i> Cari</button>
            </div>
        </form>

        @if ($produk->count())
            <div class="row g-4">
                @foreach ($produk as $item)
                    <div class="col-md-4">
                        <a href="{{ route('products.show', $item) }}" class="text-decoration-none text-dark">
                            <div class="card card-modern h-100">
                                <img src="{{ $item->gambar_url }}" class="card-img-top" style="height:200px;object-fit:cover;" alt="{{ $item->nama_produk }}">
                                <div class="card-body">
                                    <span class="badge rounded-pill text-bg-light border mb-2">{{ $item->kategori }}</span>
                                    <h5 class="fw-bold">{{ $item->nama_produk }}</h5>
                                    <p class="text-secondary small">{{ Str::limit($item->deskripsi, 90) }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="mt-5 d-flex justify-content-center">
                {{ $produk->links() }}
            </div>
        @else
            <div class="text-center text-secondary py-5">
                <i class="bi bi-inbox fs-1 d-block mb-3"></i>
                Belum ada produk yang tersedia saat ini.
            </div>
        @endif
    </div>
</section>
@endsection
