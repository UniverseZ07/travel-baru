@extends('layouts.master')

@section('title', 'Tentang TravelIndo')

@section('content')
<div class="py-5">
    <div class="container">

        {{-- HERO --}}
        <div class="row align-items-center mb-5">
            <div class="col-lg-7">
                <h1 class="fw-bold mb-3">Tentang TravelIndo</h1>
                <p class="text-muted mb-3">
                    TravelIndo adalah platform perjalanan yang berfokus pada paket wisata Nusantara
                    dengan pengalaman yang aman, nyaman, dan terjangkau untuk semua traveler.
                </p>
                <p class="text-muted mb-0">
                    Kami bekerja sama dengan partner lokal terpercaya di berbagai destinasi populer
                    untuk memastikan setiap perjalanan terasa personal dan berkesan.
                </p>
            </div>
            <div class="col-lg-5 mt-4 mt-lg-0">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="border rounded-3 p-3 text-center h-100">
                            <h3 class="fw-bold mb-0">50+</h3>
                            <small class="text-muted">Paket wisata aktif</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="border rounded-3 p-3 text-center h-100">
                            <h3 class="fw-bold mb-0">1.000+</h3>
                            <small class="text-muted">Traveler terlayani</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="border rounded-3 p-3 text-center h-100">
                            <h3 class="fw-bold mb-0">4.8/5</h3>
                            <small class="text-muted">Rata-rata ulasan</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="border rounded-3 p-3 text-center h-100">
                            <h3 class="fw-bold mb-0">20+</h3>
                            <small class="text-muted">Kota & destinasi</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- VISI MISI NILAI --}}
        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="h-100">
                    <h5 class="fw-bold mb-2">Visi</h5>
                    <p class="text-muted mb-0">
                        Menjadi penyedia layanan wisata domestik yang paling dipercaya di Indonesia,
                        dengan pengalaman perjalanan yang menyenangkan dan tanpa repot.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="h-100">
                    <h5 class="fw-bold mb-2">Misi</h5>
                    <p class="text-muted mb-0">
                        Memberikan paket perjalanan berkualitas dengan pelayanan profesional,
                        jadwal yang jelas, dan pilihan destinasi yang relevan untuk setiap tipe traveler.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="h-100">
                    <h5 class="fw-bold mb-2">Nilai</h5>
                    <p class="text-muted mb-0">
                        Keamanan, kenyamanan, transparansi, dan kepuasan pelanggan
                        menjadi prioritas utama dalam setiap perjalanan yang kami rancang.
                    </p>
                </div>
            </div>
        </div>

        {{-- KEUNGGULAN KAMI --}}
        <div class="mb-5">
            <h4 class="fw-bold mb-3">Mengapa memilih TravelIndo?</h4>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="border rounded-3 p-3 h-100">
                        <h6 class="fw-semibold mb-2"><i class="fas fa-map-marked-alt me-2"></i>Pemandu lokal berpengalaman</h6>
                        <p class="text-muted mb-0">
                            Setiap trip didampingi pemandu lokal yang memahami destinasi,
                            sehingga kamu bisa menikmati spot terbaik dengan cara yang tepat.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="border rounded-3 p-3 h-100">
                        <h6 class="fw-semibold mb-2"><i class="fas fa-hand-holding-usd me-2"></i>Harga transparan</h6>
                        <p class="text-muted mb-0">
                            Informasi harga dan fasilitas dijelaskan secara jelas di awal,
                            tanpa biaya tersembunyi selama perjalanan berlangsung.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="border rounded-3 p-3 h-100">
                        <h6 class="fw-semibold mb-2"><i class="fas fa-headset me-2"></i>Dukungan selama perjalanan</h6>
                        <p class="text-muted mb-0">
                            Tim support siap membantu jika ada perubahan jadwal,
                            kendala di lapangan, atau kebutuhan khusus saat trip.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- CTA KONTAK --}}
        <div class="mt-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body d-flex flex-column flex-md-row align-items-md-center justify-content-between">
                    <div class="mb-3 mb-md-0">
                        <h5 class="fw-bold mb-1">Punya rencana liburan ke Indonesia?</h5>
                        <p class="mb-0 text-muted">
                            Hubungi tim TravelIndo untuk konsultasi destinasi dan rekomendasi paket wisata yang paling cocok.
                        </p>
                    </div>
                    <div class="d-flex flex-column flex-sm-row gap-2">
                        <a href="/paket-wisata" class="btn btn-dark px-4">
                            Lihat Paket Wisata
                        </a>
                        <a href="mailto:info@travelindo.com" class="btn btn-outline-dark px-4">
                            Email Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
