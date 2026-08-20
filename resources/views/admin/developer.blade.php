@extends('layouts.admin')

@section('title', 'Profil Pembuat Website')

@section('content')
<div class="card stat-card p-4 text-center mx-auto" style="max-width:480px;">
    {{-- Kalau punya foto, upload ke public/images/developer.jpg lalu ganti baris di bawah --}}
    <img src="{{ asset('images/profil.jpeg') }}"
         alt="Foto Pembuat Website"
         class="rounded-circle mx-auto mb-3"
         style="width:110px;height:110px;object-fit:cover;border:3px solid #0d47a1;">

    <h5 class="fw-bold mb-0">Dimas Teristian Sugiyono</h5>
    <p class="text-secondary small mb-2">Full Stack Web Developer</p>

    <hr>

    <div class="text-start small">
        <p class="mb-2">
            <i class="bi bi-mortarboard-fill text-primary me-2"></i>
            SMKN 1 MAJA
        </p>
        <p class="mb-2">
            <i class="bi bi-envelope-fill text-primary me-2"></i>
            dimasteristiansugiyono@gmail.com
        </p>
        <p class="mb-2">
            <i class="bi bi-telephone-fill text-primary me-2"></i>
            +62 895-6368-06093
        </p>
        <p class="mb-0">
            <i class="bi bi-code-slash text-primary me-2"></i>
            Laravel 11 &middot; MySQL &middot; Bootstrap 5
        </p>
    </div>

    <hr>

    <div class="d-flex justify-content-center gap-3 fs-5">
        <a href="https://github.com/DimmTzy" target="_blank" class="text-secondary" aria-label="GitHub"><i class="bi bi-github"></i></a>
        <a href="https://www.instagram.com/teristian_?igsi=MWhldm91NXRxb3MwZg==" target="_blank" class="text-secondary" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
    </div>
</div>
@endsection