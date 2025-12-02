<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

     {{-- HENTIKAN CACHE HALAMAN SETELAH LOGOUT --}}
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">

    <title>@yield('title') - TravelIndo</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <style>
        /* GLOBAL: Hapus semua underline dari link */
        a {
            text-decoration: none !important;
        }
        a:hover,
        a:focus,
        a:active,
        a:visited {
            text-decoration: none !important;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background-color: #f5f5f5;
            color: #1a1a1a;
            line-height: 1.6;
            overflow-x: hidden;
        }

        body.landing-page {
            padding: 0;
            margin: 0;
        }

        body.landing-page .content-wrapper-modern {
            padding: 0;
            min-height: auto;
        }

        /* ===== NAVBAR ULTRA TRANSPARAN ===== */
        .navbar-ultra {
            background: transparent !important;
            backdrop-filter: none !important;
            border: none !important;
            box-shadow: none !important;
            position: absolute !important;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            padding: 2rem 0 !important;
            transition: all 0.5s ease;
        }

        .navbar-ultra.scrolled {
            background: rgba(255, 255, 255, 0.98) !important;
            backdrop-filter: blur(20px);
            padding: 1rem 0 !important;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand-ultra {
            font-weight: 900;
            font-size: 1.75rem;
            color: white !important;
            letter-spacing: -1px;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none !important;
            border: none !important;
            outline: none !important;
            box-shadow: none !important;
            background: transparent !important;
            transition: all 0.3s ease;
        }

        .navbar-brand-ultra:hover,
        .navbar-brand-ultra:focus,
        .navbar-brand-ultra:active,
        .navbar-brand-ultra:visited {
            text-decoration: none !important;
            border: none !important;
            outline: none !important;
            box-shadow: none !important;
            color: white !important;
        }

        .navbar-ultra.scrolled .navbar-brand-ultra {
            color: #1a1a1a !important;
        }

        .navbar-ultra.scrolled .navbar-brand-ultra:hover {
            color: #1a1a1a !important;
        }

        .navbar-menu-ultra {
            display: flex;
            align-items: center;
            gap: 0;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .nav-item-ultra {
            position: relative;
        }

        .nav-link-ultra {
            color: white !important;
            font-weight: 500;
            font-size: 0.95rem;
            padding: 0.75rem 1.5rem !important;
            text-decoration: none !important;
            transition: all 0.3s ease;
            display: block;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .nav-link-ultra:hover {
            color: rgba(255, 255, 255, 0.8) !important;
        }

        .navbar-ultra.scrolled .nav-link-ultra {
            color: #1a1a1a !important;
        }

        .navbar-ultra.scrolled .nav-link-ultra:hover {
            color: #666666 !important;
        }

        .nav-link-ultra.active {
            font-weight: 700;
        }

        .dropdown-ultra {
            position: relative;
        }

        .dropdown-toggle-ultra {
            background: transparent;
            border: 2px solid white;
            color: white !important;
            padding: 0.5rem 1.25rem;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .dropdown-toggle-ultra:hover {
            background: white;
            color: #000000 !important;
        }

        .navbar-ultra.scrolled .dropdown-toggle-ultra {
            border-color: #1a1a1a;
            color: #1a1a1a !important;
        }

        .navbar-ultra.scrolled .dropdown-toggle-ultra:hover {
            background: #1a1a1a;
            color: white !important;
        }

        .user-avatar-ultra {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: white;
            color: #000000;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.8rem;
        }

        .navbar-ultra.scrolled .user-avatar-ultra {
            background: #1a1a1a;
            color: white;
        }

        .dropdown-menu-ultra {
            background: white;
            border: none;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            border-radius: 12px;
            padding: 0.5rem;
            margin-top: 1rem;
            min-width: 200px;
        }

        .dropdown-item-ultra {
            padding: 0.75rem 1rem;
            border-radius: 8px;
            color: #1a1a1a;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .dropdown-item-ultra:hover {
            background: #f5f5f5;
            color: #1a1a1a;
        }

        .navbar-toggler-ultra {
            border: 2px solid white;
            padding: 0.5rem 0.75rem;
            border-radius: 8px;
            background: transparent;
            cursor: pointer;
        }

        .navbar-toggler-ultra:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.3);
        }

        .navbar-toggler-icon-ultra {
            width: 24px;
            height: 2px;
            background: white;
            display: block;
            position: relative;
            transition: all 0.3s ease;
        }

        .navbar-toggler-icon-ultra::before,
        .navbar-toggler-icon-ultra::after {
            content: '';
            width: 24px;
            height: 2px;
            background: white;
            position: absolute;
            left: 0;
            transition: all 0.3s ease;
        }

        .navbar-toggler-icon-ultra::before {
            top: -8px;
        }

        .navbar-toggler-icon-ultra::after {
            bottom: -8px;
        }

        .navbar-ultra.scrolled .navbar-toggler-ultra {
            border-color: #1a1a1a;
        }

        .navbar-ultra.scrolled .navbar-toggler-icon-ultra,
        .navbar-ultra.scrolled .navbar-toggler-icon-ultra::before,
        .navbar-ultra.scrolled .navbar-toggler-icon-ultra::after {
            background: #1a1a1a;
        }

        .navbar-solid {
            background: rgba(255, 255, 255, 0.98) !important;
            backdrop-filter: blur(20px);
            border-bottom: 1px solid #e0e0e0;
            padding: 1rem 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-solid .navbar-brand-ultra {
            color: #1a1a1a !important;
        }

        .navbar-solid .nav-link-ultra {
            color: #1a1a1a !important;
        }

        .navbar-solid .nav-link-ultra:hover {
            color: #666666 !important;
        }

        .navbar-solid .dropdown-toggle-ultra {
            border-color: #1a1a1a;
            color: #1a1a1a !important;
        }

        .navbar-solid .dropdown-toggle-ultra:hover {
            background: #1a1a1a;
            color: white !important;
        }

        .navbar-solid .user-avatar-ultra {
            background: #1a1a1a;
            color: white;
        }

        .content-wrapper-modern {
            min-height: calc(100vh - 80px);
            padding: 2rem 0;
        }

        .footer-modern {
            background: linear-gradient(135deg, #1a1a1a 0%, #000000 100%);
            color: white;
            padding: 3rem 0 1.5rem;
            margin-top: 4rem;
            position: relative;
            overflow: hidden;
        }

        body.landing-page .footer-modern {
            margin-top: 0;
        }

        .footer-modern::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #666666, #404040, #666666);
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-section h5 {
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .footer-section p,
        .footer-section a {
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 0.5rem;
            transition: all 0.3s ease;
        }

        .footer-section a:hover {
            color: white;
            transform: translateX(5px);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 1.5rem;
            text-align: center;
            color: rgba(255, 255, 255, 0.6);
        }

        .social-links {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-top: 1rem;
        }

        .social-link {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background: white;
            color: #000000;
            transform: translateY(-3px);
        }

        @media (max-width: 991px) {
            .navbar-menu-ultra {
                flex-direction: column;
                width: 100%;
                background: rgba(0, 0, 0, 0.95);
                padding: 1rem;
                margin-top: 1rem;
                border-radius: 12px;
            }

            .nav-link-ultra {
                width: 100%;
                text-align: left;
            }

            .dropdown-toggle-ultra {
                width: 100%;
                justify-content: center;
                margin-top: 1rem;
            }

            .navbar-ultra {
                padding: 1rem 0 !important;
            }

            .navbar-ultra.scrolled {
                padding: 0.75rem 0 !important;
            }
        }

        @media (max-width: 768px) {
            .content-wrapper-modern {
                padding: 1.5rem 0;
            }
            .footer-content {
                grid-template-columns: 1fr;
            }
            .navbar-brand-ultra {
                font-size: 1.5rem;
            }
        }
    </style>
    
    @yield('css')
</head>
<body class="{{ Request::is('/') ? 'landing-page' : '' }}">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg {{ Request::is('/') ? 'navbar-ultra' : 'navbar-solid' }}" id="mainNavbar">
        <div class="container-fluid px-4">
            <a class="navbar-brand-ultra" href="/">
                <i class="fas fa-plane-departure"></i>
                <span>TravelIndo</span>
            </a>

            <!-- Mobile Toggle -->
            <button class="navbar-toggler-ultra d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
                <span class="navbar-toggler-icon-ultra"></span>
            </button>

            <!-- Menu -->
            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-menu-ultra ms-auto">
                    @guest
                        <!-- Guest Menu -->
                        <li class="nav-item-ultra">
                            <a class="nav-link-ultra {{ Request::is('/') ? 'active' : '' }}" href="/">Beranda</a>
                        </li>
                        <li class="nav-item-ultra">
                            <a class="nav-link-ultra {{ Request::is('paket-wisata*') ? 'active' : '' }}" href="/paket-wisata">Paket Wisata</a>
                        </li>
                        <li class="nav-item-ultra">
                            <a class="nav-link-ultra {{ Request::is('destinasi*') ? 'active' : '' }}" href="{{ route('destinasi.index') }}">Destinasi</a>
                        </li>
                        <li class="nav-item-ultra">
                            <a class="nav-link-ultra {{ request()->routeIs('review') ? 'active' : '' }}" href="{{ route('review') }}">Review</a>
                        </li>
                        <li class="nav-item-ultra">
                            <a class="nav-link-ultra {{ Request::is('about') ? 'active' : '' }}" href="/about">About Us</a>
                        </li>
                        <li class="nav-item-ultra">
                            <a class="nav-link-ultra"
                               href="{{ route('login') }}"
                               style="border: 2px solid white; border-radius: 50px; padding: 0.5rem 1.5rem !important;">
                                Login
                            </a>
                        </li>
                        <li class="nav-item-ultra ms-lg-2">
                            <a class="nav-link-ultra"
                               href="{{ route('register') }}"
                               style="border: 2px solid white; border-radius: 50px; padding: 0.5rem 1.5rem !important;">
                                Register
                            </a>
                        </li>
                    @else
                        <!-- Logged In Menu -->
                        <li class="nav-item-ultra">
                            <a class="nav-link-ultra {{ Request::is('/') ? 'active' : '' }}" href="/">Beranda</a>
                        </li>
                        <li class="nav-item-ultra">
                            <a class="nav-link-ultra {{ Request::is('paket-wisata*') ? 'active' : '' }}" href="/paket-wisata">Paket Wisata</a>
                        </li>
                        <li class="nav-item-ultra">
                            <a class="nav-link-ultra {{ Request::is('destinasi*') ? 'active' : '' }}" href="{{ route('destinasi.index') }}">Destinasi</a>
                        </li>
                        <li class="nav-item-ultra">
                            <a class="nav-link-ultra {{ request()->routeIs('review') ? 'active' : '' }}" href="{{ route('review') }}">Review</a>
                        </li>
                        <li class="nav-item-ultra">
                            <a class="nav-link-ultra {{ Request::is('about') ? 'active' : '' }}" href="/about">About Us</a>
                        </li>

                        <!-- User Dropdown -->
                        <li class="nav-item-ultra dropdown-ultra ms-lg-3">
                            <a class="dropdown-toggle-ultra" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                                <div class="user-avatar-ultra">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                                <span>{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-ultra dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item-ultra" href="/home">
                                        <i class="fas fa-user-circle"></i> Profile
                                    </a>
                                </li>
                                @if(Auth::user()->role === 'user')
                                    <li>
                                        <a class="dropdown-item-ultra" href="{{ route('booking.my') }}">
                                            <i class="fas fa-list-alt"></i> My Bookings
                                        </a>
                                    </li>
                                @endif
                                @if(Auth::user()->role === 'admin')
                                    <li>
                                        <a class="dropdown-item-ultra" href="{{ route('booking.index') }}">
                                            <i class="fas fa-clipboard-list"></i> Kelola Booking
                                        </a>
                                    </li>
                                @endif
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item-ultra text-danger" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    @if(Request::is('/'))
        @yield('content')
    @else
        <div class="content-wrapper-modern">
            <div class="container">
                @yield('content')
            </div>
        </div>
    @endif

    <!-- Footer -->
    <footer class="footer-modern">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h5><i class="fas fa-plane-departure"></i> TravelIndo</h5>
                    <p>Jelajahi keindahan Indonesia bersama kami. Paket wisata terpercaya dengan harga terbaik.</p>
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-section">
                    <h5>Layanan</h5>
                    <a href="/paket-wisata">Paket Wisata</a>
                    <a href="{{ route('destinasi.index') }}">Destinasi Populer</a>
                    <a href="#">Tour Guide</a>
                    <a href="#">Travel Insurance</a>
                </div>
                <div class="footer-section">
                    <h5>Perusahaan</h5>
                    <a href="/about">Tentang Kami</a>
                    <a href="#">Karir</a>
                    <a href="#">Blog</a>
                    <a href="#">Partnership</a>
                </div>
                <div class="footer-section">
                    <h5>Kontak</h5>
                    <p><i class="fas fa-map-marker-alt"></i> Jl. Raya Wisata No. 123, Jakarta</p>
                    <p><i class="fas fa-phone"></i> +62 812-3456-7890</p>
                    <p><i class="fas fa-envelope"></i> info@travelindo.com</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p class="mb-0">
                    &copy; 2024 TravelIndo. All Rights Reserved.
                </p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Navbar Scroll Effect
        const navbar = document.getElementById('mainNavbar');
        window.addEventListener('scroll', function() {
            if (navbar && navbar.classList.contains('navbar-ultra')) {
                if (window.scrollY > 100) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            }
        });

        // Smooth Scroll untuk anchor /#...
        document.querySelectorAll('a[href^="/#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const targetId = this.getAttribute('href').substring(2);
                const targetElement = document.getElementById(targetId);
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
    
    @yield('scripts')
        @guest
    <script>
        (function () {
            // Daftar URL yang boleh diakses tanpa login
            const publicPaths = [
                '/',
                '/about',
                '/review',
                '/destinasi',
                '/login',
                '/register',
            ];

            const currentPath = window.location.pathname;

            // Jika user sudah logout (guest) dan berada di halaman private,
            // langsung paksa kembali ke beranda.
            if (!publicPaths.includes(currentPath)) {
                window.location.replace('{{ route('welcome') }}');
            }
        })();
    </script>
    @endguest
</body>
</html>

