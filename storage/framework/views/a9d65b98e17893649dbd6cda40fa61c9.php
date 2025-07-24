<?php $__env->startSection('content'); ?>
<section class="py-4 bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="card shadow-lg border-0 rounded-5 overflow-hidden">
          <div class="row g-0 position-relative">
            <div class="col-md-6 d-none d-md-block position-relative">
              <a href="<?php echo e(route('klien.index')); ?>#studios" class="btn btn-light position-absolute m-3 d-flex align-items-center shadow-sm" style="top: 0; left: 0; z-index: 10; border-radius: 50px; padding: 6px 12px; font-size: 14px;">
                <i class="bi bi-arrow-left me-1"></i>
              </a>
              <img src="<?php echo e(asset('storage/' . $Ruangan->foto)); ?>" alt="Gambar Studio" class="img-fluid h-100 w-100 object-fit-cover">
            </div>
            <div class="col-md-6 bg-white p-5">
              <h3 class="text-center mb-4 fw-bold text-dark">
                Booking Studio <br><span class="text-primary"><?php echo e($Ruangan->nama_ruangan); ?></span>
              </h3>
              <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <?php echo e(session('success')); ?>

                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php endif; ?>

              <?php if(session('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <?php echo e(session('error')); ?>

                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php endif; ?>

              
              <div class="text-center mb-4">
                <div class="text-muted">Harga per Jam</div>
                <div class="fs-4 fw-bold text-primary">
                  Rp <?php echo e(number_format($Ruangan->harga, 0, ',', '.')); ?>

                </div>
              </div>

              
              <form action="<?php echo e(route('booking.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="ruangan_id" value="<?php echo e($Ruangan->id); ?>">
                <input type="hidden" id="harga_per_jam" value="<?php echo e($Ruangan->harga); ?>">

                
                <div class="form-group mb-3">
                  <label for="nama" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                  <input type="text" name="nama" class="form-control <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('nama')); ?>">
                  <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div class="row g-2">
                  <div class="col-md-6">
                    <label for="tanggal" class="form-label">Tanggal Booking <span class="text-danger">*</span></label>
                    <input type="date" name="tanggal" class="form-control <?php $__errorArgs = ['tanggal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('tanggal')); ?>">
                    <?php $__errorArgs = ['tanggal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                  <div class="col-md-6">
                    <label for="jam" class="form-label">Jam Mulai <span class="text-danger">*</span></label>
                    <input type="time" name="jam" class="form-control <?php $__errorArgs = ['jam'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('jam')); ?>">
                    <?php $__errorArgs = ['jam'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>

                
                <div class="form-group mt-3 mb-3">
                  <label for="durasi" class="form-label">Durasi (jam) <span class="text-danger">*</span></label>
                  <select name="durasi" id="durasi" class="form-select <?php $__errorArgs = ['durasi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" onchange="hitungTotal()">
                    <option value="">-- Pilih Durasi --</option>
                    <?php for($i=1; $i<=8; $i++): ?>
                      <option value="<?php echo e($i); ?>" <?php echo e(old('durasi') == $i ? 'selected' : ''); ?>><?php echo e($i); ?> jam</option>
                    <?php endfor; ?>
                  </select>
                  <?php $__errorArgs = ['durasi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div class="mb-3">
                  <label class="form-label">Total Harga</label>
                  <input type="text" id="total_harga_display" class="form-control bg-light border-0 fw-semibold" readonly>
                </div>

                
                <div class="form-group mb-3">
                  <label for="metode_bayar" class="form-label">Metode Pembayaran <span class="text-danger">*</span></label>
                  <select name="metode_bayar" id="metode_bayar" class="form-select <?php $__errorArgs = ['metode_bayar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" onchange="toggleInfo()">
                    <option value="">-- Pilih Metode Pembayaran --</option>
                    <option value="qris" <?php echo e(old('metode_bayar') == 'qris' ? 'selected' : ''); ?>>QRIS</option>
                    <option value="transfer" <?php echo e(old('metode_bayar') == 'transfer' ? 'selected' : ''); ?>>Transfer Bank</option>
                  </select>
                  <?php $__errorArgs = ['metode_bayar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div class="mb-3" id="qris-info" style="display: none;">
                  <div class="bg-light p-3 rounded border text-center">
                    <img src="<?php echo e(asset('assets/img/qris.png')); ?>" alt="QRIS" class="img-fluid" style="max-width: 180px;">
                  </div>
                </div>

                
                <div class="mb-3" id="transfer-info" style="display: none;">
                  <div class="bg-light p-3 rounded border">
                    <div class="text-dark">BCA - 1234567890</div>
                    <div class="text-dark">BRI - 50567890</div>
                    <div class="text-dark">Mandiri - 98765432</div>
                  </div>
                </div>

                
                <div class="form-group mb-4">
                  <label for="bukti_pembayaran" class="form-label">Upload Bukti Pembayaran <span class="text-danger">*</span></label>
                  <input type="file" name="bukti_pembayaran" class="form-control <?php $__errorArgs = ['bukti_pembayaran'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" accept=".jpg,.jpeg,.png">
                  <?php $__errorArgs = ['bukti_pembayaran'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <button type="submit" class="btn btn-primary w-100 py-2 shadow-sm">Kirim Booking</button>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  function toggleInfo() {
    const metode = document.getElementById('metode_bayar').value;
    document.getElementById('qris-info').style.display = metode === 'qris' ? 'block' : 'none';
    document.getElementById('transfer-info').style.display = metode === 'transfer' ? 'block' : 'none';
  }

  function hitungTotal() {
    const durasi = parseInt(document.getElementById('durasi').value);
    const harga = parseInt(document.getElementById('harga_per_jam').value);
    const total = durasi * harga;
    const formatter = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0
    });
    document.getElementById('total_harga_display').value = durasi ? formatter.format(total) : '';
  }

  window.onload = function() {
    toggleInfo();
    hitungTotal();
  };
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.nonav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Dell\Documents\uas_kellima_laravel\resources\views/klien/booking.blade.php ENDPATH**/ ?>