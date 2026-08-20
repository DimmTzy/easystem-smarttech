<?php $__env->startSection('title', 'Produk'); ?>

<?php $__env->startSection('content'); ?>
<section class="py-5 mt-4">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="section-title">Produk Kami</h1>
            <p class="text-secondary">Solusi teknologi yang dirancang untuk kebutuhan bisnis Anda.</p>
        </div>

        <form method="GET" action="<?php echo e(route('products.index')); ?>" class="row g-2 justify-content-center mb-5">
            <div class="col-md-4">
                <input type="text" name="cari" value="<?php echo e(request('cari')); ?>" class="form-control" placeholder="Cari produk...">
            </div>
            <div class="col-md-3">
                <select name="kategori" class="form-select">
                    <option value="">Semua Kategori</option>
                    <?php $__currentLoopData = $kategoriList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($kategori); ?>" <?php if(request('kategori') == $kategori): echo 'selected'; endif; ?>><?php echo e($kategori); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-md-auto">
                <button type="submit" class="btn btn-gradient"><i class="bi bi-search"></i> Cari</button>
            </div>
        </form>

        <?php if($produk->count()): ?>
            <div class="row g-4">
                <?php $__currentLoopData = $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4">
                        <a href="<?php echo e(route('products.show', $item)); ?>" class="text-decoration-none text-dark">
                            <div class="card card-modern h-100">
                                <img src="<?php echo e($item->gambar_url); ?>" class="card-img-top" style="height:200px;object-fit:cover;" alt="<?php echo e($item->nama_produk); ?>">
                                <div class="card-body">
                                    <span class="badge rounded-pill text-bg-light border mb-2"><?php echo e($item->kategori); ?></span>
                                    <h5 class="fw-bold"><?php echo e($item->nama_produk); ?></h5>
                                    <p class="text-secondary small"><?php echo e(Str::limit($item->deskripsi, 90)); ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="mt-5 d-flex justify-content-center">
                <?php echo e($produk->links()); ?>

            </div>
        <?php else: ?>
            <div class="text-center text-secondary py-5">
                <i class="bi bi-inbox fs-1 d-block mb-3"></i>
                Belum ada produk yang tersedia saat ini.
            </div>
        <?php endif; ?>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\School\SERKOM\EASYSTEM SMART TECH\resources\views/products/index.blade.php ENDPATH**/ ?>