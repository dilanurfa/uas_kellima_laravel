<?php $__env->startSection('content'); ?>
<div class="container">
    <h2 class="mb-4">Statistik & Laporan</h2>

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Booking</h5>
                    <p class="card-text display-6"><?php echo e($totalBooking ?? 0); ?></p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Total User</h5>
                    <p class="card-text display-6"><?php echo e($totalUser ?? 0); ?></p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5 class="card-title">Booking Bulan Ini</h5>
                    <p class="card-text display-6"><?php echo e($monthlyBooking ?? 0); ?></p>
                </div>
            </div>
        </div>
    </div>

    
    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">Grafik Booking Bulanan</h5>
            <p class="text-muted">(Grafik bisa diintegrasi dengan Chart.js)</p>
            <div style="height: 300px; background: #e9ecef; display: flex; align-items: center; justify-content: center;">
                <span>Grafik Booking di sini</span>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Dell\Documents\uas_kellima_laravel\resources\views/admin/reports.blade.php ENDPATH**/ ?>