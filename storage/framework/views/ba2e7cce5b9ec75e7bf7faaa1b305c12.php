<?php $__env->startSection('content'); ?>
    <!-- CSS Imperial -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/bootstrap/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/aos/aos.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/glightbox/css/glightbox.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/swiper/swiper-bundle.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/main.css')); ?>">

    <style>
        /* Make video visible and clear */
        #hero {
            position: relative;
            min-height: 100vh;
            overflow: hidden;
        }
        #bg-video {
            position: absolute;
            top: 0;
            left: 0;
            min-width: 100%;
            min-height: 100%;
            object-fit: cover;
            z-index: 1;
        }
        #hero .container {
            position: relative;
            z-index: 2;
            color: #fff;
        }
        /* Remove any overlay */
        #hero::before {
            content: none;
        }
        .btn-primary {
            background-color: #1977cc;
            border-color: #1977cc;
        }
        .btn-primary:hover {
            background-color: #145ea8;
            border-color: #145ea8;
        }
        .text-primary {
            color: #1977cc !important;
        }
    </style>

    <!-- Hero Section -->
    <section id="hero" class="hero section">
        <video autoplay muted loop id="bg-video" style="position:absolute; width:100%; height:100%; object-fit:cover;">
            <source src="<?php echo e(asset('assets/img/studio.mp4')); ?>" type="video/mp4" />
        </video>
        <div class="container text-center position-relative" style="z-index:2;">
            <h2 class="text-white">Selamat Datang di <em style="color:#1977cc;">The sound project </em>Studio Musik</h2>
            <p class="text-light">Studio keren, nyaman dan banyak macam pilihan</p>
            <a href="#studios" class="btn btn-primary">Lihat Studio</a>
        </div>
    </section>

       <section id="about" class="about section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>TENTANG</h2>
  </div><!-- End Section Title -->

  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
        <img src="assets/img/studiooo.jpeg" class="img-fluid" alt="">
      </div>

      <div class="col-lg-6 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
        <h3>Fakta Unik The Sound Project</h3>
        <p class="fst-italic">
          Wah menarik nih, kita ulik yok
        </p>
        <ul>
          <li><i class="bi bi-check-circle"></i> <span>Nama The Sound Project adalah hasil dari keasbunan</span></li>
          <li><i class="bi bi-check-circle"></i> <span>Target market kami adalah generasi Z yang santai dan tidak rese </span></li>
          <li><i class="bi bi-check-circle"></i> <span>Di kami, kamu bebas mau guling-guling juga boleh, asal jangan ganggu</span></li>
           <li><i class="bi bi-check-circle"></i> <span>Awalnya bangunan kami itu makam keramat</span></li>
            <li><i class="bi bi-check-circle"></i> <span>The Sound Project tidak menggunakan tumbal</span></li>
        </ul>

        <!-- Tambahan yang disembunyikan -->
        <div id="more-points" style="display: none;">
          <ul>
            <li><i class="bi bi-check-circle"></i> <span>Cukup segitu aja hehe</span></li>
          </ul>
        </div>

        <!-- Tombol Read More -->
        <a href="javascript:void(0);" class="read-more" onclick="toggleMorePoints()">
          <span>Lebih lanjut</span> <i class="bi bi-arrow-down"></i>
        </a>
      </div>
    </div>
  </div>
</section>

<script>
  function toggleMorePoints() {
    const morePoints = document.getElementById('more-points');
    const readMoreBtn = document.querySelector('.read-more span');
    const readMoreIcon = document.querySelector('.read-more i');

    if (morePoints.style.display === "none") {
      morePoints.style.display = "block";
      readMoreBtn.textContent = "Show Less";
      readMoreIcon.classList.remove('bi-arrow-down');
      readMoreIcon.classList.add('bi-arrow-up');
    } else {
      morePoints.style.display = "none";
      readMoreBtn.textContent = "Read More";
      readMoreIcon.classList.remove('bi-arrow-up');
      readMoreIcon.classList.add('bi-arrow-down');
    }
  }
