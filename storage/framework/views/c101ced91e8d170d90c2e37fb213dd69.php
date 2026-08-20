<?php $__env->startSection('title', 'Detail Pesan'); ?>

<?php $__env->startSection('content'); ?>
<div class="card stat-card p-4" style="max-width:700px;">
    <h5 class="fw-bold mb-3">Detail Pesan</h5>

    <dl class="row">
        <dt class="col-sm-3">Nama</dt>
        <dd class="col-sm-9"><?php echo e($pesan->nama); ?></dd>

        <dt class="col-sm-3">Email</dt>
        <dd class="col-sm-9"><?php echo e($pesan->email); ?></dd>

        <dt class="col-sm-3">No. HP</dt>
        <dd class="col-sm-9"><?php echo e($pesan->no_hp); ?></dd>

        <dt class="col-sm-3">Subjek</dt>
        <dd class="col-sm-9"><?php echo e($pesan->subjek); ?></dd>

        <dt class="col-sm-3">Tanggal</dt>
        <dd class="col-sm-9"><?php echo e($pesan->created_at->format('d M Y H:i')); ?></dd>

        <dt class="col-sm-3">Pesan</dt>
        <dd class="col-sm-9" style="white-space: pre-line;"><?php echo e($pesan->pesan); ?></dd>
    </dl>

    <div class="d-flex gap-2 mt-3">
        <a href="<?php echo e(route('admin.messages.index')); ?>" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
        <form action="<?php echo e(route('admin.messages.destroy', $pesan)); ?>" method="POST"
              onsubmit="return confirm('Yakin ingin menghapus pesan ini?');">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" class="btn btn-outline-danger">
                <i class="bi bi-trash"></i> Hapus
            </button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\School\SERKOM\EASYSTEM SMART TECH\resources\views/admin/messages/show.blade.php ENDPATH**/ ?>