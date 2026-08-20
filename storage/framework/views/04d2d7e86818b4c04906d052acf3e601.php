<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card stat-card p-3">
            <div class="d-flex align-items-center gap-3">
                <div class="icon-circle mb-0"><i class="bi bi-box-seam"></i></div>
                <div>
                    <h4 class="fw-bold mb-0"><?php echo e($totalProduk); ?></h4>
                    <small class="text-secondary">Total Produk</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card p-3">
            <div class="d-flex align-items-center gap-3">
                <div class="icon-circle mb-0"><i class="bi bi-check2-circle"></i></div>
                <div>
                    <h4 class="fw-bold mb-0"><?php echo e($produkAktif); ?></h4>
                    <small class="text-secondary">Produk Aktif</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card p-3">
            <div class="d-flex align-items-center gap-3">
                <div class="icon-circle mb-0"><i class="bi bi-envelope"></i></div>
                <div>
                    <h4 class="fw-bold mb-0"><?php echo e($totalPesan); ?></h4>
                    <small class="text-secondary">Total Pesan</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card p-3">
            <div class="d-flex align-items-center gap-3">
                <div class="icon-circle mb-0"><i class="bi bi-envelope-exclamation"></i></div>
                <div>
                    <h4 class="fw-bold mb-0"><?php echo e($pesanBelumDibaca); ?></h4>
                    <small class="text-secondary">Pesan Belum Dibaca</small>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card stat-card p-4">
    <h5 class="fw-bold mb-3">Pesan Terbaru</h5>
    <?php if($pesanTerbaru->count()): ?>
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Subjek</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $pesanTerbaru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pesan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($pesan->nama); ?></td>
                            <td><?php echo e($pesan->subjek); ?></td>
                            <td><?php echo e($pesan->created_at->format('d M Y H:i')); ?></td>
                            <td>
                                <?php if($pesan->is_read): ?>
                                    <span class="badge bg-secondary">Dibaca</span>
                                <?php else: ?>
                                    <span class="badge bg-primary">Baru</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?php echo e(route('admin.messages.show', $pesan)); ?>" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p class="text-secondary mb-0">Belum ada pesan masuk.</p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\School\SERKOM\EASYSTEM SMART TECH\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>