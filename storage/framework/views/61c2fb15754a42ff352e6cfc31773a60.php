<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Detail User: <?php echo e($user->name); ?></h5>
        </div>
        <div class="card-body bg-light">
            <dl class="row">
                <dt class="col-sm-3">Nama</dt>
                <dd class="col-sm-9"><?php echo e($user->name); ?></dd>

                <dt class="col-sm-3">Email</dt>
                <dd class="col-sm-9"><?php echo e($user->email); ?></dd>

                <dt class="col-sm-3">Role</dt>
                <dd class="col-sm-9">
                    <span class="badge bg-<?php echo e($user->isAdmin() ? 'danger' : 'primary'); ?>">
                        <?php echo e($user->role->name ?? 'No Role'); ?>

                    </span>
                </dd>

                <dt class="col-sm-3">Tanggal Daftar</dt>
                <dd class="col-sm-9"><?php echo e($user->created_at->format('d M Y')); ?></dd>
            </dl>

            <a href="<?php echo e(route('admin.users.index')); ?>" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Dell\Documents\uas_kellima_laravel\resources\views/admin/users/show.blade.php ENDPATH**/ ?>