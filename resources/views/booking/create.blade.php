@extends('layouts.master')

@section('title', 'Booking - ' . $paket->nama_paket)

@section('css')
<style>
    .booking-container {
        max-width: 800px;
        margin: 2rem auto;
    }

    .booking-header {
        background: linear-gradient(135deg, #1a1a1a, #000000);
        color: white;
        padding: 2rem;
        border-radius: 12px 12px 0 0;
        text-align: center;
    }

    .booking-header h1 {
        font-size: 2rem;
        font-weight: 900;
        margin-bottom: 0.5rem;
    }

    .booking-form {
        background: white;
        padding: 2rem;
        border-radius: 0 0 12px 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }

    .paket-summary {
        background: #f5f5f5;
        padding: 1.5rem;
        border-radius: 12px;
        margin-bottom: 2rem;
    }

    .summary-item {
        display: flex;
        justify-content: space-between;
        margin-bottom: 0.75rem;
        color: #666666;
    }

    .summary-item strong {
        color: #1a1a1a;
    }

    .summary-total {
        display: flex;
        justify-content: space-between;
        padding-top: 1rem;
        margin-top: 1rem;
        border-top: 2px solid #e0e0e0;
        font-size: 1.5rem;
        font-weight: 900;
        color: #1a1a1a;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        font-weight: 600;
        color: #1a1a1a;
        margin-bottom: 0.5rem;
        display: block;
    }

    .form-control {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        outline: none;
        border-color: #1a1a1a;
        box-shadow: 0 0 0 4px rgba(26, 26, 26, 0.1);
    }

    .btn-submit {
        background: linear-gradient(135deg, #1a1a1a, #000000);
        color: white;
        padding: 1rem 2rem;
        border: none;
        border-radius: 50px;
        font-weight: 700;
        font-size: 1.1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.25);
    }

    .btn-cancel {
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

    .btn-cancel:hover {
        background: #e0e0e0;
        color: #1a1a1a;
    }

    .invalid-feedback {
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: 0.5rem;
        display: block;
    }

    .is-invalid {
        border-color: #dc3545 !important;
    }
</style>
@endsection

@section('content')
<div class="container booking-container">
    <a href="{{ route('paket.index') }}" class="btn-cancel">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>

    <div class="booking-header">
        <h1><i class="fas fa-calendar-check"></i> Form Booking</h1>
        <p>{{ $paket->nama_paket }}</p>
    </div>

    <div class="booking-form">
        <div class="paket-summary">
            <h4 style="margin-bottom: 1rem; color: #1a1a1a;">Ringkasan Paket</h4>
            <div class="summary-item">
                <span>Nama Paket:</span>
                <strong>{{ $paket->nama_paket }}</strong>
            </div>
            <div class="summary-item">
                <span>Destinasi:</span>
                <strong>{{ $paket->destinasi }}</strong>
            </div>
            <div class="summary-item">
                <span>Durasi:</span>
                <strong>{{ $paket->durasi }}</strong>
            </div>
            <div class="summary-item">
                <span>Harga per Orang:</span>
                <strong>Rp {{ number_format($paket->harga, 0, ',', '.') }}</strong>
            </div>
            <div class="summary-total" id="totalPrice">
                <span>Total:</span>
                <span>Rp {{ number_format($paket->harga, 0, ',', '.') }}</span>
            </div>
        </div>

        <form action="{{ route('booking.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id_paket" value="{{ $paket->id_paket }}">

            <div class="form-group">
                <label class="form-label">Nama Lengkap <span style="color: red;">*</span></label>
                <input type="text"
                       name="nama_pemesan"
                       class="form-control @error('nama_pemesan') is-invalid @enderror"
                       value="{{ old('nama_pemesan', Auth::user()->name) }}"
                       required>
                @error('nama_pemesan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">Email <span style="color: red;">*</span></label>
                <input type="email"
                       name="email"
                       class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email', Auth::user()->email) }}"
                       required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">Nomor Telepon <span style="color: red;">*</span></label>
                <input type="text"
                       name="no_telp"
                       class="form-control @error('no_telp') is-invalid @enderror"
                       value="{{ old('no_telp') }}"
                       placeholder="08xxxxxxxxxx"
                       required>
                @error('no_telp')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">Tanggal Keberangkatan <span style="color: red;">*</span></label>
                <input type="date"
                       name="tanggal_booking"
                       class="form-control @error('tanggal_booking') is-invalid @enderror"
                       value="{{ old('tanggal_booking') }}"
                       min="{{ date('Y-m-d') }}"
                       required>
                @error('tanggal_booking')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">Jumlah Orang <span style="color: red;">*</span></label>
                <input type="number"
                       name="jumlah_orang"
                       class="form-control @error('jumlah_orang') is-invalid @enderror"
                       value="{{ old('jumlah_orang', 1) }}"
                       min="1"
                       id="jumlahOrang"
                       required>
                @error('jumlah_orang')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">Catatan Tambahan</label>
                <textarea name="catatan"
                          class="form-control"
                          rows="4"
                          placeholder="Permintaan khusus, alergi makanan, dll...">{{ old('catatan') }}</textarea>
            </div>

            {{-- QRIS statis --}}
            <div class="form-group" style="text-align: center; margin-bottom: 2rem;">
                <label class="form-label">Scan QRIS untuk Pembayaran</label>
                <div>
                    <img src="{{ asset('images/qris.jpg') }}" alt="QRIS TravelIndo"
                         style="max-width: 250px; width: 100%; border-radius: 12px; border: 4px solid #f5f5f5;">
                </div>
                <small class="text-muted d-block" style="margin-top: 0.5rem;">
                    Setelah pembayaran, upload screenshot bukti pembayaran QRIS di bawah ini.
                </small>
            </div>

            <div class="form-group">
                <label class="form-label">Upload Bukti Pembayaran QRIS <span style="color: red;">*</span></label>
                <input type="file"
                       name="bukti_pembayaran"
                       class="form-control @error('bukti_pembayaran') is-invalid @enderror"
                       accept="image/*"
                       required>
                @error('bukti_pembayaran')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="text-muted">
                    Upload screenshot bukti pembayaran QRIS (format JPG/PNG, maksimal 2 MB).
                </small>
            </div>

            <button type="submit" class="btn-submit">
                <i class="fas fa-check-circle"></i> Konfirmasi Booking
            </button>
        </form>
    </div>
</div>

<script>
    const hargaPerOrang = {{ $paket->harga }};
    const jumlahOrangInput = document.getElementById('jumlahOrang');
    const totalPriceElement = document.getElementById('totalPrice');

    jumlahOrangInput.addEventListener('input', function() {
        const jumlah = parseInt(this.value) || 1;
        const total = hargaPerOrang * jumlah;

        totalPriceElement.innerHTML = `
            <span>Total (${jumlah} orang):</span>
            <span>Rp ${total.toLocaleString('id-ID')}</span>
        `;
    });
</script>
@endsection
