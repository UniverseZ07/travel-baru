@extends('layouts.master')

@section('title', 'Daftar Paket Wisata')

@section('css')
<style>
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .page-title {
        font-size: 2rem;
        font-weight: 800;
        color: #1a1a1a;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .page-title i {
        color: #666666;
    }

    .btn-add-modern {
        background: linear-gradient(135deg, #1a1a1a, #000000);
        color: white;
        padding: 0.875rem 1.75rem;
        border-radius: 12px;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .btn-add-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
        color: white;
    }

    .btn-booking-modern {
        background: linear-gradient(135deg, #1a1a1a, #000000);
        color: white;
        padding: 0.875rem 1.75rem;
        border-radius: 12px;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }

    .btn-booking-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
        color: white;
    }

    .btn-booking-admin {
        background: linear-gradient(135deg, #1a1a1a, #000000);
        color: white;
        padding: 0.875rem 1.75rem;
        border-radius: 12px;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }

    .btn-booking-admin:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
        color: white;
    }

    .search-box-modern {
        background: white;
        border: 2px solid #e0e0e0;
        border-radius: 12px;
        padding: 0.75rem 1.25rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        max-width: 400px;
        margin-bottom: 2rem;
        transition: all 0.3s ease;
    }

    .search-box-modern:focus-within {
        border-color: #1a1a1a;
        box-shadow: 0 0 0 4px rgba(26, 26, 26, 0.1);
    }

    .search-box-modern input {
        border: none;
        outline: none;
        flex: 1;
        font-size: 0.95rem;
        background: transparent;
    }

    .search-box-modern button {
        background: #1a1a1a;
        color: white;
        border: none;
        padding: 0.5rem 1.25rem;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .search-box-modern button:hover {
        background: #000000;
        transform: translateX(2px);
    }

    .card-modern {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .card-modern:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
    }

    /* IMAGE SECTION */
    .card-image-wrapper {
        width: 100%;
        height: 220px;
        overflow: hidden;
        position: relative;
        background: #f0f0f0;
    }

    .card-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .card-modern:hover .card-image {
        transform: scale(1.1);
    }

    .price-badge {
        position: absolute;
        top: 1rem;
        right: 1rem;
        background: linear-gradient(135deg, #1a1a1a, #000000);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.9rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }

    .card-header-modern {
        padding: 1.5rem;
        border-bottom: 1px solid #f0f0f0;
    }

    .card-title-modern {
        font-size: 1.25rem;
        font-weight: 700;
        color: #1a1a1a;
        margin: 0;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 60px;
    }

    .card-body-modern {
        padding: 1.5rem;
        flex: 1;
    }

    .card-info {
        display: flex;
        flex-direction: column;
        gap: 0.875rem;
    }

    .info-row {
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
    }

    .info-icon {
        color: #666666;
        font-size: 1rem;
        min-width: 20px;
        margin-top: 2px;
    }

    .info-content {
        flex: 1;
    }

    .info-label {
        font-size: 0.8rem;
        color: #666666;
        margin-bottom: 0.25rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .info-value {
        font-size: 0.95rem;
        color: #1a1a1a;
        font-weight: 600;
    }

    .description-text {
        color: #666666;
        line-height: 1.6;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        font-size: 0.9rem;
    }

    .card-footer-modern {
        padding: 1.5rem;
        border-top: 1px solid #f0f0f0;
        display: flex;
        gap: 0.75rem;
        background: #fafafa;
    }

    .btn-modern {
        flex: 1;
        padding: 0.75rem;
        border-radius: 10px;
        font-weight: 600;
        font-size: 0.9rem;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .btn-edit {
        background: #f0f0f0;
        color: #1a1a1a;
    }

    .btn-edit:hover {
        background: #e0e0e0;
        transform: translateY(-2px);
        color: #1a1a1a;
    }

    .btn-delete {
        background: #1a1a1a;
        color: white;
    }

    .btn-delete:hover {
        background: #000000;
        transform: translateY(-2px);
        color: white;
    }

    .btn-book {
        background: linear-gradient(135deg, #1a1a1a, #000000);
        color: white;
    }

    .btn-book:hover {
        background: linear-gradient(135deg, #000000, #1a1a1a);
        transform: translateY(-2px);
        color: white;
    }

    .alert-modern {
        border: none;
        border-radius: 12px;
        padding: 1rem 1.5rem;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .alert-success {
        background: #d1fae5;
        color: #065f46;
    }

    .alert-warning {
        background: #fef3c7;
        color: #92400e;
    }

    .alert-danger {
        background: #fee2e2;
        color: #991b1b;
    }

    /* ===== MODERN PAGINATION STYLES ===== */
    .pagination-wrapper {
        margin-top: 3rem;
        padding-top: 2rem;
        border-top: 1px solid #e0e0e0;
    }

    .pagination-info {
        text-align: center;
        margin-bottom: 1.5rem;
    }

    .pagination-text {
        color: #666666;
        font-size: 0.95rem;
        margin: 0;
    }

    .pagination-text .font-weight-bold {
        font-weight: 700;
        color: #1a1a1a;
    }

    .pagination-modern {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 0.5rem;
        list-style: none;
        padding: 0;
        margin: 0;
        flex-wrap: wrap;
    }

    .page-item {
        display: inline-block;
    }

    .page-link {
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 42px;
        height: 42px;
        padding: 0 1rem;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        background: white;
        color: #1a1a1a;
        font-weight: 600;
        font-size: 0.95rem;
        text-decoration: none;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .page-link:hover {
        border-color: #1a1a1a;
        background: #1a1a1a;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .page-link i {
        font-size: 0.85rem;
    }

    .page-number {
        min-width: 42px;
        padding: 0;
    }

    .page-item.active .page-link {
        background: linear-gradient(135deg, #1a1a1a, #000000);
        border-color: #1a1a1a;
        color: white;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        cursor: default;
        pointer-events: none;
    }

    .page-item.disabled .page-link {
        background: #f5f5f5;
        border-color: #e0e0e0;
        color: #cccccc;
        cursor: not-allowed;
        pointer-events: none;
    }

    .page-item.disabled .page-link:hover {
        transform: none;
        box-shadow: none;
    }

    .page-dots {
        border: none;
        background: transparent;
        color: #cccccc;
        cursor: default;
        pointer-events: none;
    }

    .page-prev,
    .page-next {
        gap: 0.5rem;
        padding: 0 1.25rem;
    }

    @media (max-width: 768px) {
        .page-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .page-title {
            font-size: 1.5rem;
        }

        .search-box-modern {
            max-width: 100%;
        }

        .card-image-wrapper {
            height: 180px;
        }

        .pagination-modern {
            gap: 0.35rem;
        }

        .page-link {
            min-width: 38px;
            height: 38px;
            font-size: 0.9rem;
        }

        .page-prev,
        .page-next {
            padding: 0 1rem;
        }
    }
</style>
@endsection

@section('content')
<!-- Page Header -->
<div class="page-header">
    <h1 class="page-title">
        <i class="fas fa-suitcase"></i> 
        @if($isAdmin)
            Kelola Paket Wisata
        @else
            Paket Wisata Tersedia
        @endif
    </h1>
    
    @if($isAdmin)
        <!-- Tombol untuk Admin -->
        <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
            <a href="/paket-wisata/tambah" class="btn-add-modern">
                <i class="fas fa-plus"></i> Tambah Paket
            </a>
            <a href="{{ route('booking.index') }}" class="btn-booking-admin">
                <i class="fas fa-clipboard-list"></i> Kelola Booking
            </a>
        </div>
    @else
        <!-- Tombol My Bookings untuk User -->
        <a href="{{ route('booking.my') }}" class="btn-booking-modern">
            <i class="fas fa-list"></i> My Bookings
        </a>
    @endif
</div>

<!-- Alert Success -->
@if(session('success'))
<div class="alert alert-success alert-modern">
    <i class="fas fa-check-circle"></i>
    <span>{{ session('success') }}</span>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-modern">
    <i class="fas fa-exclamation-circle"></i>
    <span>{{ session('error') }}</span>
</div>
@endif

<!-- Search Box - Hanya untuk Admin -->
@if($isAdmin)
<form action="/paket-wisata/cari" method="GET">
    <div class="search-box-modern">
        <i class="fas fa-search info-icon"></i>
        <input 
            type="text" 
            name="cari" 
            placeholder="Cari paket wisata..." 
            value="{{ request('cari') }}"
            autocomplete="off">
        <button type="submit">
            <i class="fas fa-search"></i> Cari
        </button>
    </div>
</form>
@endif

<!-- Card Grid -->
<div class="row g-4">
    @forelse($paket_wisata as $paket)
    <div class="col-lg-4 col-md-6">
        <div class="card-modern">
            <!-- Card Image -->
            <div class="card-image-wrapper">
                @if($paket->foto)
                    <img src="{{ asset('uploads/paket_wisata/' . $paket->foto) }}" 
                         alt="{{ $paket->nama_paket }}" 
                         class="card-image">
                @else
                    <img src="https://via.placeholder.com/400x250/e0e0e0/666666?text=No+Image" 
                         alt="No Image" 
                         class="card-image">
                @endif
                <div class="price-badge">
                    <i class="fas fa-tag"></i> Rp {{ number_format($paket->harga, 0, ',', '.') }}
                </div>
            </div>

            <!-- Card Header -->
            <div class="card-header-modern">
                <h3 class="card-title-modern">{{ $paket->nama_paket }}</h3>
            </div>

            <!-- Card Body -->
            <div class="card-body-modern">
                <div class="card-info">
                    <!-- Destinasi -->
                    <div class="info-row">
                        <i class="fas fa-map-marker-alt info-icon"></i>
                        <div class="info-content">
                            <div class="info-label">Destinasi</div>
                            <div class="info-value">{{ $paket->destinasi }}</div>
                        </div>
                    </div>

                    <!-- Duration -->
                    <div class="info-row">
                        <i class="fas fa-clock info-icon"></i>
                        <div class="info-content">
                            <div class="info-label">Durasi</div>
                            <div class="info-value">{{ $paket->durasi }}</div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="info-row">
                        <i class="fas fa-align-left info-icon"></i>
                        <div class="info-content">
                            <div class="info-label">Deskripsi</div>
                            <p class="description-text">{{ $paket->deskripsi }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Footer -->
            <div class="card-footer-modern">
                @if($isAdmin)
                    <!-- Tombol Admin: Edit & Hapus -->
                    <a href="/paket-wisata/edit/{{ $paket->id_paket }}" class="btn-modern btn-edit">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="/paket-wisata/hapus/{{ $paket->id_paket }}" 
                       class="btn-modern btn-delete"
                       onclick="return confirm('Yakin ingin menghapus paket {{ $paket->nama_paket }}?')">
                        <i class="fas fa-trash"></i> Hapus
                    </a>
                @else
                    <!-- Tombol User: Booking -->
                    <a href="{{ route('booking.create', $paket->id_paket) }}" class="btn-modern btn-book">
                        <i class="fas fa-calendar-check"></i> Booking Sekarang
                    </a>
                @endif
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="alert alert-warning alert-modern">
            <i class="fas fa-info-circle"></i>
            <span>
                @if(request('cari'))
                    Tidak ada hasil pencarian untuk "{{ request('cari') }}"
                @else
                    Belum ada paket wisata tersedia.
                @endif
            </span>
        </div>
    </div>
    @endforelse
</div>

<!-- Pagination -->
<div class="pagination-wrapper">
    <div class="pagination-info">
        <p class="pagination-text">
            Menampilkan
            <span class="font-weight-bold">{{ $paket_wisata->firstItem() }}</span>
            -
            <span class="font-weight-bold">{{ $paket_wisata->lastItem() }}</span>
            dari
            <span class="font-weight-bold">{{ $paket_wisata->total() }}</span>
            paket wisata
        </p>
    </div>

    <div class="d-flex justify-content-center">
        {{ $paket_wisata->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection

