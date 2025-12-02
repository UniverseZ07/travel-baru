@extends('layouts.master')

@section('title', 'My Bookings')

@section('css')
<style>
    .page-header-bookings {
        background: linear-gradient(135deg, #1a1a1a 0%, #000000 100%);
        color: white;
        padding: 3rem 0;
        margin-bottom: 3rem;
        text-align: center;
    }

    .page-header-bookings h1 {
        font-size: 2.5rem;
        font-weight: 900;
        margin-bottom: 0.5rem;
    }

    .booking-card {
        background: white;
        border-radius: 16px;
        padding: 2rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
    }

    .booking-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }

    .booking-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid #e0e0e0;
    }

    .booking-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1a1a1a;
    }

    .booking-status {
        padding: 0.5rem 1rem;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.9rem;
    }

    .status-pending {
        background: #fef3c7;
        color: #92400e;
    }

    .status-confirmed {
        background: #d1fae5;
        color: #065f46;
    }

    .status-cancelled {
        background: #fee2e2;
        color: #991b1b;
    }

    .booking-info {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
    }

    .info-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        color: #666666;
    }

    .info-item i {
        font-size: 1.25rem;
        color: #1a1a1a;
    }

    .info-item strong {
        color: #1a1a1a;
    }

    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
    }

    .empty-state i {
        font-size: 5rem;
        color: #e0e0e0;
        margin-bottom: 1rem;
    }

    .empty-state h3 {
        color: #666666;
        margin-bottom: 1rem;
    }

    .btn-browse {
        background: linear-gradient(135deg, #1a1a1a, #000000);
        color: white;
        padding: 0.75rem 2rem;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
    }

    .btn-browse:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.25);
        color: white;
    }

    .btn-print {
        background: linear-gradient(135deg, #1a1a1a, #000000);
        color: white;
        padding: 0.875rem 2rem;
        border-radius: 50px;
        font-weight: 700;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .btn-print:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
        color: white;
    }

    .btn-back-user {
        background: white;
        color: #1a1a1a;
        padding: 0.875rem 2rem;
        border-radius: 50px;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        box-shadow: 0 4px 12px rgba(255, 255, 255, 0.2);
        border: 2px solid rgba(255, 255, 255, 0.3);
    }

    .btn-back-user:hover {
        background: rgba(255, 255, 255, 0.9);
        transform: translateX(-4px);
        color: #1a1a1a;
    }

    @media (max-width: 768px) {
        .page-header-bookings h1 {
            font-size: 2rem;
        }

        .booking-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }
    }
</style>
@endsection

@section('content')
<div class="page-header-bookings">
    <h1><i class="fas fa-list-alt"></i> My Bookings</h1>
    <p>Riwayat pemesanan paket wisata Anda</p>
    {{-- TOMBOL KEMBALI USER --}}
    <div style="margin-top: 1.5rem;">
        <a href="{{ route('paket.index') }}" class="btn-back-user">
            <i class="fas fa-arrow-left"></i> Kembali Booking
        </a>
    </div>
</div>

<div class="container">
    @if(session('success'))
    <div class="alert alert-success" style="border-radius: 12px; margin-bottom: 2rem;">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger" style="border-radius: 12px; margin-bottom: 2rem;">
        <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
    </div>
    @endif

    @forelse($bookings as $booking)
    <div class="booking-card">
        <div class="booking-header">
            <h3 class="booking-title">{{ $booking->nama_paket }}</h3>
            <span class="booking-status status-{{ $booking->status }}">
                @if($booking->status == 'pending')
                    <i class="fas fa-clock"></i> Menunggu Konfirmasi
                @elseif($booking->status == 'confirmed')
                    <i class="fas fa-check-circle"></i> Dikonfirmasi
                @else
                    <i class="fas fa-times-circle"></i> Dibatalkan
                @endif
            </span>
        </div>

        <div class="booking-info">
            <div class="info-item">
                <i class="fas fa-map-marker-alt"></i>
                <div>
                    <small style="color: #999;">Destinasi</small><br>
                    <strong>{{ $booking->destinasi }}</strong>
                </div>
            </div>
            <div class="info-item">
                <i class="fas fa-calendar"></i>
                <div>
                    <small style="color: #999;">Tanggal Keberangkatan</small><br>
                    <strong>{{ date('d M Y', strtotime($booking->tanggal_booking)) }}</strong>
                </div>
            </div>
            <div class="info-item">
                <i class="fas fa-users"></i>
                <div>
                    <small style="color: #999;">Jumlah Orang</small><br>
                    <strong>{{ $booking->jumlah_orang }} orang</strong>
                </div>
            </div>
            <div class="info-item">
                <i class="fas fa-money-bill-wave"></i>
                <div>
                    <small style="color: #999;">Total Harga</small><br>
                    <strong>Rp {{ number_format($booking->total_harga, 0, ',', '.') }}</strong>
                </div>
            </div>
        </div>

        @if($booking->catatan)
        <div style="margin-top: 1rem; padding-top: 1rem; border-top: 1px solid #e0e0e0;">
            <small style="color: #999;">Catatan:</small><br>
            <p style="color: #666666; margin-top: 0.5rem;">{{ $booking->catatan }}</p>
        </div>
        @endif

        {{-- TOMBOL CETAK LAPORAN - HANYA MUNCUL JIKA STATUS = CONFIRMED --}}
        @if($booking->status == 'confirmed')
        <div style="margin-top: 1.5rem; padding-top: 1.5rem; border-top: 1px solid #e0e0e0; text-align: center;">
            <a href="{{ route('booking.print', $booking->id_booking) }}" 
               target="_blank"
               class="btn-print">
                <i class="fas fa-print"></i> Cetak Laporan Booking
            </a>
        </div>
        @endif
    </div>
    @empty
    <div class="empty-state">
        <i class="fas fa-calendar-times"></i>
        <h3>Belum ada booking</h3>
        <p style="color: #999; margin-bottom: 2rem;">Anda belum melakukan pemesanan paket wisata</p>
        <a href="{{ route('paket.index') }}" class="btn-browse">
            <i class="fas fa-compass"></i> Jelajahi Paket Wisata
        </a>
    </div>
    @endforelse

    @if($bookings->hasPages())
    <div class="mt-4 d-flex justify-content-center">
        {{ $bookings->links('pagination::bootstrap-5') }}
    </div>
    @endif
</div>
@endsection
