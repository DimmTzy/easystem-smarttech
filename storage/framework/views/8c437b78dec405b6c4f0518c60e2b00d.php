<?php $__env->startSection('title', 'Layanan'); ?>

<?php $__env->startSection('content'); ?>
<section class="py-5 mt-4">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="section-title">Layanan Kami</h1>
            <p class="text-secondary">Layanan lengkap untuk mendukung transformasi digital bisnis Anda.</p>
        </div>

        <div class="row g-4">
            <?php
                $layanan = [
                    ['icon' => 'bi bi-camera-video', 'title' => 'Responsive Layout', 'desc' => 'Tampilan dapat bergerak dan mengubah ukuran secara otomatis.'],
                    ['icon' => 'bi bi-display', 'title' => 'Clean & Minimal', 'desc' => 'mengutamakan kesederhanaan, kerapian, dan fungsi tanpa elemen berlebihan.'],
                    ['icon' => 'bi bi-headphones', 'title' => 'Creative Ideas', 'desc' => 'Mengembangkan solusi inovatif dengan pendekatan yang kreatif dan tepat sasaran.'],
                    ['icon' => 'bi bi-headset', 'title' => 'Premium Support', 'desc' => 'Dukungan teknis responsif dengan solusi cepat dan layanan profesional.'],
                ];
            ?>

            <?php $__currentLoopData = $layanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">
                    <div class="card card-modern p-4 h-100 text-center">
                        <div class="icon-circle mx-auto"><i class="bi <?php echo e($item['icon']); ?>"></i></div>
                        <h5 class="fw-bold"><?php echo e($item['title']); ?></h5>
                        <p class="text-secondary small mb-0"><?php echo e($item['desc']); ?></p>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Thinkpad\Downloads\SERKOM\EASYSTEM SMART TECH\resources\views/services.blade.php ENDPATH**/ ?>