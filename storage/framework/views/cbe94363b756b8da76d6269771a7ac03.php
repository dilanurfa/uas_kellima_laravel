<?php $__env->startSection('content'); ?>
<section class="section menu py-5" style="background-color:#f8f9fa;">
    <div class="container text-center" data-aos="fade-up">

        <!-- Icon sukses biru -->
        <div class="icon mb-3" style="color:#0d6efd;">
            <i class="fas fa-check-circle fa-4x animate__animated animate__tada"></i>
        </div>

        <!-- Judul biru -->
        <h2 class="mb-3 fw-bold" style="color:#0d6efd;">Booking Berhasil!</h2>

        <!-- Subteks hitam -->
        <p class="lead mb-4" style="color:#212529;">
            Terima kasih, pembayaran Anda sudah diterima.
        </p>

        <!-- Tombol-tombol -->
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="<?php echo e(route('klien.show', $booking->id)); ?>" class="btn btn-outline-dark btn-lg shadow-sm">
                <i class="fas fa-file-pdf me-1"></i> Lihat Bukti Pembayaran
            </a>

            <a href="/" class="btn btn-primary btn-lg shadow-sm">
                <i class="fas fa-arrow-left me-1"></i> Kembali ke Beranda
            </a>
        </div>

    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.nonav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ASUS VIVOBOOK DC\uas_kellima_laravel\resources\views/klien/thanks.blade.php ENDPATH**/ ?>