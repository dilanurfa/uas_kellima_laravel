

<?php $__env->startSection('content'); ?>
<div class="container-fluid py-4">
    <h2 class="mb-4 fw-bold text-dark">📁 Riwayat Booking Selesai</h2>

    <div class="card shadow-sm rounded-4 overflow-hidden">
        <div class="card-header bg-dark text-white">
            <i class="fas fa-list me-2"></i>Daftar Booking Selesai
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle table-borderless mb-0 text-center">
                    <thead class="bg-light text-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama User</th>
                            <th>Ruangan</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($index + 1); ?></td>
                                <td><?php echo e($booking->user->name); ?></td>
                                <td><?php echo e($booking->ruangan->nama_ruangan); ?></td>
                                <td><?php echo e($booking->tanggal); ?></td>
                                <td>
                                    <span class="badge bg-success">
                                        Selesai
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="text-muted py-4">Tidak ada booking selesai.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\lenovo\Documents\uas_kellima_laravel\resources\views/admin/booking/riwayat.blade.php ENDPATH**/ ?>