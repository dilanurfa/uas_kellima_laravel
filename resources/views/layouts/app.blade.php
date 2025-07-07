<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>The Sound Project</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

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
            color: #1977cc;
        }
        #header .dropdown-menu {
            background-color: #1977cc;
            border: none;
            margin-top: 0.5rem;
            z-index: 2000;
            left: 50% !important;
            transform: translateX(-50%);
        }
        #header .dropdown-menu a {
            color: #fff;
            padding: 8px 15px;
        }
        #header .dropdown-menu a:hover {
            background-color: #145ea8;
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
    </style>
</head>
<body>
    <!-- Navbar -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="logo mb-0">
                <a href="{{ url('/') }}">The Sound Project</a>
            </h1>

            <nav id="navmenu" class="navmenu">
                <ul class="d-flex align-items-center mb-0">
                    @auth
                        @if (Request::is('admin*'))
                            <!-- Navbar untuk admin -->
                            <li><a href="#hero" class="active">Home</a></li>
                            <li><a href="#about">Tentang</a></li>
                        @else
                            <!-- Navbar untuk user -->
                            <li><a href="#hero" class="active">Home</a></li>
                            <li><a href="#about">Tentang</a></li>
                            <li><a href="#footer">Contact</a></li>
                        @endif

                        <!-- Dropdown nama user/admin -->
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }} <i class="bi bi-chevron-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('akun.show') }}">
                                        Profil Saya
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <!-- Navbar untuk guest (belum login) -->
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @endauth
                </ul>
            </nav>
        </div>
    </header>

    <!-- Content -->
    <main>
        @yield('content')
    </main>

    <!-- Scripts -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        // Change navbar background on scroll
        window.addEventListener('scroll', function() {
            const header = document.querySelector('#header');
            header.classList.toggle('scrolled', window.scrollY > 50);
        });
    </script>
</body>
</html>
