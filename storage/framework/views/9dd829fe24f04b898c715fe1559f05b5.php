<nav class="navbar navbar-expand-lg navbar-easystem sticky-top py-3">
    <div class="container">
        <a class="navbar-brand navbar-brand-logo fs-4" href="<?php echo e(route('home')); ?>">
            <img src="<?php echo e(asset('images/logo-easystem.png')); ?>" class="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                <li class="nav-item">
                    <a class="nav-link <?php echo e(request()->routeIs('home') ? 'active fw-semibold' : ''); ?>" href="<?php echo e(route('home')); ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(request()->routeIs('about') ? 'active fw-semibold' : ''); ?>" href="<?php echo e(route('about')); ?>">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(request()->routeIs('products.*') ? 'active fw-semibold' : ''); ?>" href="<?php echo e(route('products.index')); ?>">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(request()->routeIs('services') ? 'active fw-semibold' : ''); ?>" href="<?php echo e(route('services')); ?>">Layanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(request()->routeIs('contact') ? 'active fw-semibold' : ''); ?>" href="<?php echo e(route('contact')); ?>">Kontak</a>
                </li>
                <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
                    <?php if(auth()->guard()->check()): ?>
                        
                        <a class="btn btn-login-admin btn-sm" href="<?php echo e(route('admin.dashboard')); ?>">
                            <i class="bi bi-speedometer2 me-1"></i>Dashboard Admin
                        </a>
                    <?php else: ?>
                        <a class="btn btn-login-admin btn-sm" href="<?php echo e(route('admin.login')); ?>">
                            <i class="bi bi-box-arrow-in-right me-1"></i>Login Admin
                        </a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php /**PATH C:\Users\Thinkpad\Downloads\SERKOM\EASYSTEM SMART TECH\resources\views/components/navbar.blade.php ENDPATH**/ ?>