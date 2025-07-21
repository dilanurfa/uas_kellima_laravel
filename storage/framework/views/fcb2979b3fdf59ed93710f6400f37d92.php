<?php $__env->startSection('content'); ?>
    <div class="container-fluid py-4">
        <h2 class="mb-4 fw-bold text-dark">📋 Manajemen Booking</h2>

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
                        <th>Klien</th>
                        <th>Studio</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Durasi</th>
                        <th>Total Harga</th>
                        <th>Metode</th>
                        <th>Bukti</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php $__empty_1 = true; $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($booking->nama); ?></td>
                            <td><?php echo e($booking->ruangan->nama_ruangan ?? '-'); ?></td>
                            <td><?php echo e($booking->tanggal); ?></td>
                            <td><?php echo e($booking->jam); ?></td>
                            <td><?php echo e($booking->durasi); ?> jam</td>
                            <td>Rp<?php echo e(number_format($booking->total_harga, 0, ',', '.')); ?></td>
                            <td><span class="badge bg-secondary"><?php echo e(ucfirst($booking->metode_bayar)); ?></span></td>
                            <td>
                                <?php if($booking->bukti_pembayaran): ?>
                                    <a href="<?php echo e(asset('storage/' . $booking->bukti_pembayaran)); ?>" target="_blank">
                                        <img src="<?php echo e(asset('storage/' . $booking->bukti_pembayaran)); ?>"
                                             alt="Bukti Pembayaran"
                                             style="max-width: 100px; border-radius:8px; cursor:pointer;">
                                    </a>
                                <?php else: ?>
                                    <span class="text-muted">-</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php
                                    $statusClass = match($booking->status) {
                                        'pending'   => 'warning text-dark',
                                        'approved'  => 'success',
                                        'rejected'  => 'danger',
                                        'lunas'     => 'primary',
                                        default     => 'secondary'
                                    };
                                    $statusText = match($booking->status) {
                                        'pending'   => 'Menunggu',
                                        'approved'  => 'Disetujui',
                                        'rejected'  => 'Ditolak',
                                        'lunas'     => 'Lunas',
                                        default     => ucfirst($booking->status)
                                    };
                                ?>
                                <span class="badge bg-<?php echo e($statusClass); ?>">
                                    <?php echo e($statusText); ?>

                                </span>
                            </td>
                            <td>
                                <?php if($booking->status == 'pending'): ?>
                                    <form action="<?php echo e(route('admin.booking.confirm', $booking->id)); ?>" method="POST" class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <button class="btn btn-success btn-sm rounded-pill px-3" type="submit">✔</button>
                                    </form>
                                    <form action="<?php echo e(route('admin.booking.reject', $booking->id)); ?>" method="POST" class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <button class="btn btn-danger btn-sm rounded-pill px-3" type="submit">✖</button>
                                    </form>
                                <?php elseif($booking->status == 'approved'): ?>
                                    <form action="<?php echo e(route('admin.booking.selesai', $booking->id)); ?>" method="POST" class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <button class="btn btn-primary btn-sm rounded-pill px-3" type="submit">Selesai</button>
                                    </form>
                                <?php else: ?>
                                    <span class="text-muted">-</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="11" class="text-center text-muted py-5">Belum ada booking.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Dell\Documents\uas_kellima_laravel\resources\views/admin/booking/index.blade.php ENDPATH**/ ?>