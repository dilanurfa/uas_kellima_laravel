<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <title>The Sound Project</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet" />

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/bootstrap/css/bootstrap.min.css')); ?>" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/main.css')); ?>" />

    <style>
        #header {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1050;
            transition: all 0.4s ease;
            background: transparent;
        }
        #header.scrolled {
            background: #000;
        }
        #header .navmenu a {
            color: #fff;
            transition: color 0.3s ease;
        }
        #header .navmenu a.active,
        #header .navmenu a:hover {
            color: #1a88d6;
        }
        #header .dropdown-menu {
            background-color: #ffffff;
            border: none;
            margin-top: 0.5rem;
            z-index: 2000;
            left: 50% !important;
            transform: translateX(-50%);
        }
        #header .dropdown-menu a {
            color: #1b1616;
            padding: 8px 15px;
        }
        #header .dropdown-menu a:hover {
            background-color: #145ea8;
            color: #fff;
        }
        .dropdown-menu {
            transition: none !important;
            animation: none !important;
        }
        .logo a {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: 26px;
            text-transform: uppercase;
            color: #fff;
            letter-spacing: 1px;
            text-decoration: none;
        }
        #header.scrolled .logo a {
            color: #fff;
        }
        @media (max-width: 991px) {
            #header .dropdown-menu {
                left: 0 !important;
                transform: translateX(0) !important;
                width: 100%;
            }
        }

        #header .navmenu .dropdown-toggle {
    color: #fff !important;
}

#header .navmenu .dropdown-toggle:hover,
#header .navmenu .dropdown-toggle:focus {
    color: #1a88d6 !important;
}

    </style>
</head>
<body>
    <!-- Navbar -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="logo mb-0">
                <a href="<?php echo e(url('/')); ?>">The Sound Project</a>
            </h1>

            <nav id="navmenu" class="navmenu">
                <ul class="d-flex align-items-center mb-0">
                    <?php if(auth()->guard()->check()): ?>
                        <!-- Navbar untuk USER -->
                        <li><a href="<?php echo e(url('/')); ?>#hero" class="active">Beranda</a></li>
                        <li><a href="<?php echo e(url('/')); ?>#about">Tentang</a></li>
                        <li><a href="<?php echo e(url('/')); ?>#footer">Kontak</a></li>
                        <li><a href="<?php echo e(route('klien.riwayat')); ?>">Riwayat Booking</a></li>

                        <!-- Dropdown nama user -->
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" href="#" role="button" class="dropdown-toggle"
                               data-bs-toggle="dropdown" aria-expanded="false" style="color: inherit;">
                                <?php echo e(Auth::user()->name); ?> <i class="bi bi-chevron-down"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="<?php echo e(route('akun.show')); ?>">
                                        Profil Saya
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Keluar
                                    </a>
                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <!-- Navbar untuk guest (belum login) -->
                        <li><a href="<?php echo e(route('login')); ?>">Masuk</a></li>
                        <li><a href="<?php echo e(route('register')); ?>">Daftar</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Content -->
    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <!-- Scripts -->
    <script src="<?php echo e(asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script>
        // Ubah background navbar ketika scroll
        window.addEventListener('scroll', function() {
            const header = document.querySelector('#header');
            header.classList.toggle('scrolled', window.scrollY > 50);
        });
    </script>
</body>
</html>
<?php /**PATH C:\Users\ASUS VIVOBOOK DC\uas_kellima_laravel\resources\views/layouts/app.blade.php ENDPATH**/ ?>