</script>


    
<!-- Features Section -->
    <section id="features" class="features section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>KELEBIHAN</h2>
        <p>Kami memiliki beberapa kelebihan, beberapa diantarnya :</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="feature-box orange">
              <i class="bi bi-award"></i>
              <h4>Kualitas Mantap</h4>
              <p>The sound project menjadi Top 1 di Bandung karena kualitasnya yang jos </p>
            </div>
          </div><!-- End Feature Borx-->

          <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
            <div class="feature-box blue">
              <i class="bi bi-patch-check"></i>
              <h4>Peralatan Lengkap</h4>
              <p>Dengan alat musik yang lengkap, pastinya kamu tidak akan bingung untuk memilih</p>
            </div>
          </div><!-- End Feature Borx-->

          <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
            <div class="feature-box green">
              <i class="bi bi-sunrise"></i>
              <h4>Kantin</h4>
              <p>Lapar? kami menyediakan kantin untuk kamu dengan berbagai macam pilihan makanan</p>
            </div>
          </div><!-- End Feature Borx-->

          <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="400">
            <div class="feature-box red">
              <i class="bi bi-shield-check"></i>
              <h4>Pelayanan Terbaik</h4>
              <p>Tentunya pelayanan kami terbaik, mulai dari kebersihan, serta sikap pegawai kami</p>
            </div>
          </div><!-- End Feature Borx-->

        </div>

      </div>

    </section><!-- /Features Section -->

  <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section dark-background">
      <div class="container">
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-xl-9 text-center text-xl-start">
            <h3>Tertarik Nih?</h3>
            <p>Ayo booking sekarang juga, sebelum keduluan orang lain!</p>
          </div>
          <div class="col-xl-3 cta-btn-container text-center">
            <a href="#studios" class="cta-btn align-middle" >Booking</a>
          </div>
        </div>

      </div>

    </section><!-- /Call To Action Section -->

    <!-- Studio Tersedia -->
<section id="studios" class="section py-5">
    <div class="container">
        <div class="section-title text-center mb-5" data-aos="fade-up">
            <h2>Studio <span class="text-primary">Tersedia</span></h2>
            <p class="text-muted">Temukan studio musik yang cocok untuk kebutuhan Anda</p>
        </div>

        <div class="row">
            <?php if($ruangan->count()): ?>
                <?php $__currentLoopData = $ruangan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rgn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card shadow border-0">
                            <?php if($rgn->foto): ?>
                                <img src="<?php echo e(asset('storage/' . $rgn->foto)); ?>" class="card-img-top studio-img" alt="<?php echo e($rgn->nama_ruangan); ?>">
                            <?php else: ?>
                                <img src="https://via.placeholder.com/400x600?text=No+Image" class="card-img-top studio-img" alt="No Image">
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title text-primary"><?php echo e($rgn->nama_ruangan); ?></h5>
                                <p class="card-text">Harga: <strong>Rp <?php echo e(number_format($rgn->harga, 0, ',', '.')); ?></strong></p>
                                <p class="card-text text-muted"><?php echo e($rgn->deskripsi ?? 'Tidak ada deskripsi.'); ?></p>
                                <a href="<?php echo e(route('klien.booking', $rgn->id)); ?>" class="btn btn-primary w-100">Booking Sekarang</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p class="text-muted">Belum ada studio tersedia saat ini</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Tambahkan CSS -->
<style>
    .studio-img {
        width: 100%;
        height: 500px; /* tinggi tetap */
        object-fit: cover; /* potong gambar supaya pas */
        border-radius: 8px;
    }
</style>


