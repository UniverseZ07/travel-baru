@extends('layouts.master')

@section('title', 'Katalog Paket Wisata')

@section('css')
<style>
    .page-header-katalog {
        background: linear-gradient(135deg, #1a1a1a 0%, #000000 100%);
        color: white;
        padding: 4rem 0;
        margin-bottom: 3rem;
        text-align: center;
    }

    .page-header-katalog h1 {
        font-size: 3rem;
        font-weight: 900;
        margin-bottom: 1rem;
    }

    .page-header-katalog p {
        font-size: 1.25rem;
        opacity: 0.9;
    }

    .search-box-katalog {
        background: white;
        border: 2px solid #e0e0e0;
        border-radius: 12px;
        padding: 0.75rem 1.25rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        max-width: 500px;
        margin: 0 auto 3rem;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .search-box-katalog input {
        border: none;
        outline: none;
        flex: 1;
        font-size: 1rem;
    }

    .search-box-katalog button {
        background: #1a1a1a;
        color: white;
        border: none;
        padding: 0.625rem 1.5rem;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .search-box-katalog button:hover {
        background: #000000;
    }

    .paket-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .paket-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 24px rgba(0,0,0,0.15);
    }

    .paket-image {
        width: 100%;
        height: 250px;
        object-fit: cover;
    }

    .paket-badge {
        position: absolute;
        top: 1rem;
        right: 1rem;
        background: linear-gradient(135deg, #1a1a1a, #000000);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.9rem;
        box-shadow: 0 4px 12px rgba(0,0,0,0.3);
    }

    .paket-content {
        padding: 1.5rem;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .paket-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1a1a1a;
        margin-bottom: 0.5rem;
    }

    .paket-location {
        color: #666666;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 1rem;
    }

    .paket-description {
        color: #666666;
        line-height: 1.6;
        margin-bottom: 1rem;
        flex: 1;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .paket-info {
        display: flex;
        gap: 1rem;
        margin-bottom: 1rem;
        padding-top: 1rem;
        border-top: 1px solid #e0e0e0;
    }

    .info-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: #666666;
        font-size: 0.9rem;
    }

    .paket-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 1.5rem;
        background: #f5f5f5;
        border-top: 1px solid #e0e0e0;
    }

    .price-tag {
        font-size: 1.75rem;
        font-weight: 800;
        color: #1a1a1a;
    }

    .btn-booking {
        background: linear-gradient(135deg, #1a1a1a, #000000);
        color: white;
        padding: 0.75rem 2rem;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-booking:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.25);
        color: white;
    }

    .alert-katalog {
        border: none;
        border-radius: 12px;
        padding: 1rem 1.5rem;
        margin-bottom: 2rem;
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

    @media (max-width: 768px) {
        .page-header-katalog h1 {
            font-size: 2rem;
        }

        .paket-image {
            height: 200px;
        }

        .search-box-katalog {
            max-width: 100%;
        }
    }
</style>
@endsection

@section('content')
<!-- Page Header -->
<div class="page-header-katalog">
    <h1><i class="fas fa-suitcase"></i> Katalog Paket Wisata</h1>
    <p>Temukan paket wisata impian Anda</p>
</div>

<div class="container">
    <!-- Alert Success -->
    @if(session('success'))
    <div class="alert alert-success alert-katalog">
        <i class="fas fa-check-circle"></i>
        <span>{{ session('success') }}</span>
    </div>
    @endif

    <!-- Search Box -->
    <form action="{{ route('katalog.index') }}" method="GET">
        <div class="search-box-katalog">
            <i class="fas fa-search" style="color: #666666;"></i>
            <input 
                type="text" 
                name="search" 
                placeholder="Cari destinasi atau paket wisata..." 
                value="{{ request('search') }}"
                autocomplete="off">
            <button type="submit">
                <i class="fas fa-search"></i> Cari
            </button>
        </div>
    </form>

    <!-- Paket Grid -->
    <div class="row g-4">
        @forelse($paket_wisata as $paket)
        <div class="col-lg-4 col-md-6">
            <div class="paket-card">
                <!-- Image -->
                <div style="position: relative;">
                    @if($paket->foto)
                        <img src="{{ asset('uploads/paket_wisata/' . $paket->foto) }}" 
                             alt="{{ $paket->nama_paket }}" 
                             class="paket-image">
                    @else
                        <img src="https://via.placeholder.com/400x250/e0e0e0/666666?text=No+Image" 
                             alt="No Image" 
                             class="paket-image">
                    @endif
                    <div class="paket-badge">
                        <i class="fas fa-tag"></i> Rp {{ number_format($paket->harga, 0, ',', '.') }}
                    </div>
                </div>

                <!-- Content -->
                <div class="paket-content">
                    <h3 class="paket-title">{{ $paket->nama_paket }}</h3>
                    
                    <div class="paket-location">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>{{ $paket->destinasi }}</span>
                    </div>

                    <p class="paket-description">{{ $paket->deskripsi }}</p>

                    <div class="paket-info">
                        <div class="info-item">
                            <i class="fas fa-clock"></i>
                            <span>{{ $paket->durasi }}</span>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="paket-footer">
                    <div class="price-tag">Rp {{ number_format($paket->harga, 0, ',', '.') }}</div>
                    <a href="{{ route('paket.detail', $paket->id_paket) }}" class="btn-booking">
                        <i class="fas fa-info-circle"></i> Detail
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-warning alert-katalog">
                <i class="fas fa-info-circle"></i>
                <span>Belum ada paket wisata tersedia.</span>
            </div>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-5">
        {{ $paket_wisata->links('vendor.pagination.custom') }}
    </div>
</div>
@endsection
