@extends('layouts.master')

@section('title', 'Dashboard')

@section('css')
<style>
    .dashboard-container {
        padding: 2rem 0;
    }

    .welcome-card {
        background: linear-gradient(135deg, #1a1a1a, #000000);
        color: white;
        border-radius: 16px;
        padding: 3rem 2rem;
        margin-bottom: 2rem;
        text-align: center;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
    }

    .welcome-card h1 {
        font-size: 2.5rem;
        font-weight: 900;
        margin-bottom: 0.5rem;
    }

    .welcome-card p {
        font-size: 1.2rem;
        opacity: 0.9;
        margin: 0;
    }

    .menu-card {
        background: white;
        border-radius: 16px;
        padding: 2rem;
        transition: all 0.3s ease;
        cursor: pointer;
        text-decoration: none;
        display: block;
        height: 100%;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .menu-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        text-decoration: none;
    }

    .menu-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
        color: #1a1a1a;
    }

    .menu-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1a1a1a;
        margin-bottom: 0.5rem;
    }

    .menu-description {
        color: #666666;
        margin: 0;
        font-size: 0.95rem;
    }

    .menu-card.paket {
        background: linear-gradient(135deg, #fef3c7, #fde68a);
    }

    .menu-card.booking {
        background: linear-gradient(135deg, #dbeafe, #bfdbfe);
    }

    .menu-card.paket:hover,
    .menu-card.booking:hover {
        transform: translateY(-8px) scale(1.02);
    }

    .alert-modern {
        border: none;
        border-radius: 12px;
        padding: 1rem 1.5rem;
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        animation: slideDown 0.3s ease;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .alert-success {
        background: #d1fae5;
        color: #065f46;
    }

    @media (max-width: 768px) {
        .welcome-card h1 {
            font-size: 2rem;
        }

        .welcome-card p {
            font-size: 1rem;
        }

        .menu-icon {
            font-size: 2.5rem;
        }

        .menu-title {
            font-size: 1.25rem;
        }
    }
</style>
@endsection

@section('content')
<div class="container dashboard-container">
    <!-- Alert Success -->
    @if(session('success'))
    <div class="alert alert-success alert-modern">
        <i class="fas fa-check-circle"></i>
        <span>{{ session('success') }}</span>
    </div>
    @endif

    <!-- Welcome Card -->
    <div class="welcome-card">
        <h1><i class="fas fa-user-circle"></i> Halo, {{ Auth::user()->name }}!</h1>
        <p>Selamat datang di TravelIndo - Wujudkan liburan impian Anda</p>
    </div>

    <!-- Menu Grid -->
    <div class="row g-4">
        <!-- Menu Paket Wisata -->
        <div class="col-md-6">
            <a href="{{ route('paket.index') }}" class="menu-card paket">
                <div class="menu-icon">
                    <i class="fas fa-suitcase"></i>
                </div>
                <h3 class="menu-title">Paket Wisata</h3>
                <p class="menu-description">Jelajahi berbagai paket wisata menarik dan booking sekarang!</p>
            </a>
        </div>

        <!-- Menu My Bookings -->
        <div class="col-md-6">
            <a href="{{ route('booking.my') }}" class="menu-card booking">
                <div class="menu-icon">
                    <i class="fas fa-list-alt"></i>
                </div>
                <h3 class="menu-title">My Bookings</h3>
                <p class="menu-description">Lihat riwayat dan status pemesanan Anda</p>
            </a>
        </div>
    </div>

    <!-- Info Section -->
    <div class="row mt-5">
        <div class="col-12">
            <div style="background: #f5f5f5; border-radius: 12px; padding: 2rem; text-align: center;">
                <h4 style="color: #1a1a1a; margin-bottom: 1rem;">
                    <i class="fas fa-info-circle"></i> Informasi Akun
                </h4>
                <p style="color: #666666; margin: 0;">
                    <strong>Nama:</strong> {{ Auth::user()->name }} <br>
                    <strong>Email:</strong> {{ Auth::user()->email }} <br>
                    <strong>Role:</strong> <span class="badge bg-primary">{{ ucfirst(Auth::user()->role) }}</span>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
