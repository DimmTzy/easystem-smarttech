<?php $__env->startSection('title', 'Pesan Masuk'); ?>

<?php $__env->startSection('content'); ?>
<div class="card stat-card p-4">
    <h5 class="fw-bold mb-3">Daftar Pesan Masuk</h5>

    <?php if($pesan->count()): ?>
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Subjek</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $pesan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($item->nama); ?></td>
                            <td><?php echo e($item->email); ?></td>
                            <td><?php echo e($item->subjek); ?></td>
                            <td><?php echo e($item->created_at->format('d M Y H:i')); ?></td>
                            <td>
                                <?php if($item->is_read): ?>
                                    <span class="badge bg-secondary">Dibaca</span>
                                <?php else: ?>
                                    <span class="badge bg-primary">Baru</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-end">
                                <a href="<?php echo e(route('admin.messages.show', $item)); ?>" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <form action="<?php echo e(route('admin.messages.destroy', $item)); ?>" method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus pesan ini?');">
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
        <div class="mt-3"><?php echo e($pesan->links()); ?></div>
    <?php else: ?>
        <p class="text-secondary mb-0">Belum ada pesan masuk.</p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\School\SERKOM\EASYSTEM SMART TECH\resources\views/admin/messages/index.blade.php ENDPATH**/ ?>