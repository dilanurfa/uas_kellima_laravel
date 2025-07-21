<?php $__env->startSection('content'); ?>
<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <h4>Detail User</h4>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> <?php echo e($user->id); ?></p>
            <p><strong>Nama:</strong> <?php echo e($user->name); ?></p>
            <p><strong>Email:</strong> <?php echo e($user->email); ?></p>
            <p><strong>Role:</strong> 
                <span class="badge bg-<?php echo e($user->isAdmin() ? 'danger' : 'primary'); ?>">
                    <?php echo e($user->role->name ?? 'No Role'); ?>

                </span>
            </p>
            <p><strong>Tanggal Daftar:</strong> <?php echo e($user->created_at->translatedFormat('d F Y')); ?></p>
            <a href="<?php echo e(route('admin.users.index')); ?>" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Dell\Documents\uas_kellima_laravel\resources\views/users/show.blade.php ENDPATH**/ ?>