<?php $__env->startSection('content'); ?>
<section class="py-4 bg-light">
  <div class="container">

    
    <div class="d-flex justify-content-between align-items-center mb-4">
      <a href="<?php echo e(route('klien.index')); ?>"
         class="btn btn-outline-secondary rounded-circle d-flex align-items-center justify-content-center"
         data-bs-toggle="tooltip" title="Kembali"
         style="width:45px;height:45px;">
        <i class="bi bi-arrow-left fs-5"></i>
      </a>
      <h3 class="fw-bold mb-0">Riwayat Booking Anda</h3>
      <div style="width:45px;"></div>
    </div>

    <?php $__empty_1 = true; $__currentLoopData = $riwayat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <div class="card border-0 shadow-sm rounded-4 mb-4 overflow-hidden">
        <div class="row g-0 align-items-stretch">

          
          <div class="col-md-3">
            <div class="h-100 w-100 bg-light">
              <?php if($item->ruangan && $item->ruangan->foto): ?>
                <img src="<?php echo e(asset('storage/' . $item->ruangan->foto)); ?>" class="img-fluid h-100 w-100 object-fit-cover" alt="Foto Studio">
              <?php else: ?>
                <div class="d-flex align-items-center justify-content-center h-100 text-muted">
                  <i class="bi bi-image fs-1"></i>
                </div>
              <?php endif; ?>
            </div>
          </div>

          
          <div class="col-md-6 p-3 d-flex flex-column justify-content-between">
            <div>
              <h5 class="fw-bold mb-1"><?php echo e($item->ruangan->nama_ruangan ?? '-'); ?></h5>
              <div class="small text-muted mb-1">
                <i class="bi bi-calendar-event me-1"></i><?php echo e(\Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y')); ?>

                <i class="bi bi-clock ms-3 me-1"></i><?php echo e($item->jam); ?> (<?php echo e($item->durasi); ?> jam)
              </div>
            </div>
            <div class="mt-2">
              <span class="fw-bold text-primary fs-5">Rp <?php echo e(number_format($item->total_harga,0,',','.')); ?></span>
            </div>
          </div>

          
          <div class="col-md-3 d-flex flex-column justify-content-between p-3 bg-light">
            <div class="d-flex justify-content-end mb-2">
              <?php if($item->status === 'pending'): ?>
                <span class="badge bg-warning text-dark rounded-pill px-3 py-2">Menunggu</span>
              <?php elseif($item->status === 'approved'): ?>
                <span class="badge bg-success rounded-pill px-3 py-2">Disetujui</span>
              <?php elseif($item->status === 'rejected'): ?>
                <span class="badge bg-danger rounded-pill px-3 py-2">Ditolak</span>
              <?php elseif($item->status === 'lunas'): ?>
                <span class="badge bg-primary rounded-pill px-3 py-2">Selesai</span>
              <?php else: ?>
                <span class="badge bg-secondary rounded-pill px-3 py-2"><?php echo e(ucfirst($item->status)); ?></span>
              <?php endif; ?>
            </div>

            <div class="d-flex justify-content-between flex-wrap gap-2">
              
              <a href="#" class="btn btn-outline-secondary rounded-circle d-flex align-items-center justify-content-center"
                 data-bs-toggle="tooltip" title="Chat" style="width:42px;height:42px;">
                <i class="bi bi-chat-dots fs-6"></i>
              </a>

              
              <a href="<?php echo e(route('klien.show',$item->id)); ?>" class="btn btn-outline-primary rounded-circle d-flex align-items-center justify-content-center"
                 data-bs-toggle="tooltip" title="Detail" style="width:42px;height:42px;">
                <i class="bi bi-info-circle fs-6"></i>
              </a>

              
              <?php if($item->status === 'pending'): ?>
                <form action="<?php echo e(route('klien.cancel',$item->id)); ?>" method="POST"
                      onsubmit="return confirm('Yakin membatalkan pesanan ini?');">
                  <?php echo csrf_field(); ?>
                  <button type="submit" class="btn btn-outline-warning rounded-circle d-flex align-items-center justify-content-center"
                          data-bs-toggle="tooltip" title="Batalkan" style="width:42px;height:42px;">
                    <i class="bi bi-x-circle fs-6"></i>
                  </button>
                </form>
              <?php endif; ?>

              
              <form action="<?php echo e(route('klien.delete',$item->id)); ?>" method="POST"
                    onsubmit="return confirm('Hapus pesanan ini secara permanen?');">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-outline-danger rounded-circle d-flex align-items-center justify-content-center"
                        data-bs-toggle="tooltip" title="Hapus" style="width:42px;height:42px;">
                  <i class="bi bi-trash fs-6"></i>
                </button>
              </form>
            </div>
          </div>
        </div>

        
        <?php if($item->status === 'lunas'): ?>
          <div class="p-3 border-top bg-white">
            <?php if($item->rating): ?>
              <div class="mb-2">
                <strong>Rating Anda:</strong><br>
                <?php for($i=1; $i<=5; $i++): ?>
                  <?php if($i <= $item->rating): ?>
                    <i class="bi bi-star-fill text-warning fs-5"></i>
                  <?php else: ?>
                    <i class="bi bi-star text-warning fs-5"></i>
                  <?php endif; ?>
                <?php endfor; ?>
              </div>
              <?php if($item->ulasan): ?>
                <p class="mb-0"><strong>Ulasan:</strong> <?php echo e($item->ulasan); ?></p>
              <?php endif; ?>
            <?php else: ?>
              <form method="POST" action="<?php echo e(route('klien.riwayat')); ?>">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="booking_id" value="<?php echo e($item->id); ?>">
                <div class="mb-2">
                  <strong>Beri Rating:</strong><br>
                  <div id="rating-<?php echo e($item->id); ?>" class="mb-2">
                    <?php for($i=1; $i<=5; $i++): ?>
                      <i class="bi bi-star text-warning fs-4" data-rate="<?php echo e($i); ?>"></i>
                    <?php endfor; ?>
                  </div>
                  <input type="hidden" name="rating" id="rating-input-<?php echo e($item->id); ?>" required>
                </div>
                <div class="mb-2">
                  <textarea class="form-control" name="ulasan" rows="2" placeholder="Tulis ulasan Anda..." required></textarea>
                </div>
                <button type="submit" class="btn btn-sm btn-primary rounded-pill">Kirim Ulasan</button>
              </form>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
      <div class="text-center py-5">
        <i class="bi bi-journal-x fs-1 text-muted"></i>
        <p class="mt-3 mb-0 text-muted">Belum ada riwayat booking.</p>
      </div>
    <?php endif; ?>

  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded',function(){
  var tooltipTriggerList=[].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  tooltipTriggerList.map(function(el){return new bootstrap.Tooltip(el)})

  document.querySelectorAll('[id^="rating-"]').forEach(function(container){
    const id=container.id.split('-')[1];
    const stars=container.querySelectorAll('i');
    stars.forEach(star=>{
      star.addEventListener('click',function(){
        const rate=this.getAttribute('data-rate');
        document.getElementById('rating-input-'+id).value=rate;
        stars.forEach((s,i)=>{
          if(i<rate){
            s.classList.remove('bi-star');
            s.classList.add('bi-star-fill');
          }else{
            s.classList.remove('bi-star-fill');
            s.classList.add('bi-star');
          }
        });
      });
    });
  });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.nonav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ASUS VIVOBOOK DC\uas_kellima_laravel\resources\views/klien/riwayat.blade.php ENDPATH**/ ?>