<?php $__env->startSection('content'); ?>
<div class="container py-4">

    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark mb-0">Manajemen Layanan Studio</h2>
            <small class="text-muted">Kelola daftar studio, harga, durasi, dan deskripsi layanan</small>
        </div>

    </div>

    
    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-1"></i> <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    
    <div class="row g-4 mb-5">
        <?php $__empty_1 = true; $__currentLoopData = $Tsp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Tsp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <?php if($Tsp->foto): ?>
                        <img src="<?php echo e(asset('storage/' . $Tsp->foto)); ?>" class="card-img-top" alt="Foto <?php echo e($Tsp->nama); ?>" style="height: 180px; object-fit: cover;">
                    <?php else: ?>
                        <img src="https://via.placeholder.com/400x180?text=No+Image" class="card-img-top" alt="No Image">
                    <?php endif; ?>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-semibold text-dark"><?php echo e($Tsp->nama); ?></h5>
                        <p class="mb-1 text-muted">Durasi: <?php echo e($Tsp->durasi); ?></p>
                        <p class="mb-1 text-primary fw-semibold">Rp <?php echo e(number_format($Tsp->harga, 0, ',', '.')); ?></p>
                        <p class="text-muted small"><?php echo e(Str::limit($Tsp->deskripsi, 80)); ?></p>
                        <div class="mt-auto">
                            <a href="<?php echo e(route('tsp.show', $Tsp->id)); ?>" class="btn btn-sm btn-outline-primary me-1"><i class="fas fa-eye"></i></a>
                            <a href="<?php echo e(route('tsp.edit', $Tsp->id)); ?>" class="btn btn-sm btn-outline-warning me-1"><i class="fas fa-edit"></i></a>
                            <form action="<?php echo e(route('tsp.destroy', $Tsp->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-12 text-center text-muted">
                Belum ada layanan yang ditambahkan.
            </div>
        <?php endif; ?>
    </div>

    
    <div class="card shadow-sm border-0">
        <div class="card-header bg-dark text-white fw-semibold">
            Tabel Layanan Studio
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped mb-0 align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Durasi</th>
                            <th>Harga</th>
                            <th>Deskripsi</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $Tsp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $Tsp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($index + 1); ?></td>
                                <td><?php echo e($Tsp->nama); ?></td>
                                <td><?php echo e($Tsp->durasi); ?></td>
                                <td>Rp <?php echo e(number_format($Tsp->harga, 0, ',', '.')); ?></td>
                                <td><?php echo e(Str::limit($Tsp->deskripsi, 40)); ?></td>
                                <td>
                                    <?php if($Tsp->foto): ?>
                                        <img src="<?php echo e(asset('storage/' . $Tsp->foto)); ?>" width="60" class="rounded">
                                    <?php else: ?>
                                        <span class="text-muted">-</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('tsp.show', $Tsp->id)); ?>" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                    <a href="<?php echo e(route('tsp.edit', $Tsp->id)); ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                    <form action="<?php echo e(route('tsp.destroy', $Tsp->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="7" class="text-center text-muted">Tidak ada data.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Dell\Documents\uas_kellima_laravel\resources\views/Tsp/index.blade.php ENDPATH**/ ?>