<section id="testimonials" class="testimonials section">

  <div class="container section-title" data-aos="fade-up">
    <h2 class="text-center">Testimoni</h2>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    
    <div class="swiper testimonials-slider mb-5">
      <div class="swiper-wrapper">
        <?php $__empty_1 = true; $__currentLoopData = $ulasanList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ulasan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <div class="swiper-slide">
            <div class="testimonial-item text-center">
              <div class="row gy-4 justify-content-center">
                <div class="col-lg-8">
                  <div class="testimonial-content">
                    <p class="text-center">
                      <i class="bi bi-quote quote-icon-left"></i>
                      <span><?php echo e($ulasan->ulasan); ?></span>
                      <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                    <h3 class="text-center mt-3"><?php echo e($ulasan->nama ?? 'Anonim'); ?></h3>
                    <div class="stars d-flex justify-content-center mt-2">
                      <?php for($i=1; $i<=5; $i++): ?>
                        <?php if($i <= $ulasan->rating): ?>
                          <i class="bi bi-star-fill text-warning"></i>
                        <?php else: ?>
                          <i class="bi bi-star text-warning"></i>
                        <?php endif; ?>
                      <?php endfor; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <div class="swiper-slide">
            <div class="testimonial-item text-center">
              <p class="text-center">Belum ada testimoni.</p>
            </div>
          </div>
        <?php endif; ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>

    
    <div class="text-center mb-4">
      <button class="btn btn-primary px-4 py-2 rounded-pill shadow-sm" id="showAllBtn">
        Tampilkan Semua Ulasan
      </button>
    </div>

    
    <div id="allTestimonials" class="row justify-content-center g-4" style="display:none;">
      <?php $__empty_1 = true; $__currentLoopData = $ulasanList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ulasan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="col-lg-4 col-md-6">
          <div class="card h-100 border-0 shadow-sm hover-shadow">
            <div class="card-body text-center">
              <p class="fw-bold mb-1"><?php echo e($ulasan->nama ?? 'Anonim'); ?></p>
              <p class="mb-3 text-muted">"<?php echo e($ulasan->ulasan); ?>"</p>
              <div class="stars d-flex justify-content-center">
                <?php for($i=1; $i<=5; $i++): ?>
                  <?php if($i <= $ulasan->rating): ?>
                    <i class="bi bi-star-fill text-warning"></i>
                  <?php else: ?>
                    <i class="bi bi-star text-warning"></i>
                  <?php endif; ?>
                <?php endfor; ?>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p class="text-center">Belum ada testimoni.</p>
      <?php endif; ?>
    </div>

  </div>
</section>

<style>
  /* Tambahan efek hover untuk card */
  .hover-shadow:hover {
    transform: translateY(-3px);
    transition: 0.3s ease;
    box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15)!important;
  }
  /* Supaya bintang selalu kuning */
  .stars i {
    font-size: 1.2rem;
    margin: 0 2px;
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const btn = document.getElementById('showAllBtn');
    const allTestimonials = document.getElementById('allTestimonials');

    btn.addEventListener('click', function() {
      if (allTestimonials.style.display === 'none') {
        allTestimonials.style.display = 'flex';
        btn.textContent = 'Sembunyikan Semua Ulasan';
      } else {
        allTestimonials.style.display = 'none';
        btn.textContent = 'Tampilkan Semua Ulasan';
      }
    });
  });
</script>



 <!-- Team Section -->
