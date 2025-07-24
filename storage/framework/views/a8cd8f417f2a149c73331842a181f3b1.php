<?php $__env->startSection('content'); ?>
<div class="container-fluid py-4">
    <h2 class="mb-4 fw-bold text-dark">👤 Manajemen User</h2>

    <?php if(session('success')): ?>
        <div class="alert alert-success text-center rounded-pill shadow-sm">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="table-responsive shadow-sm rounded-4 overflow-hidden">
        <table class="table table-hover table-striped align-middle table-borderless mb-0">
            <thead class="bg-dark text-white text-center">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Terdaftar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($user->name); ?></td>
                        <td><?php echo e($user->email); ?></td>
                        <td>
                            <span class="badge bg-<?php echo e($user->isAdmin() ? 'danger' : 'secondary'); ?>">
                                <?php echo e($user->role->name ?? '-'); ?>

                            </span>
                        </td>
                        <td><?php echo e($user->created_at->format('d M Y')); ?></td>
                        <td>
                            <a href="<?php echo e(route('admin.users.show', $user)); ?>" class="btn btn-outline-primary btn-sm rounded-pill px-3" title="Detail">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="<?php echo e(route('admin.users.edit', $user)); ?>" class="btn btn-outline-warning btn-sm rounded-pill px-3" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <?php if($user->id !== auth()->id()): ?>
                                <form action="<?php echo e(route('admin.users.destroy', $user)); ?>" method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-outline-danger btn-sm rounded-pill px-3" title="Hapus" onclick="return confirm('Yakin ingin menghapus user ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="text-muted py-5">Belum ada user.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\lenovo\Documents\uas_kellima_laravel\resources\views/admin/users/index.blade.php ENDPATH**/ ?>