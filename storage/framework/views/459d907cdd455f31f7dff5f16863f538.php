<?php $__env->startSection('content'); ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container-fluid py-5" style="background-color: #f0f0f0;">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="fw-bold" style="color: #222;">Daftar Booking Studio</h2>
        </div>

        <?php if(session('success')): ?>
            <div class="alert alert-success text-center"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="table table-hover align-middle bg-white rounded shadow-sm overflow-hidden">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Klien</th>
                        <th>Studio</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Durasi</th>
                        <th>Bukti</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($booking->user->name ?? 'Unknown'); ?></td>
                            <td><?php echo e($booking->ruangan->nama_ruangan ?? 'Unknown'); ?></td>
                            <td><?php echo e($booking->tanggal); ?></td>
                            <td><?php echo e($booking->jam); ?></td>
                            <td><?php echo e($booking->durasi); ?> jam</td>
                            <td>
                                <?php if($booking->bukti_pembayaran): ?>
                                    <a href="<?php echo e(asset('storage/' . $booking->bukti_pembayaran)); ?>" target="_blank">
                                        <img src="<?php echo e(asset('storage/' . $booking->bukti_pembayaran)); ?>" alt="Bukti Pembayaran" width="80" class="img-thumbnail">
                                    </a>
                                <?php else: ?>
                                    <span class="text-muted">Belum ada</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($booking->status == 'pending'): ?>
                                    <span class="badge bg-warning text-dark">Tertunda</span>
                                <?php elseif($booking->status == 'lunas'): ?>
                                    <span class="badge bg-success">Lunas</span>
                                <?php else: ?>
                                    <span class="badge bg-danger">Ditolak</span>
                                <?php endif; ?>
                            </td>
                            <td>
                               <?php if($booking->status == 'pending'): ?>
                                    <form action="<?php echo e(route('admin.booking.confirm', $booking->id)); ?>" method="POST" class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <button class="btn btn-success btn-sm rounded-pill px-3" type="submit">Setujui</button>
                                    </form>
                                    <form action="<?php echo e(route('admin.booking.reject', $booking->id)); ?>" method="POST" class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <button class="btn btn-danger btn-sm rounded-pill px-3" type="submit">Tolak</button>
                                    </form>
                                <?php else: ?>
                                    <span class="text-muted">-</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="9" class="text-center text-muted py-4">Belum ada booking</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="btn btn-dark rounded-pill px-4">
                <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
            </a>
        </div>
    </div>
</div>

<style>
    .table th, .table td {
        vertical-align: middle;
    }
    .btn-dark {
        background-color: #333;
        border: none;
    }
    .btn-dark:hover {
        background-color: #000;
        color: #fff;
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Dell\Documents\uas_kellima_laravel\resources\views/admin/booking.blade.php ENDPATH**/ ?>