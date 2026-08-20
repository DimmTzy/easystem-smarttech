@extends('layouts.app')

@section('title', 'Layanan')

@section('content')
<section class="py-5 mt-4">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="section-title">Layanan Kami</h1>
            <p class="text-secondary">Layanan lengkap untuk mendukung transformasi digital bisnis Anda.</p>
        </div>

        <div class="row g-4">
            @php
                $layanan = [
                    ['icon' => 'bi bi-camera-video', 'title' => 'Responsive Layout', 'desc' => 'Tampilan dapat bergerak dan mengubah ukuran secara otomatis.'],
                    ['icon' => 'bi bi-display', 'title' => 'Clean & Minimal', 'desc' => 'mengutamakan kesederhanaan, kerapian, dan fungsi tanpa elemen berlebihan.'],
                    ['icon' => 'bi bi-headphones', 'title' => 'Creative Ideas', 'desc' => 'Mengembangkan solusi inovatif dengan pendekatan yang kreatif dan tepat sasaran.'],
                    ['icon' => 'bi bi-headset', 'title' => 'Premium Support', 'desc' => 'Dukungan teknis responsif dengan solusi cepat dan layanan profesional.'],
                ];
            @endphp

            @foreach ($layanan as $item)
                <div class="col-md-4">
                    <div class="card card-modern p-4 h-100 text-center">
                        <div class="icon-circle mx-auto"><i class="bi {{ $item['icon'] }}"></i></div>
                        <h5 class="fw-bold">{{ $item['title'] }}</h5>
                        <p class="text-secondary small mb-0">{{ $item['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
