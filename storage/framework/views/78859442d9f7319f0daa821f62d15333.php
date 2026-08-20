<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Dashboard'); ?> | Admin Easystem Smart Tech</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body class="section-bg-light">
    <div class="d-flex">
        
        <aside class="admin-sidebar p-3" style="width:260px;flex-shrink:0;">
            <div class="text-center mb-4 mt-2">
                <img src="<?php echo e(asset('images/logo3-easystem.png')); ?>" class="logo-admin"> <br>
                <h6 class="text-white mt-2 mb-0">Easystem SmartTech</h6>
                <small class="text-white-50">Admin Panel</small>
            </div>
            <ul class="nav nav-pills flex-column">
                <li class="nav-item mb-1">
                    <a class="nav-link <?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>" href="<?php echo e(route('admin.dashboard')); ?>">
                        <i class="bi bi-speedometer2 me-2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a class="nav-link <?php echo e(request()->routeIs('admin.products.*') ? 'active' : ''); ?>" href="<?php echo e(route('admin.products.index')); ?>">
                        <i class="bi bi-box-seam me-2"></i> Produk
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a class="nav-link <?php echo e(request()->routeIs('admin.messages.*') ? 'active' : ''); ?>" href="<?php echo e(route('admin.messages.index')); ?>">
                        <i class="bi bi-envelope me-2"></i> Pesan Masuk
                    </a>
                </li>
                <li class="nav-item mt-4">
                    
                    <a class="nav-link" href="<?php echo e(route('home')); ?>" target="_blank" rel="noopener">
                        <i class="bi bi-box-arrow-up-right me-2"></i> Lihat Website
                    </a>
                </li>
                <li class="nav-item mt-1">
                    <form method="POST" action="<?php echo e(route('admin.logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="nav-link w-100 text-start border-0 bg-transparent">
                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </aside>

        
        <main class="flex-grow-1 p-4">
            <nav class="navbar navbar-light bg-white rounded-3 shadow-sm px-3 mb-4">
                <span class="navbar-brand mb-0 h5 text-primary"><?php echo $__env->yieldContent('title', 'Dashboard'); ?></span>
                <div class="d-flex align-items-center gap-3">
                    <a href="<?php echo e(route('home')); ?>" rel="noopener" class="small text-secondary text-decoration-none">
                        <i class="bi bi-box-arrow-up-right me-1"></i>Lihat Website
                    </a>
                    <span class="text-secondary small"><?php echo e(auth()->user()->name ?? ''); ?></span>
                </div>
            </nav>

            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show shadow-sm">
                    <i class="bi bi-check-circle-fill me-1"></i> <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\Users\Thinkpad\Downloads\SERKOM\EASYSTEM SMART TECH\resources\views/layouts/admin.blade.php ENDPATH**/ ?>