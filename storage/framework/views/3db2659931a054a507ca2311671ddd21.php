<?php $__env->startSection('content'); ?>
<div class="container my-4">
    <div class="card shadow border-0">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0"><i class="fas fa-edit me-2"></i> Edit Ruangan</h4>
        </div>
        <div class="card-body bg-light">
            <form action="<?php echo e(route('admin.Ruangan.update', $Ruangan->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="mb-3">
                    <label class="form-label fw-bold">Nama Ruangan</label>
                    <input type="text" name="nama_ruangan" class="form-control" value="<?php echo e($Ruangan->nama_ruangan); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Harga</label>
                    <input type="number" name="harga" class="form-control" value="<?php echo e($Ruangan->harga); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Durasi</label>
                    <input type="text" name="durasi" class="form-control" value="<?php echo e($Ruangan->durasi); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3"><?php echo e($Ruangan->deskripsi); ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Foto Saat Ini</label><br>
                    <?php if($Ruangan->foto): ?>
                        <img src="<?php echo e(asset('storage/' . $Ruangan->foto)); ?>" class="rounded shadow mb-2" width="120"><br>
                    <?php else: ?>
                        <span class="text-muted fst-italic">Tidak ada foto</span><br>
                    <?php endif; ?>
                    <input type="file" name="foto" class="form-control mt-2">
                </div>

                <div class="d-flex justify-content-end">
                    <a href="<?php echo e(route('admin.Ruangan.index')); ?>" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-save me-1"></i> Perbarui
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Dell\Documents\uas_kellima_laravel\resources\views/Ruangan/edit.blade.php ENDPATH**/ ?>