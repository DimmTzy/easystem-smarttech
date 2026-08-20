<?php $__env->startSection('title', 'Produk'); ?>

<?php $__env->startSection('content'); ?>
<div class="card stat-card p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold mb-0">Daftar Produk</h5>
        <a href="<?php echo e(route('admin.products.create')); ?>" class="btn btn-gradient btn-sm">
            <i class="bi bi-plus-lg me-1"></i> Tambah Produk
        </a>
    </div>

    <?php if($produk->count()): ?>
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><img src="<?php echo e($item->gambar_url); ?>" style="width:60px;height:60px;object-fit:cover;" class="rounded-3" alt=""></td>
                            <td><?php echo e($item->nama_produk); ?></td>
                            <td><?php echo e($item->kategori); ?></td>
                            <td>
                                <?php if($item->status === 'aktif'): ?>
                                    <span class="badge bg-success">Aktif</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">Nonaktif</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-end">
                                <a href="<?php echo e(route('admin.products.edit', $item)); ?>" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="<?php echo e(route('admin.products.destroy', $item)); ?>" method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <div class="mt-3"><?php echo e($produk->links()); ?></div>
    <?php else: ?>
        <p class="text-secondary mb-0">Belum ada produk. Silakan tambahkan produk baru.</p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Thinkpad\Downloads\SERKOM\EASYSTEM SMART TECH\resources\views/admin/products/index.blade.php ENDPATH**/ ?>