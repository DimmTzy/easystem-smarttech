<?php $__env->startSection('title', 'Beranda'); ?>

<?php $__env->startSection('content'); ?>


<section class="hero-section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 fade-in-up">
                <p class="hero-tagline mb-2">Solusi Teknologi Bisnis Terpercaya</p>
                <h1 class="hero-title display-5 mb-3">PT. EASYSTEM SMART TECH</h1>
                <p class="lead text-secondary mb-4">
                    Kami menyediakan layanan pembuatan website, pengembangan aplikasi seluler, 
                    konsultasi IT, dan solusi digital untuk instansi pemerintah, desa, serta bisnis.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="<?php echo e(route('contact')); ?>" class="btn btn-gradient">
                        <i class="bi bi-envelope-paper-fill me-1"></i> Hubungi Kami
                    </a>
                    <a href="<?php echo e(route('products.index')); ?>" class="btn btn-outline-gradient">
                        <i class="bi bi-box-seam me-1"></i> Lihat Produk
                    </a>
                </div>
            </div>
            <div class="col-lg-6 text-center fade-in-up delay-2">
                <img src="<?php echo e(asset('images/logo2-easystem.png')); ?>" class="logo2">
            </div>
        </div>
    </div>
</section>


<?php if($produkUnggulan->count()): ?>
<section class="py-5 section-bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Produk Unggulan</h2>
            <p class="text-secondary">Beberapa solusi terbaik dari kami.</p>
        </div>
        <div class="row g-4">
            <?php $__currentLoopData = $produkUnggulan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">
                    <a href="<?php echo e(route('products.show', $produk)); ?>" class="text-decoration-none text-dark">
                        <div class="card card-modern h-100">
                            <img src="<?php echo e($produk->gambar_url); ?>" class="card-img-top" style="height:200px;object-fit:cover;" alt="<?php echo e($produk->nama_produk); ?>">
                            <div class="card-body">
                                <span class="badge rounded-pill text-bg-light border mb-2"><?php echo e($produk->kategori); ?></span>
                                <h5 class="fw-bold"><?php echo e($produk->nama_produk); ?></h5>
                                <p class="text-secondary small"><?php echo e(Str::limit($produk->deskripsi, 90)); ?></p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="text-center mt-4">
            <a href="<?php echo e(route('products.index')); ?>" class="btn btn-outline-gradient">Lihat Semua Produk</a>
        </div>
    </div>
</section>

<section class="pt-0 pb-5">
    <div class="container">
        <div class="text-center mb-5">
            <br><br>
            <h2 class="section-title">Dipercaya Oleh Banyak Client</h2>
        </div>
        <div class="gallery">
            <div class="item">
                    <img src="<?php echo e(asset('images/client1.png')); ?>" alt="Gambar 1">
                </div>
                <div class="item">
                    <img src="<?php echo e(asset('images/client2.png')); ?>" alt="Gambar 2">
                </div>
                <div class="item">
                    <img src="<?php echo e(asset('images/client3.png')); ?>" alt="Gambar 3">
                </div>
                <div class="item">
                    <img src="<?php echo e(asset('images/client4.jpg')); ?>" alt="Gambar 4">
                </div>
                <div class="item">
                    <img src="<?php echo e(asset('images/client5.png')); ?>" alt="Gambar 5">
                </div>
                <div class="item">
                    <img src="<?php echo e(asset('images/client6.png')); ?>" alt="Gambar 6">
                </div>
                <div class="item">
                    <img src="<?php echo e(asset('images/client7.png')); ?>" alt="Gambar 7">
                </div>
                <div class="item">
                    <img src="<?php echo e(asset('images/client8.png')); ?>" alt="Gambar 8">
                </div>
            </div>
        </div>
    </div>
</section>

<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Thinkpad\Downloads\SERKOM\EASYSTEM SMART TECH\resources\views/home.blade.php ENDPATH**/ ?>