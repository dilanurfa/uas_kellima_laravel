<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Daftar Akun - Studio Musik</title>

  <!-- Bootstrap bawaan -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />

  <style>
    body {
      margin-top: 20px;
      background: #f6f9fc;
    }

    /* Biar nggak terlalu nempel di bawah */
    #main-wrapper {
      padding-bottom: 50px;
    }

    .account-block {
      padding: 0;
      background-image: url('https://pinterplan.com/wp-content/uploads/2021/10/SEMERU-MUSIC-STUDIO-BOGOR-2015-2.jpg');
      background-repeat: no-repeat;
      background-size: cover;
      height: 100%;
      position: relative;
      border-radius: 0 0.5rem 0.5rem 0;
    }

    .account-block .overlay {
      position: absolute;
      top: 0; bottom: 0; left: 0; right: 0;
      background: rgba(0, 0, 0, 0.4);
      border-radius: 0 0.5rem 0.5rem 0;
    }

    .account-block .account-testimonial {
      color: #fff;
      text-align: center;
      position: absolute;
      bottom: 3rem;
      left: 0; right: 0;
      padding: 0 1.75rem;
    }

    .text-theme {
      color: #343a40 !important;
    }

    .btn-theme {
      background-color: #343a40;
      border-color: #343a40;
      color: #fff;
    }

    .btn-theme:hover {
      background-color: #23272b;
      border-color: #23272b;
      color: #fff;
    }
  </style>
</head>

<body>
  <div id="main-wrapper" class="container">
    <div class="row justify-content-center">
      <div class="col-xl-10">
        <!-- Kartu utama -->
        <div class="card border-0 shadow mt-5">
          <div class="card-body p-0">
            <div class="row no-gutters">

              <!-- Kolom form -->
              <div class="col-lg-6">
                <div class="p-5">
                  <!-- Judul -->
                  <div class="mb-5">
                    <h3 class="h4 font-weight-bold text-theme">Buat Akun Baru</h3>
                  </div>

                  <h6 class="h5 mb-0">Yuk, daftar dulu!</h6>
                  <p class="text-muted mt-2 mb-5">
                    Isi data di bawah supaya kamu bisa booking studio lebih mudah.
                  </p>

                  <form method="POST" action="<?php echo e(route('register')); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="form-group">
                      <label for="name">Nama Lengkap</label>
                      <input
                        id="name"
                        type="text"
                        class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        name="name"
                        value="<?php echo e(old('name')); ?>"
                        required
                        autofocus
                      >
                      <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback mt-1"><?php echo e($message); ?></div>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="form-group">
                      <label for="email">Alamat Email</label>
                      <input
                        id="email"
                        type="email"
                        class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        name="email"
                        value="<?php echo e(old('email')); ?>"
                        required
                      >
                      <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback mt-1"><?php echo e($message); ?></div>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="form-group">
                      <label for="password">Kata Sandi</label>
                      <input
                        id="password"
                        type="password"
                        class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        name="password"
                        required
                      >
                      <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback mt-1"><?php echo e($message); ?></div>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="form-group mb-4">
                      <label for="password-confirm">Konfirmasi Kata Sandi</label>
                      <input
                        id="password-confirm"
                        type="password"
                        class="form-control"
                        name="password_confirmation"
                        required
                      >
                    </div>

                    <button type="submit" class="btn btn-theme btn-block">
                      Daftar Sekarang
                    </button>
                  </form>
                </div>
              </div>

              <!-- Blok gambar -->
              <div class="col-lg-6 d-none d-lg-block">
                <div class="account-block rounded-right">
                  <div class="overlay rounded-right"></div>
                  <div class="account-testimonial">
                    <h4 class="mb-4">The Sound Project, tempat nyaman bikin musik.</h4>
                    <p class="lead">
                      "Bikin musik di sini serasa di ruang tamu sendiri. Ngopi? Ngobrol? Atur aja!"
                    </p>
                    <p>– Admin The Sound Project</p>
                  </div>
                </div>
              </div>

            </div> <!-- .row -->
          </div> <!-- .card-body -->
        </div> <!-- .card -->

        <p class="text-muted text-center mt-3 mb-0">
          Udah punya akun? <a href="<?php echo e(route('login')); ?>" class="text-theme ml-1">Masuk di sini</a>
        </p>
      </div> <!-- .col -->
    </div> <!-- .row -->
  </div> <!-- .container -->

  <!-- Script Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\Users\lenovo\Documents\uas_kellima_laravel\resources\views/auth/register.blade.php ENDPATH**/ ?>