@extends('layouts.master')

@section('title', 'Destinasi Populer')

@section('css')
<style>
    .page-header-destinasi {
        background: linear-gradient(135deg, #1a1a1a 0%, #000000 100%);
        color: white;
        padding: 4rem 0;
        margin-bottom: 3rem;
        text-align: center;
    }

    .page-header-destinasi h1 {
        font-size: 3rem;
        font-weight: 900;
        margin-bottom: 0.5rem;
    }

    .page-header-destinasi p {
        font-size: 1.2rem;
        opacity: 0.9;
    }

    .destinasi-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        height: 100%;
    }

    .destinasi-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 24px rgba(0,0,0,0.15);
    }

    .destinasi-image-wrapper {
        width: 100%;
        height: 280px;
        overflow: hidden;
        position: relative;
    }

    .destinasi-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .destinasi-card:hover .destinasi-image {
        transform: scale(1.1);
    }

    .destinasi-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
        padding: 2rem 1.5rem 1.5rem;
        color: white;
    }

    .destinasi-name {
        font-size: 1.75rem;
        font-weight: 900;
        margin: 0;
    }

    .destinasi-location {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-top: 0.5rem;
        font-size: 0.95rem;
        opacity: 0.9;
    }

    .destinasi-content {
        padding: 1.5rem;
    }

    .destinasi-description {
        color: #666666;
        line-height: 1.6;
        margin-bottom: 1.5rem;
    }

    .btn-explore {
        background: linear-gradient(135deg, #1a1a1a, #000000);
        color: white;
        padding: 0.75rem 2rem;
        border-radius: 50px;
        font-weight: 700;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        width: 100%;
        justify-content: center;
    }

    .btn-explore:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.25);
        color: white;
    }

    @media (max-width: 768px) {
        .page-header-destinasi h1 {
            font-size: 2rem;
        }

        .destinasi-image-wrapper {
            height: 220px;
        }
    }
</style>
@endsection

@section('content')
<div class="page-header-destinasi">
    <h1>Destinasi Populer</h1>
    <p>Jelajahi tempat-tempat menakjubkan di Indonesia</p>
</div>

<div class="container mb-5">
    <div class="row g-4">
        @foreach($destinasi as $item)
        <div class="col-lg-4 col-md-6">
            <div class="destinasi-card">
                <div class="destinasi-image-wrapper">
                    <img src="{{ asset('images/' . $item['gambar']) }}"
                         alt="{{ $item['nama'] }}"
                         class="destinasi-image">
                    <div class="destinasi-overlay">
                        <h3 class="destinasi-name">{{ $item['nama'] }}</h3>
                        <div class="destinasi-location">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>{{ $item['lokasi'] }}</span>
                        </div>
                    </div>
                </div>
                <div class="destinasi-content">
                    <p class="destinasi-description">{{ $item['deskripsi'] }}</p>
                    <a href="{{ route('paket.index') }}" class="btn-explore">
                        <i class="fas fa-compass"></i> Jelajahi Paket Wisata
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
