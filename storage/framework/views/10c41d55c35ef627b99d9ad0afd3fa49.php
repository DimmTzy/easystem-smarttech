<?php $__env->startSection('title', 'Tambah Produk'); ?>

<?php $__env->startSection('content'); ?>
<div class="card stat-card p-4" style="max-width:700px;">
    <h5 class="fw-bold mb-3">Tambah Produk</h5>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger small">
            <ul class="mb-0">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('admin.products.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label class="form-label">Nama Produk</label>
            <input type="text" name="nama_produk" value="<?php echo e(old('nama_produk')); ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <input type="text" name="kategori" value="<?php echo e(old('kategori')); ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" rows="4" class="form-control" required><?php echo e(old('deskripsi')); ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="aktif" <?php if(old('status') == 'aktif'): echo 'selected'; endif; ?>>Aktif</option>
                <option value="nonaktif" <?php if(old('status') == 'nonaktif'): echo 'selected'; endif; ?>>Nonaktif</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="form-label">Gambar Produk</label>
            <input type="file" name="gambar" class="form-control" accept="image/*">
        </div>
        <button type="submit" class="btn btn-gradient">
            <i class="bi bi-save me-1"></i> Simpan
        </button>
        <a href="<?php echo e(route('admin.products.index')); ?>" class="btn btn-outline-secondary">Batal</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\School\SERKOM\EASYSTEM SMART TECH\resources\views/admin/products/create.blade.php ENDPATH**/ ?>