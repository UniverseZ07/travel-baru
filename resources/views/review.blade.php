@extends('layouts.master')

@section('title', 'Review Pengalaman Wisata')

@section('content')
<div class="py-5">
    <div class="container">

        {{-- HERO + RINGKASAN --}}
        <div class="row align-items-center mb-4">
            <div class="col-lg-8">
                <h1 class="fw-bold mb-2">Review Pengalaman Wisata</h1>
                <p class="text-muted mb-0">
                    Kumpulan cerita dan testimoni dari traveler yang sudah menjelajahi Indonesia bersama TravelIndo.
                </p>
            </div>
            <div class="col-lg-4 mt-3 mt-lg-0">
                <div class="d-flex align-items-center justify-content-lg-end gap-3">
                    <div>
                        <div class="d-flex align-items-center gap-2">
                            <span class="fs-4 fw-bold text-warning">4.8</span>
                            <div class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                        <small class="text-muted">Berdasarkan 120+ ulasan traveler</small>
                    </div>
                    <div class="vr d-none d-lg-block"></div>
                    <div class="text-end d-none d-lg-block">
                        <small class="text-muted">Destinasi favorit:</small>
                        <div class="fw-semibold">Bali • Raja Ampat • Yogyakarta</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- FILTER / TAG (STATIS) --}}
        <div class="mb-3">
            <span class="badge rounded-pill bg-dark me-2">Semua</span>
        </div>

        {{-- GRID REVIEW --}}
        <div class="row g-4">
            {{-- Card 1 --}}
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <span class="badge bg-light text-dark mb-2">Bali Premium Tour</span>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="rounded-circle bg-dark text-white d-flex align-items-center justify-content-center"
                                         style="width:32px;height:32px;font-size:0.8rem;">
                                        SJ
                                    </div>
                                    <div>
                                        <div class="fw-semibold">Sarah Johnson</div>
                                        <small class="text-muted">Oktober 2024 • Trip Keluarga</small>
                                    </div>
                                </div>
                            </div>
                            <div class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                        <p class="text-muted mb-2" style="font-size:0.9rem;">
                            Perjalanan sangat menyenangkan, guide ramah dan itinerary-nya rapi.
                            Hotel dan transport juga nyaman, anak-anak betah selama tour.
                        </p>
                        <small class="text-muted">Highlight: Tanah Lot, Ubud, Nusa Dua</small>
                    </div>
                </div>
            </div>

            {{-- Card 2 --}}
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <span class="badge bg-light text-dark mb-2">Raja Ampat Explorer</span>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="rounded-circle bg-dark text-white d-flex align-items-center justify-content-center"
                                         style="width:32px;height:32px;font-size:0.8rem;">
                                        MC
                                    </div>
                                    <div>
                                        <div class="fw-semibold">Michael Chen</div>
                                        <small class="text-muted">September 2024 • Couple Trip</small>
                                    </div>
                                </div>
                            </div>
                            <div class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                        <p class="text-muted mb-2" style="font-size:0.9rem;">
                            Spot snorkeling dan diving sangat bagus, air super jernih.
                            Tim TravelIndo selalu sigap bantu foto dan pastikan jadwal tepat waktu.
                        </p>
                        <small class="text-muted">Highlight: Pianemo, Pasir Timbul, Misool</small>
                    </div>
                </div>
            </div>

            {{-- Card 3 --}}
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <span class="badge bg-light text-dark mb-2">Yogyakarta Heritage</span>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="rounded-circle bg-dark text-white d-flex align-items-center justify-content-center"
                                         style="width:32px;height:32px;font-size:0.8rem;">
                                        PH
                                    </div>
                                    <div>
                                        <div class="fw-semibold">Putri Handayani</div>
                                        <small class="text-muted">November 2024 • Trip Keluarga</small>
                                    </div>
                                </div>
                            </div>
                            <div class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                        <p class="text-muted mb-2" style="font-size:0.9rem;">
                            Itinerary seimbang antara wisata budaya, kuliner, dan belanja.
                            Anak-anak senang ke Candi Borobudur dan naik jeep di Merapi.
                        </p>
                        <small class="text-muted">Highlight: Borobudur, Malioboro, Merapi Jeep</small>
                    </div>
                </div>
            </div>
        </div>

        {{-- CTA BAWAH --}}
        <div class="mt-5">
            <div class="card border-0 shadow-sm bg-dark text-white">
                <div class="card-body d-flex flex-column flex-md-row align-items-md-center justify-content-between">
                    <div class="mb-3 mb-md-0">
                        <h4 class="fw-bold mb-1">Siap bikin cerita liburan versi kamu?</h4>
                        <p class="mb-0 text-white-50">
                            Pilih paket wisata favoritmu dan biarkan tim TravelIndo menyiapkan semua detail perjalanan.
                        </p>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="/paket-wisata" class="btn btn-light fw-semibold px-4">
                            Lihat Paket Wisata
                        </a>
                        <a href="{{ route('destinasi.index') }}" class="btn btn-outline-light px-4">
                            Jelajahi Destinasi
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div> {{-- /.container --}}
</div> {{-- /.py-5 --}}
@endsection