<section id="team" class="team section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>TIM</h2>
    <p>Sosok yang ada dibalik<strong>The Sound Project</strong> Studio Musik</p>
  </div><!-- End Section Title -->

  <div class="container">
    <div class="row gy-4 justify-content-center">

      <!-- Row 1: 4 Members -->
      <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
        <div class="team-member text-center">
          <div class="member-img">
            <img src="assets/img/adina.png" alt="">
            <div class="social">
              <a href="#"><i class="bi bi-twitter-x"></i></a>
              <a href="#"><i class="bi bi-facebook"></i></a>
              <a href="#"><i class="bi bi-instagram"></i></a>
              <a href="#"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
          <div class="member-info">
            <h4>Adina Kanesya Dahuri</h4>
            <span>24110146</span>
          </div>
        </div>
      </div><!-- End Team Member -->

      <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="150">
        <div class="team-member text-center">
          <div class="member-img">
            <img src="assets/img/dila.png" alt="">
            <div class="social">
              <a href="#"><i class="bi bi-twitter-x"></i></a>
              <a href="#"><i class="bi bi-facebook"></i></a>
              <a href="#"><i class="bi bi-instagram"></i></a>
              <a href="#"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
          <div class="member-info">
            <h4>Dila Nurfadilah</h4>
            <span>24110112</span>
          </div>
        </div>
      </div><!-- End Team Member -->

      <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
        <div class="team-member text-center">
          <div class="member-img">
            <img src="assets/img/team/team-3.jpg" alt="">
            <div class="social">
              <a href="#"><i class="bi bi-twitter-x"></i></a>
              <a href="#"><i class="bi bi-facebook"></i></a>
              <a href="#"><i class="bi bi-instagram"></i></a>
              <a href="#"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
          <div class="member-info">
            <h4>Faisal Meilano</h4>
            <span>24110162</span>
          </div>
        </div>
      </div><!-- End Team Member -->

      <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="250">
        <div class="team-member text-center">
          <div class="member-img">
            <img src="assets/img/fitri.png" alt="">
            <div class="social">
              <a href="#"><i class="bi bi-twitter-x"></i></a>
              <a href="#"><i class="bi bi-facebook"></i></a>
              <a href="#"><i class="bi bi-instagram"></i></a>
              <a href="#"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
          <div class="member-info">
            <h4>Fitria Oktaviani</h4>
            <span>24110207</span>
          </div>
        </div>
      </div><!-- End Team Member -->

      <!-- Row 2: 3 Members -->
      <div class="col-lg-3 col-md-4 col-sm-6 offset-lg-1 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
        <div class="team-member text-center">
          <div class="member-img">
            <img src="assets/img/habil.png" alt="">
            <div class="social">
              <a href="#"><i class="bi bi-twitter-x"></i></a>
              <a href="#"><i class="bi bi-facebook"></i></a>
              <a href="#"><i class="bi bi-instagram"></i></a>
              <a href="#"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
          <div class="member-info">
            <h4>Habil Mahmudin</h4>
            <span>24110081</span>
          </div>
        </div>
      </div><!-- End Team Member -->

      <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="350">
        <div class="team-member text-center">
          <div class="member-img">
            <img src="assets/img/team/team-6.jpg" alt="">
            <div class="social">
              <a href="#"><i class="bi bi-twitter-x"></i></a>
              <a href="#"><i class="bi bi-facebook"></i></a>
              <a href="#"><i class="bi bi-instagram"></i></a>
              <a href="#"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
          <div class="member-info">
            <h4>Muhammad Rafli</h4>
            <span>24110113</span>
          </div>
        </div>
      </div><!-- End Team Member -->

      <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
        <div class="team-member text-center">
          <div class="member-img">
            <img src="assets/img/team/team-7.jpg" alt="">
            <div class="social">
              <a href="#"><i class="bi bi-twitter-x"></i></a>
              <a href="#"><i class="bi bi-facebook"></i></a>
              <a href="#"><i class="bi bi-instagram"></i></a>
              <a href="#"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
          <div class="member-info">
            <h4>Vira Riska Nuraziza</h4>
            <span>24110077</span>
          </div>
        </div>
      </div><!-- End Team Member -->

    </div>
  </div>
</section>

<!-- Tambahkan CSS berikut -->
<style>
  .member-img img {
    width: 250px;
    height: 250px;
    object-fit: cover;
    border-radius: 10px; /* Biar sudutnya lembut */
  }
</style>
<script>
  new Swiper('.testimonials-slider', {
    speed: 600,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    slidesPerView: 'auto',
    pagination: {
      el: '.swiper-pagination',
      clickable: true
    }
  });
</script>


  <footer id="footer" class="footer dark-background">

    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-geo-alt icon"></i>
          <div class="address">
            <h4>Alamat</h4>
            <p>Jl. Cibaduyut Yuhuu</p>
            <p>Bandung, Jawa Barat</p>
            <p></p>
          </div>

        </div>

        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-telephone icon"></i>
          <div>
            <h4>Kontak</h4>
            <p>
              <strong>WA:</strong> <span>+62 888 8888 8888</span><br>
              <strong>Email:</strong> <span>tsproject@gmail.com</span><br>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-clock icon"></i>
          <div>
            <h4>Buka</h4>
            <p>
              <strong>Setiap hari  </strong> <span>24 jam</span><br>
              <strong>Tutup?  </strong>Perang dunia 3 <span></span>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <h4>Ikuti Kita</h4>
          <div class="social-links d-flex">
            <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">TheSoundProject</strong></p>
    </div>

  </footer>

    <!-- JS Files -->
    <script src="<?php echo e(asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/aos/aos.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/glightbox/js/glightbox.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/swiper/swiper-bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>
    

    <script>
        AOS.init();
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Dell\Documents\uas_kellima_laravel\resources\views/klien/index.blade.php ENDPATH**/ ?>