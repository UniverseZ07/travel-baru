@extends('layouts.master')

@section('title', $paket->nama_paket)

@section('css')
<style>
    .detail-container {
        max-width: 1200px;
        margin: 2rem auto;
    }

    .detail-image {
        width: 100%;
        height: 500px;
        object-fit: cover;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    }

    .detail-content {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        margin-top: 2rem;
    }

    .detail-title {
        font-size: 2.5rem;
        font-weight: 900;
        color: #1a1a1a;
        margin-bottom: 1rem;
    }

    .detail-location {
        color: #666666;
        font-size: 1.25rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 2rem;
    }

    .detail-info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
        padding: 2rem;
        background: #f5f5f5;
        border-radius: 12px;
    }

    .info-box {
        text-align: center;
    }

    .info-icon {
        font-size: 2rem;
        color: #1a1a1a;
        margin-bottom: 0.5rem;
    }

    .info-label {
        font-size: 0.9rem;
        color: #666666;
        margin-bottom: 0.25rem;
    }

    .info-value {
        font-size: 1.25rem;
        font-weight: 700;
        color: #1a1a1a;
    }

    .detail-description {
        color: #666666;
        line-height: 1.8;
        font-size: 1.1rem;
        margin-bottom: 2rem;
    }

    .booking-section {
        background: linear-gradient(135deg, #1a1a1a, #000000);
        color: white;
        padding: 2rem;
        border-radius: 12px;
        text-align: center;
    }

    .booking-price {
        font-size: 3rem;
        font-weight: 900;
        margin-bottom: 1rem;
    }

    .btn-booking-now {
        background: white;
        color: #000000;
        padding: 1rem 3rem;
        border-radius: 50px;
        font-weight: 700;
        font-size: 1.25rem;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        transition: all 0.3s ease;
    }

    .btn-booking-now:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(255,255,255,0.3);
        color: #000000;
    }

    .btn-back {
        background: #f5f5f5;
        color: #1a1a1a;
        padding: 0.75rem 1.5rem;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        margin-bottom: 2rem;
    }

    .btn-back:hover {
        background: #e0e0e0;
        color: #1a1a1a;
    }

    @media (max-width: 768px) {
        .detail-image {
            height: 300px;
        }

        .detail-title {
            font-size: 2rem;
        }

        .booking-price {
            font-size: 2rem;
        }
    }
</style>
@endsection

@section('content')
<div class="container detail-container">
    <!-- Back Button -->
    <a href="{{ route('katalog.index') }}" class="btn-back">
        <i class="fas fa-arrow-left"></i> Kembali ke Katalog
    </a>

    <!-- Image -->
    <div class="row">
        <div class="col-12">
            @if($paket->foto)
                <img src="{{ asset('uploads/paket_wisata/' . $paket->foto) }}" 
                     alt="{{ $paket->nama_paket }}" 
                     class="detail-image">
            @else
                <img src="https://via.placeholder.com/1200x500/e0e0e0/666666?text=No+Image" 
                     alt="No Image" 
                     class="detail-image">
            @endif
        </div>
    </div>

    <!-- Content -->
    <div class="detail-content">
        <h1 class="detail-title">{{ $paket->nama_paket }}</h1>
        
        <div class="detail-location">
            <i class="fas fa-map-marker-alt"></i>
            <span>{{ $paket->destinasi }}</span>
        </div>

        <!-- Info Grid -->
        <div class="detail-info-grid">
            <div class="info-box">
                <div class="info-icon"><i class="fas fa-tag"></i></div>
                <div class="info-label">Harga</div>
                <div class="info-value">Rp {{ number_format($paket->harga, 0, ',', '.') }}</div>
            </div>
            <div class="info-box">
                <div class="info-icon"><i class="fas fa-clock"></i></div>
                <div class="info-label">Durasi</div>
                <div class="info-value">{{ $paket->durasi }}</div>
            </div>
            <div class="info-box">
                <div class="info-icon"><i class="fas fa-map-marked-alt"></i></div>
                <div class="info-label">Destinasi</div>
                <div class="info-value">{{ $paket->destinasi }}</div>
            </div>
        </div>

        <!-- Description -->
        <h3 style="margin-bottom: 1rem; color: #1a1a1a;">Deskripsi Paket</h3>
        <p class="detail-description">{{ $paket->deskripsi }}</p>

        <!-- Booking Section -->
        <div class="booking-section">
            <h2>Tertarik dengan paket ini?</h2>
            <div class="booking-price">Rp {{ number_format($paket->harga, 0, ',', '.') }}</div>
            <p style="opacity: 0.9; margin-bottom: 2rem;">Harga per orang</p>
            <a href="{{ route('booking.create', $paket->id_paket) }}" class="btn-booking-now">
                <i class="fas fa-calendar-check"></i> Pesan Sekarang
            </a>
        </div>
    </div>
</div>
@endsection
