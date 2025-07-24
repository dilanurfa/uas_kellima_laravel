<?php $__env->startSection('content'); ?>
<div class="container-fluid py-4">
    <h4 class="mb-4 fw-bold text-dark">🏠 Detail Ruangan</h4>

    <div class="card shadow-sm rounded-4 border-0">
        <div class="card-body px-5 py-4">
            <div class="row mb-3">
                <div class="col-md-4 fw-semibold text-muted">Nama Ruangan</div>
                <div class="col-md-8"><?php echo e($Ruangan->nama_ruangan); ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 fw-semibold text-muted">Harga</div>
                <div class="col-md-8">Rp <?php echo e(number_format($Ruangan->harga, 0, ',', '.')); ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 fw-semibold text-muted">Durasi</div>
                <div class="col-md-8">
                    <span class="badge bg-info text-dark"><?php echo e($Ruangan->durasi); ?></span>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 fw-semibold text-muted">Deskripsi</div>
                <div class="col-md-8"><?php echo e($Ruangan->deskripsi ?? '-'); ?></div>
            </div>
            <div class="row">
                <div class="col-md-4 fw-semibold text-muted">Foto Ruangan</div>
                <div class="col-md-8">
                    <?php if($Ruangan->foto): ?>
                        <img src="<?php echo e(asset('storage/' . $Ruangan->foto)); ?>" class="img-fluid rounded shadow" width="200">
                    <?php else: ?>
                        <span class="text-muted fst-italic">Tidak ada foto</span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4 text-center">
        <a href="<?php echo e(route('admin.Ruangan.index')); ?>" class="btn btn-dark rounded-pill px-4">
            <i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar Ruangan
        </a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Dell\Documents\uas_kellima_laravel\resources\views/Ruangan/show.blade.php ENDPATH**/ ?>