<?php $__env->startSection('title', 'Kontak'); ?>

<?php $__env->startSection('content'); ?>
<section class="py-5 mt-4">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="section-title">Hubungi Kami</h1>
            <p class="text-secondary">Kami siap membantu kebutuhan teknologi bisnis Anda.</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-5">
                <div class="card card-modern p-4 h-100">
                    <h5 class="fw-bold text-primary mb-3">Informasi Kontak</h5>
                    <p class="mb-2"><i class="bi bi-geo-alt-fill text-primary me-2"></i>Tonjong, Majalengka</p>
                    <p class="mb-2"><i class="bi bi-telephone-fill text-primary me-2"></i>+62 811 2199 987</p>
                    <p class="mb-4"><i class="bi bi-envelope-fill text-primary me-2"></i>info@easystem.co.id</p>
                    <div class="ratio ratio-4x3 rounded-3 overflow-hidden">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15846.03436931475!2d108.240718!3d-6.829455!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe2ad8ca67a5c7d00!2sCV+eaSYstem!5e0!3m2!1sen!2s!4v1497604359419""
                            style="border:0;" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                            title="Lokasi PT. Easystem Smart Tech"></iframe>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="card card-modern p-4 h-100">
                    <h5 class="fw-bold text-primary mb-3">Kirim Pesan</h5>

                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0 small">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="<?php echo e(route('contact.store')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Nama</label>
                                <input type="text" name="nama" value="<?php echo e(old('nama')); ?>" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Nomor HP</label>
                                <input type="text" name="no_hp" value="<?php echo e(old('no_hp')); ?>" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Subjek</label>
                                <input type="text" name="subjek" value="<?php echo e(old('subjek')); ?>" class="form-control" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Pesan</label>
                                <textarea name="pesan" rows="5" class="form-control" required><?php echo e(old('pesan')); ?></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-gradient">
                                    <i class="bi bi-send-fill me-1"></i> Kirim Pesan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Thinkpad\Downloads\SERKOM\EASYSTEM SMART TECH\resources\views/contact.blade.php ENDPATH**/ ?>