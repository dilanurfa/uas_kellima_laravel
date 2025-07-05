@extends('layouts.app')

@section('content')
    <!-- CSS Imperial -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/aos/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

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
            <source src="{{ asset('assets/img/studio.mp4') }}" type="video/mp4" />
        </video>
        <div class="container text-center position-relative" style="z-index:2;">
            <h2 class="text-white">Selamat Datang di <em style="color:#1977cc;">The sound project </em>Studio Musik</h2>
            <p class="text-light">Studio keren, nyaman dan banyak macam pilihan</p>
            <a href="#studios" class="btn btn-primary">Lihat Studio</a>
        </div>
    </section>

    <<!-- About Section -->
<section id="about" class="about py-5">
    <div class="container section-title text-center mb-5" data-aos="fade-up">
        <h2 class="fw-bold">TENTANG</h2>
    <div class="container">
        <div class="row gy-4 align-items-center">

            <!-- Gambar -->
            <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
                <img src="{{ asset('assets/img/about.jpg') }}" class="img-fluid rounded shadow" alt="About">
            </div>

            <!-- Konten -->
            <div class="col-lg-6 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                <h3 class="fw-bold">Voluptatem dignissimos provident quasi corporis</h3>
                <p class="fst-italic">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                    magna aliqua.
                </p>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <i class="bi bi-check-circle text-primary"></i>
                        <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat.</span>
                    </li>
                    <li class="mb-2">
                        <i class="bi bi-check-circle text-primary"></i>
                        <span>Duis aute irure dolor in reprehenderit in voluptate velit.</span>
                    </li>
                    <li class="mb-2">
                        <i class="bi bi-check-circle text-primary"></i>
                        <span>
                            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                            in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.
                        </span>
                    </li>
                </ul>
                <a href="#" class="btn btn-outline-primary mt-3">
                    Read More <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>
</section>

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
              <p>The sound project menjadi Top 1 di Bandung dikarenakan kualitasnya yang jos </p>
            </div>
          </div><!-- End Feature Borx-->

          <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
            <div class="feature-box blue">
              <i class="bi bi-patch-check"></i>
              <h4>Peralatan Lengkap</h4>
              <p>Dengan alat musik yang lengkap, pastinya anda tidak akan bingung untuk memilih yang mana </p>
            </div>
          </div><!-- End Feature Borx-->

          <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
            <div class="feature-box green">
              <i class="bi bi-sunrise"></i>
              <h4>Kantin</h4>
              <p>Lapar? kami menyediakan kantin untuk anda dengan berbagai macam pilihan makanan</p>
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

      <img src="assets/img/cta-bg.jpg" alt="">

      <div class="container">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-xl-9 text-center text-xl-start">
            <h3>Tertarik Nih?</h3>
            <p>Ayo booking sekarang juga, sebelum keduluan orang lain!</p>
          </div>
          <div class="col-xl-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#">Booking</a>
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
                @if($Ruangan->count())
                    @foreach($Ruangan as $rgn)
                        <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="card shadow border-0">
                                @if($rgn->foto)
                                    <img src="{{ asset('storage/' . $rgn->foto) }}" class="card-img-top" alt="{{ $rgn->nama_ruangan }}">
                                @else
                                    <img src="https://via.placeholder.com/400x250?text=No+Image" class="card-img-top" alt="No Image">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title text-primary">{{ $rgn->nama_ruangan }}</h5>
                                    <p class="card-text">Harga: <strong>Rp {{ number_format($rgn->harga, 0, ',', '.') }}</strong></p>
                                    <p class="card-text text-muted">{{ $rgn->deskripsi ?? 'Tidak ada deskripsi.' }}</p>
                                    <a href="{{ route('klien.booking', $rgn->id) }}" class="btn btn-primary w-100">Booking Sekarang</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 text-center">
                        <p class="text-muted">Belum ada studio tersedia saat ini</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Testimonials</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">


            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <span>Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.</span>
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <h3>Saul Goodman</h3>
                      <h4>Ceo &amp; Founder</h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 text-center">
                    <img src="assets/img/testimonials/testimonials-1.jpg" class="img-fluid testimonial-img" alt="">
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->

    </section><!-- /Testimonials Section -->

 <!-- Team Section -->
<section id="team" class="team section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Team</h2>
    <p>Kami adalah tim di balik <strong>The Sound Project</strong> Studio Musik</p>
  </div><!-- End Section Title -->

  <div class="container">
    <div class="row gy-4 justify-content-center">

      <!-- Row 1: 4 Members -->
      <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
        <div class="team-member text-center">
          <div class="member-img">
            <img src="assets/img/team/team-1.jpg" alt="">
            <div class="social">
              <a href="#"><i class="bi bi-twitter-x"></i></a>
              <a href="#"><i class="bi bi-facebook"></i></a>
              <a href="#"><i class="bi bi-instagram"></i></a>
              <a href="#"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
          <div class="member-info">
            <h4>Adina Kanesya Dahuri</h4>
            <span>24111111</span>
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
            <span>24111111</span>
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
            <span>24111111</span>
          </div>
        </div>
      </div><!-- End Team Member -->

      <!-- Row 2: 3 Members -->
      <div class="col-lg-3 col-md-4 col-sm-6 offset-lg-1 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
        <div class="team-member text-center">
          <div class="member-img">
            <img src="assets/img/team/team-5.jpg" alt="">
            <div class="social">
              <a href="#"><i class="bi bi-twitter-x"></i></a>
              <a href="#"><i class="bi bi-facebook"></i></a>
              <a href="#"><i class="bi bi-instagram"></i></a>
              <a href="#"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
          <div class="member-info">
            <h4>Habil Mahmudin</h4>
            <span>24111111</span>
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
            <span>24111111</span>
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
            <h4>Vira Rizka Nuraziza</h4>
            <span>24111111</span>
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

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-4">
            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h3>Address</h3>
                <p>A108 Adam Street, New York, NY 535022</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Call Us</h3>
                <p>+1 5589 55488 55</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email Us</h3>
                <p>info@example.com</p>
              </div>
            </div><!-- End Info Item -->

          </div>

          <div class="col-lg-8">
            <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Send Message</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer dark-background">

    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-geo-alt icon"></i>
          <div class="address">
            <h4>Address</h4>
            <p>A108 Adam Street</p>
            <p>New York, NY 535022</p>
            <p></p>
          </div>

        </div>

        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-telephone icon"></i>
          <div>
            <h4>Contact</h4>
            <p>
              <strong>Phone:</strong> <span>+1 5589 55488 55</span><br>
              <strong>Email:</strong> <span>info@example.com</span><br>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-clock icon"></i>
          <div>
            <h4>Opening Hours</h4>
            <p>
              <strong>Mon-Sat:</strong> <span>11AM - 23PM</span><br>
              <strong>Sunday</strong>: <span>Closed</span>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <h4>Follow Us</h4>
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
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Imperial</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>

    <!-- JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    

    <script>
        AOS.init();
    </script>
@endsection
