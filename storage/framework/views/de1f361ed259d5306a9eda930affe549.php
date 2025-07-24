<?php $__env->startSection('content'); ?>
<div class="container-fluid py-4">
    <h2 class="mb-4 fw-bold text-dark">📊 Dashboard Admin</h2>

    
    <div class="row mb-4">
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm text-white bg-info rounded-4">
                <div class="card-body">
                    <h5 class="mb-1">Total Booking</h5>
                    <h3 class="fw-bold"><?php echo e($totalBooking ?? 0); ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm text-white bg-success rounded-4">
                <div class="card-body">
                    <h5 class="mb-1">Booking Diterima</h5>
                    <h3 class="fw-bold"><?php echo e($totalAccepted ?? 0); ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm text-dark bg-warning rounded-4">
                <div class="card-body">
                    <h5 class="mb-1">Booking Menunggu</h5>
                    <h3 class="fw-bold"><?php echo e($totalPending ?? 0); ?></h3>
                </div>
            </div>
        </div>
    </div>

    
    <div class="card shadow-sm rounded-4 overflow-hidden">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <span><i class="fas fa-clock me-2"></i>Daftar Booking Terbaru</span>
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
                        <?php $__empty_1 = true; $__currentLoopData = $bookings->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($index + 1); ?></td>
                                <td><?php echo e($booking->user->name); ?></td>
                                <td><?php echo e($booking->ruangan->nama_ruangan); ?></td>
                                <td><?php echo e($booking->tanggal); ?></td>
                                <td>
                                    <?php
                                        $statusClass = match($booking->status) {
                                            'lunas' => 'success',
                                            'pending' => 'warning text-dark',
                                            'ditolak' => 'danger',
                                            default => 'secondary'
                                        };
                                    ?>
                                    <span class="badge bg-<?php echo e($statusClass); ?>">
                                        <?php echo e(ucfirst($booking->status)); ?>

                                    </span>
                                </td>
                                <td>
                                    <?php if($booking->status == 'approved'): ?>
                                        <form action="<?php echo e(route('admin.booking.selesai', $booking->id)); ?>" method="POST" class="d-inline">
                                            <?php echo csrf_field(); ?>
                                            <button class="btn btn-primary btn-sm rounded-pill px-3" type="submit">✔ Selesai</button>
                                        </form>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="text-muted py-4">Belum ada data booking.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\lenovo\Documents\uas_kellima_laravel\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>