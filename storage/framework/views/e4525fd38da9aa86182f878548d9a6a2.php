<?php $__env->startSection('content'); ?>
<div class="container mt-3">
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h4>Detail Data Ruangan</h4>
        </div>
        <div class="card-body">
            <p><strong>Nama Ruangan:</strong> <?php echo e($Ruangan->nama_ruangan); ?></p>
            <p><strong>Harga:</strong> Rp <?php echo e(number_format($Ruangan->harga, 0, ',', '.')); ?></p>
            <p><strong>Durasi:</strong> <?php echo e($Ruangan->durasi); ?></p>
            <p><strong>Deskripsi:</strong> <?php echo e($Ruangan->deskripsi ?? '-'); ?></p>
            <p><strong>Foto:</strong><br>
                <?php if($Ruangan->foto): ?>
                    <img src="<?php echo e(asset('storage/' . $Ruangan->foto)); ?>" width="200" class="img-thumbnail mt-2">
                <?php else: ?>
                    <span class="text-muted">Tidak ada foto</span>
                <?php endif; ?>
            </p>
            <p><strong>Tanggal Dibuat:</strong> 
                <?php echo e($Ruangan->created_at->format('d/m/Y')); ?>

            </p>

            <a href="<?php echo e(route('admin.Ruangan.index')); ?>" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Dell\Documents\uas_kellima_laravel\resources\views/Ruangan/show.blade.php ENDPATH**/ ?>