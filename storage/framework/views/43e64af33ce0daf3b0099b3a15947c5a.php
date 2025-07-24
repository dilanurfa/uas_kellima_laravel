<?php $__env->startSection('content'); ?>
<div class="container-fluid py-4">
    <h2 class="mb-4 fw-bold text-dark">🏠 Manajemen Ruangan</h2>

    <?php if(session('success')): ?>
        <div class="alert alert-success text-center rounded-pill shadow-sm">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <!-- Tombol Tambah Ruangan -->
    <div class="mb-3 text-end">
        <a href="<?php echo e(route('admin.Ruangan.create')); ?>" class="btn btn-success rounded-pill shadow-sm px-4">
            <i class="fas fa-plus me-2"></i>Tambah Ruangan
        </a>
    </div>

    <div class="table-responsive shadow-sm rounded-4 overflow-hidden">
        <table class="table table-hover table-striped align-middle table-borderless mb-0">
            <thead class="bg-dark text-white text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Ruangan</th>
                    <th>Harga</th>
                    <th>Durasi</th>
                    <th>Deskripsi</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php $__empty_1 = true; $__currentLoopData = $Ruangan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $rgn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($rgn->nama_ruangan); ?></td>
                        <td>Rp<?php echo e(number_format($rgn->harga, 0, ',', '.')); ?></td>
                        <td><span class="badge bg-info text-dark"><?php echo e($rgn->durasi); ?></span></td>
                        <td><?php echo e($rgn->deskripsi ?? '-'); ?></td>
                        <td>
                            <?php if($rgn->foto): ?>
                                <button class="btn btn-outline-primary btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#fotoModal<?php echo e($rgn->id); ?>">
                                    Lihat
                                </button>

                                <!-- Modal Foto -->
                                <div class="modal fade" id="fotoModal<?php echo e($rgn->id); ?>" tabindex="-1">
                                  <div class="modal-dialog modal-dialog-centered modal-sm">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title">Foto Ruangan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                      </div>
                                      <div class="modal-body text-center">
                                        <img src="<?php echo e(asset('storage/' . $rgn->foto)); ?>" class="img-fluid rounded">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            <?php else: ?>
                                <span class="text-muted">-</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?php echo e(route('admin.Ruangan.show', $rgn->id)); ?>" class="btn btn-outline-primary btn-sm rounded-pill px-3" title="Detail">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="<?php echo e(route('admin.Ruangan.edit', $rgn->id)); ?>" class="btn btn-outline-warning btn-sm rounded-pill px-3" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="<?php echo e(route('admin.Ruangan.destroy', $rgn->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Hapus ruangan ini?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-outline-danger btn-sm rounded-pill px-3" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" class="text-muted py-5">Belum ada ruangan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\lenovo\Documents\uas_kellima_laravel\resources\views/Ruangan/index.blade.php ENDPATH**/ ?>