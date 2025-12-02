@extends('layouts.master')

@section('title', 'TravelIndo - Jelajahi Keindahan Indonesia')

@section('css')
<style>
    /* FULL SCREEN FIX */
    body, html {
        width: 100%;
        overflow-x: hidden;
        margin: 0;
        padding: 0;
    }

    /* ===== LOADING SCREEN ===== */
    .loading-screen {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, #2c2c2cff 0%, #474747ff 100%);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        transition: opacity 0.5s ease;
    }

    .loading-screen.fade-out {
        opacity: 0;
        pointer-events: none;
    }

    .loader {
        width: 60px;
        height: 60px;
        border: 5px solid rgba(255,255,255,0.3);
        border-top-color: white;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }

    /* ===== HERO SECTION WITH BACKGROUND FOTO TRANSPARAN ===== */
    .hero-premium {
        position: relative;
        height: 100vh;
        width: 100%;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 !important;
        padding: 0 !important;
        background-image: url('https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?w=1920');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;

    }

    .hero-video {
        position: absolute;
        top: 50%;
        left: 50%;
        min-width: 100%;
        min-height: 100%;
        width: auto;
        height: auto;
        transform: translateX(-50%) translateY(-50%);
        z-index: 0;
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.45);
        z-index: 1;
    }

    .hero-content-premium {
        position: relative;
        z-index: 2;
        text-align: center;
        color: white;
        max-width: 900px;
        padding: 2rem;
    }

    .hero-title {
        font-size: 4rem;
        font-weight: 900;
        margin-bottom: 1.5rem;
        line-height: 1.2;
        animation: fadeInUp 1s ease-out;
        text-shadow: 2px 4px 8px rgba(0,0,0,0.3);
    }

    .hero-subtitle {
        font-size: 1.5rem;
        margin-bottom: 2rem;
        font-weight: 300;
        animation: fadeInUp 1s ease-out 0.3s both;
        text-shadow: 1px 2px 4px rgba(0,0,0,0.3);
    }

    .hero-cta {
        animation: fadeInUp 1s ease-out 0.6s both;
    }

    .btn-hero {
        padding: 1.25rem 3rem;
        font-size: 1.125rem;
        font-weight: 700;
        border-radius: 50px;
        transition: all 0.4s ease;
        margin: 0 0.5rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        text-decoration: none;
        display: inline-block;
    }

    .btn-hero-primary {
        background: white;
        color: #4c4c4dff;
    }

    .btn-hero-primary:hover {
        transform: translateY(-5px) scale(1.05);
        box-shadow: 0 15px 40px rgba(255,255,255,0.4);
        color: #667eea;
    }

    .btn-hero-outline {
        background: transparent;
        color: white;
        border: 3px solid white;
    }

    .btn-hero-outline:hover {
        background: white;
        color: #ff0000ff;
        transform: translateY(-5px) scale(1.05);
    }

    .scroll-indicator {
        position: absolute;
        bottom: 2rem;
        left: 50%;
        transform: translateX(-50%);
        z-index: 2;
        animation: bounce 2s infinite;
    }

    .scroll-indicator i {
        font-size: 2rem;
        color: white;
    }

    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% { transform: translateY(0) translateX(-50%); }
        40% { transform: translateY(-20px) translateX(-50%); }
        60% { transform: translateY(-10px) translateX(-50%); }
    }

    /* ===== STATISTICS SECTION ===== */
    .stats-section {
        background: linear-gradient(135deg, #d8d8d8ff 0%, #6b6b6bff 100%);
        padding: 5rem 0;
        color: white;
        position: relative;
        overflow: hidden;
        margin: 0 !important;
    }

    .stats-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="rgba(255,255,255,0.05)" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,154.7C960,171,1056,181,1152,165.3C1248,149,1344,107,1392,85.3L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>');
        opacity: 0.3;
    }

    .stat-card {
        text-align: center;
        padding: 2rem;
        transition: transform 0.3s ease;
        position: relative;
        z-index: 1;
    }

    .stat-card:hover {
        transform: translateY(-10px);
    }

    .stat-number {
        font-size: 3.5rem;
        font-weight: 900;
        display: block;
        margin-bottom: 0.5rem;
    }

    .stat-label {
        font-size: 1.125rem;
        opacity: 0.9;
        font-weight: 500;
    }

    /* ===== PARALLAX SECTIONS ===== */
    .parallax-section {
        position: relative;
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        min-height: 500px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 !important;
    }

    .parallax-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
    }

    .parallax-content {
        position: relative;
        z-index: 2;
        color: white;
        text-align: center;
        max-width: 800px;
        padding: 2rem;
    }

    /* ===== DESTINATIONS SECTION ===== */
    .destinations-section {
        padding: 6rem 0;
        background: #f8fafc;
        margin: 0 !important;
    }

    .section-title {
        text-align: center;
        margin-bottom: 4rem;
    }

    .section-title h2 {
        font-size: 3rem;
        font-weight: 900;
        margin-bottom: 1rem;
        background: linear-gradient(135deg, #096d3eff, #189f60ff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .section-title p {
        font-size: 1.25rem;
        color: #64748b;
    }

    .destination-card {
        position: relative;
        height: 400px;
        border-radius: 20px;
        overflow: hidden;
        cursor: pointer;
        transition: all 0.5s cubic-bezier(0.165, 0.84, 0.44, 1);
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    }

    .destination-card:hover {
        transform: translateY(-15px) scale(1.02);
        box-shadow: 0 20px 50px rgba(0,0,0,0.25);
    }

    .destination-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .destination-card:hover .destination-image {
        transform: scale(1.15);
    }

    .destination-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, transparent 100%);
        padding: 2rem;
        transform: translateY(0);
        transition: all 0.4s ease;
    }

    .destination-card:hover .destination-overlay {
        background: linear-gradient(to top, rgba(78, 75, 75, 0.95) 0%, rgba(98, 98, 101, 0.85) 100%);
    }

    .destination-name {
        font-size: 1.75rem;
        font-weight: 800;
        color: white;
        margin-bottom: 0.5rem;
    }

    .destination-location {
        color: rgba(255,255,255,0.9);
        font-size: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    /* Button untuk Lihat Destinasi */
    .btn-primary-modern {
        background: linear-gradient(135deg, #1e291e 0%, #1e1e1e);
        color: white;
        border: none;
        padding: 1rem 2.5rem;
        border-radius: 50px;
        font-weight: 700;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.4s ease;
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
    }

    .btn-primary-modern:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(102, 126, 234, 0.5);
        color: white;
    }

    /* ===== WHY CHOOSE US ===== */
    .why-choose-section {
        padding: 6rem 0;
        background: white;
        margin: 0 !important;
    }

    .feature-box {
        text-align: center;
        padding: 2.5rem;
        transition: all 0.4s ease;
        border-radius: 20px;
    }

    .feature-box:hover {
        background: #f8fafc;
        transform: translateY(-10px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .feature-icon {
        width: 90px;
        height: 90px;
        background: linear-gradient(135deg, #656569ff, #837e7eff);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        transition: all 0.4s ease;
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
    }

    .feature-box:hover .feature-icon {
        transform: rotateY(360deg);
        box-shadow: 0 15px 40px rgba(18, 18, 18, 0.5);
    }

    .feature-icon i {
        font-size: 2.5rem;
        color: white;
    }

    .feature-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
        color: #323232ff;
    }

    .feature-text {
        color: #64748b;
        line-height: 1.7;
    }

    /* ===== TESTIMONIALS ===== */
    .testimonials-section {
        padding: 6rem 0;
        background: linear-gradient(135deg, #1d1c1cff 0%, #1e1e1e 100%);
        color: white;
        margin: 0 !important;
    }

    .testimonial-card {
        background: rgba(255,255,255,0.1);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 2.5rem;
        margin: 1rem;
        border: 1px solid rgba(255,255,255,0.2);
        transition: all 0.3s ease;
    }

    .testimonial-card:hover {
        transform: translateY(-5px);
        background: rgba(255,255,255,0.15);
    }

    .testimonial-text {
        font-size: 1.125rem;
        font-style: italic;
        margin-bottom: 1.5rem;
        line-height: 1.8;
    }

    .testimonial-author {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .author-avatar {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        border: 3px solid white;
    }

    .author-info h5 {
        margin: 0;
        font-weight: 700;
    }

    .author-info p {
        margin: 0;
        opacity: 0.8;
    }

    .stars {
        color: #fbbf24;
        font-size: 1.125rem;
        margin-bottom: 1rem;
    }

    /* ===== NEWSLETTER ===== */
    .newsletter-section {
        padding: 5rem 0;
        background: #1d1c1cff;
        color: white;
        margin: 0 !important;
    }

    .newsletter-form {
        max-width: 600px;
        margin: 0 auto;
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
    }

    .newsletter-input {
        flex: 1;
        padding: 1.25rem 1.5rem;
        border-radius: 50px;
        border: none;
        font-size: 1rem;
    }

    .newsletter-button {
        padding: 1.25rem 2.5rem;
        background: linear-gradient(135deg, #3392f2ff, #84bbfaff);
        color: white;
        border: none;
        border-radius: 50px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .newsletter-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.5);
    }

    /* ===== ANIMATIONS ===== */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .fade-in-up {
        opacity: 0;
        animation: fadeInUp 0.8s ease-out forwards;
    }

    /* Intersection Observer Classes */
    .reveal {
        opacity: 0;
        transform: translateY(50px);
        transition: all 0.8s ease-out;
    }

    .reveal.active {
        opacity: 1;
        transform: translateY(0);
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }

        .hero-subtitle {
            font-size: 1.125rem;
        }

        .btn-hero {
            padding: 1rem 2rem;
            font-size: 1rem;
            margin: 0.5rem 0;
            display: block;
            width: 100%;
        }

        .section-title h2 {
            font-size: 2rem;
        }

        .destination-card {
            height: 300px;
            margin-bottom: 1.5rem;
        }

        .stat-number {
            font-size: 2.5rem;
        }

        .newsletter-form {
            flex-direction: column;
        }

        .parallax-section {
            background-attachment: scroll;
        }

        .feature-icon {
            width: 70px;
            height: 70px;
        }

        .feature-icon i {
            font-size: 2rem;
        }
    }
</style>
@endsection

@section('content')
<!-- Loading Screen -->
<div class="loading-screen" id="loadingScreen">
    <div class="loader"></div>
</div>

<!-- Hero Section with Background -->
<section class="hero-premium">
    <!-- <video class="hero-video" autoplay muted loop playsinline>
        <source src="{{ asset('videos/hero-video.mp4') }}" type="video/mp4">
    </video> -->
    <div class="hero-overlay"></div>
    <div class="hero-content-premium">
        <h1 class="hero-title">Jelajahi Keindahan<br>Indonesia Bersama Kami</h1>
        <p class="hero-subtitle">Temukan pengalaman perjalanan tak terlupakan dengan paket wisata terpercaya dan harga terbaik</p>
        <div class="hero-cta">
            <a href="/paket-wisata" class="btn btn-hero btn-hero-primary">
                <i class="fas fa-compass me-2"></i> Jelajahi Sekarang
            </a>
            <a href="#destinations" class="btn btn-hero btn-hero-outline">
                <i class="fas fa-play me-2"></i> Lihat Destinasi
            </a>
        </div>
    </div>
    <div class="scroll-indicator">
        <i class="fas fa-chevron-down"></i>
    </div>
</section>

<!-- Statistics Section -->
<section class="stats-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-6 mb-4 mb-md-0">
                <div class="stat-card reveal">
                    <span class="stat-number counter" data-target="5000">0</span>
                    <span class="stat-label">Happy Travelers</span>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4 mb-md-0">
                <div class="stat-card reveal">
                    <span class="stat-number counter" data-target="150">0</span>
                    <span class="stat-label">Tour Packages</span>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-card reveal">
                    <span class="stat-number counter" data-target="50">0</span>
                    <span class="stat-label">Destinations</span>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-card reveal">
                    <span class="stat-number counter" data-target="12">0</span>
                    <span class="stat-label">Years Experience</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Destinations Section -->
<section class="destinations-section" id="destinations">
    <div class="container">
        <div class="section-title reveal">
            <h2>Destinasi Populer</h2>
            <p>Jelajahi tempat-tempat menakjubkan di Indonesia</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="destination-card reveal">
                    <img src="{{ asset('images/bali.jpg') }}" alt="Bali" class="destination-image">
                    <div class="destination-overlay">
                        <h3 class="destination-name">Bali</h3>
                        <div class="destination-location">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Pulau Dewata</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="destination-card reveal">
                    <img src="{{ asset('images/raja-ampat.jpg') }}" alt="Raja Ampat " class="destination-image">
                    <div class="destination-overlay">
                        <h3 class="destination-name">Raja Ampat</h3>
                        <div class="destination-location">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Papua Barat</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="destination-card reveal">
                    <img src="{{ asset('images/jogja.jpg') }}" alt="Yogyakarta" class="destination-image">
                    <div class="destination-overlay">
                        <h3 class="destination-name">Yogyakarta</h3>
                        <div class="destination-location">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Istimewa Yogyakarta</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="destination-card reveal">
                    <img src="{{ asset('images/mandalika.jpg') }}" alt="Lombok" class="destination-image">
                    <div class="destination-overlay">
                        <h3 class="destination-name">Lombok</h3>
                        <div class="destination-location">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Nusa Tenggara Barat</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="destination-card reveal">
                    <img src="{{ asset('images/gunung-bromo.jpg') }}" alt="Gunung Bromo" class="destination-image">
                    <div class="destination-overlay">
                        <h3 class="destination-name">Gunung Bromo</h3>
                        <div class="destination-location">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Jawa Timur</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="destination-card reveal">
                   <img src="{{ asset('images/pulau-komodo.jpg') }}" alt="Pulau Komodo" class="destination-image">
                    <div class="destination-overlay">
                        <h3 class="destination-name">Pulau Komodo</h3>
                        <div class="destination-location">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Nusa Tenggara Timur</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5 reveal">
            <a href="{{ route('destinasi.index') }}" class="btn btn-primary-modern btn-lg">
                <i class="fas fa-map-marked-alt me-2"></i> Lihat Destinasi
            </a>
        </div>
    </div>
</section>

<!-- Parallax CTA Section -->
<section class="parallax-section" style="background-image: url('https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?w=1920');">
    <div class="parallax-overlay"></div>
    <div class="parallax-content">
        <h2 class="display-4 fw-bold mb-4">Siap Memulai Petualangan?</h2>
        <p class="lead mb-4">Dapatkan penawaran terbaik dan diskon hingga 30% untuk pemesanan hari ini</p>
        <a href="/paket-wisata" class="btn btn-hero btn-hero-primary btn-lg">
            <i class="fas fa-ticket-alt me-2"></i> Pesan Sekarang
        </a>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="why-choose-section">
    <div class="container">
        <div class="section-title reveal">
            <h2>Mengapa Memilih Kami?</h2>
            <p>Alasan mengapa TravelIndo adalah pilihan terbaik untuk perjalanan Anda</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="feature-box reveal">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h4 class="feature-title">Aman & Terpercaya</h4>
                    <p class="feature-text">Keamanan dan kenyamanan Anda adalah prioritas utama kami</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="feature-box reveal">
                    <div class="feature-icon">
                        <i class="fas fa-tag"></i>
                    </div>
                    <h4 class="feature-title">Harga Terbaik</h4>
                    <p class="feature-text">Dapatkan paket wisata dengan harga paling kompetitif</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="feature-box reveal">
                    <div class="feature-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h4 class="feature-title">24/7 Support</h4>
                    <p class="feature-text">Tim support kami siap membantu Anda kapan saja</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="feature-box reveal">
                    <div class="feature-icon">
                        <i class="fas fa-award"></i>
                    </div>
                    <h4 class="feature-title">Berpengalaman</h4>
                    <p class="feature-text">12 tahun pengalaman melayani ribuan wisatawan</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials-section" id="testimonials">
    <div class="container">
        <div class="section-title text-white reveal">
            <h2 style="color: white; -webkit-text-fill-color: white;">Apa Kata Mereka</h2>
            <p>Testimoni dari para traveler yang telah mempercayai kami</p>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="testimonial-card reveal">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">"Pengalaman tour ke Bali sangat luar biasa! Guide sangat ramah dan profesional. Highly recommended!"</p>
                    <div class="testimonial-author">
                        <img src="https://i.pravatar.cc/60?img=1" alt="Avatar" class="author-avatar">
                        <div class="author-info">
                            <h5>Sarah Johnson</h5>
                            <p>Bali Package - Oct 2024</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="testimonial-card reveal">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">"Raja Ampat was breathtaking! The service was excellent and everything was well-organized. Worth every penny!"</p>
                    <div class="testimonial-author">
                        <img src="https://i.pravatar.cc/60?img=12" alt="Avatar" class="author-avatar">
                        <div class="author-info">
                            <h5>Michael Chen</h5>
                            <p>Raja Ampat - Sep 2024</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="testimonial-card reveal">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">"Trip ke Yogyakarta sangat berkesan! Hotel bagus, makanan enak, dan itinerary yang sempurna. Terima kasih TravelIndo!"</p>
                    <div class="testimonial-author">
                        <img src="https://i.pravatar.cc/60?img=5" alt="Avatar" class="author-avatar">
                        <div class="author-info">
                            <h5>Putri Handayani</h5>
                            <p>Yogyakarta - Nov 2024</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="newsletter-section">
    <div class="container text-center">
        <div class="reveal">
            <h2 class="display-5 fw-bold mb-3">Dapatkan Penawaran Spesial</h2>
            <p class="lead mb-4">Subscribe untuk mendapatkan update paket wisata terbaru dan diskon eksklusif</p>
            <form class="newsletter-form">
                @csrf
                <input type="email" class="newsletter-input" placeholder="Masukkan email Anda..." required>
                <button type="submit" class="newsletter-button">
                    <i class="fas fa-paper-plane me-2"></i> Subscribe
                </button>
            </form>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    // Loading Screen
    window.addEventListener('load', function() {
        setTimeout(function() {
            document.getElementById('loadingScreen').classList.add('fade-out');
        }, 1000);
    });

    // Intersection Observer for Reveal Animations
    const revealElements = document.querySelectorAll('.reveal');
    
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
            }
        });
    }, {
        threshold: 0.15
    });

    revealElements.forEach(el => revealObserver.observe(el));

    // Counter Animation
    const counters = document.querySelectorAll('.counter');
    let counterStarted = false;

    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !counterStarted) {
                counterStarted = true;
                counters.forEach(counter => {
                    const target = parseInt(counter.getAttribute('data-target'));
                    const duration = 2000;
                    const increment = target / (duration / 16);
                    let current = 0;

                    const updateCounter = () => {
                        current += increment;
                        if (current < target) {
                            counter.textContent = Math.floor(current);
                            requestAnimationFrame(updateCounter);
                        } else {
                            counter.textContent = target;
                        }
                    };

                    updateCounter();
                });
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(counter => counterObserver.observe(counter));

    // Smooth Scroll
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Newsletter Form
    document.querySelector('.newsletter-form').addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Terima kasih telah subscribe! Kami akan mengirimkan penawaran terbaik ke email Anda.');
        this.reset();
    });
</script>
@endsection
