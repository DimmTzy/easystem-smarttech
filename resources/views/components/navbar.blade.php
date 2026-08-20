<nav class="navbar navbar-expand-lg navbar-easystem sticky-top py-3">
    <div class="container">
        <a class="navbar-brand navbar-brand-logo fs-4" href="{{ route('home') }}">
            <img src="{{ asset('images/logo-easystem.png') }}" class="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active fw-semibold' : '' }}" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active fw-semibold' : '' }}" href="{{ route('about') }}">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('products.*') ? 'active fw-semibold' : '' }}" href="{{ route('products.index') }}">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('services') ? 'active fw-semibold' : '' }}" href="{{ route('services') }}">Layanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'active fw-semibold' : '' }}" href="{{ route('contact') }}">Kontak</a>
                </li>
                <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
                    @auth
                        {{-- Admin sudah login: tidak perlu login lagi, cukup arahkan ke dashboard --}}
                        <a class="btn btn-login-admin btn-sm" href="{{ route('admin.dashboard') }}">
                            <i class="bi bi-speedometer2 me-1"></i>Dashboard Admin
                        </a>
                    @else
                        <a class="btn btn-login-admin btn-sm" href="{{ route('admin.login') }}">
                            <i class="bi bi-box-arrow-in-right me-1"></i>Login Admin
                        </a>
                    @endauth
                </li>
            </ul>
        </div>
    </div>
</nav>
