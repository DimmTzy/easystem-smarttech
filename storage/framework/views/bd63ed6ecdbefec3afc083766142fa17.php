<?php $__env->startSection('title', $produk->nama_produk); ?>
<?php $__env->startSection('meta_description', Str::limit($produk->deskripsi, 150)); ?>

<?php $__env->startSection('content'); ?>
<section class="py-5 mt-4">
    <div class="container">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('products.index')); ?>">Produk</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo e($produk->nama_produk); ?></li>
            </ol>
        </nav>

        <div class="row g-5 mb-5">
            <div class="col-lg-6">
                <img src="<?php echo e($produk->gambar_url); ?>" class="img-fluid rounded-4 shadow-sm w-100" style="max-height:420px;object-fit:cover;" alt="<?php echo e($produk->nama_produk); ?>">
            </div>
            <div class="col-lg-6">
                <span class="badge rounded-pill text-bg-light border mb-3"><?php echo e($produk->kategori); ?></span>
                <h1 class="fw-bold text-primary"><?php echo e($produk->nama_produk); ?></h1>
                <p class="text-secondary mt-3" style="white-space: pre-line;"><?php echo e($produk->deskripsi); ?></p>
                <a href="<?php echo e(route('contact')); ?>" class="btn btn-gradient mt-3">
                    <i class="bi bi-envelope-paper-fill me-1"></i> Konsultasikan Kebutuhan Anda
                </a>
            </div>
        </div>

        <?php if($produkLain->count()): ?>
            <h4 class="fw-bold section-title mb-4">Produk Lainnya</h4>
            <div class="row g-4">
                <?php $__currentLoopData = $produkLain; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4">
                        <a href="<?php echo e(route('products.show', $item)); ?>" class="text-decoration-none text-dark">
                            <div class="card card-modern h-100">
                                <img src="<?php echo e($item->gambar_url); ?>" class="card-img-top" style="height:180px;object-fit:cover;" alt="<?php echo e($item->nama_produk); ?>">
                                <div class="card-body">
                                    <h6 class="fw-bold"><?php echo e($item->nama_produk); ?></h6>
                                    <p class="text-secondary small mb-0"><?php echo e(Str::limit($item->deskripsi, 70)); ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\School\SERKOM\EASYSTEM SMART TECH\resources\views/products/show.blade.php ENDPATH**/ ?>