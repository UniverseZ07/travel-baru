@extends('layouts.master')

@section('title', 'Kelola Booking')

@section('css')
<style>
    .page-header {
        background: linear-gradient(135deg, #1a1a1a, #000000);
        color: white;
        padding: 2rem;
        border-radius: 16px;
        margin-bottom: 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .page-header h1 {
        font-size: 2rem;
        font-weight: 900;
        margin: 0;
    }

    .status-badge {
        padding: 0.5rem 1rem;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.875rem;
        display: inline-block;
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

    .btn-action {
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.875rem;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s ease;
    }

    .btn-confirm {
        background: #10b981;
        color: white;
    }

    .btn-confirm:hover {
        background: #059669;
        color: white;
    }

    .btn-cancel {
        background: #ef4444;
        color: white;
    }

    .btn-cancel:hover {
        background: #dc2626;
        color: white;
    }

    .btn-delete {
        background: #1a1a1a;
        color: white;
    }

    .btn-delete:hover {
        background: #000000;
        color: white;
    }

    .btn-back-admin {
        background: white;
        color: #1a1a1a;
        padding: 0.875rem 1.75rem;
        border-radius: 12px;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        border: 2px solid #e0e0e0;
    }

    .btn-back-admin:hover {
        border-color: #1a1a1a;
        transform: translateX(-4px);
        color: #1a1a1a;
    }

    @media (max-width: 768px) {
        .page-header {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>
@endsection

@section('content')
<div class="container mt-4">
    <div class="page-header">
        <div>
            <h1><i class="fas fa-clipboard-list"></i> Kelola Booking</h1>
            <p style="margin: 0.5rem 0 0 0; opacity: 0.9;">Kelola semua pemesanan dari pelanggan</p>
        </div>
        {{-- TOMBOL KEMBALI ADMIN --}}
        <a href="{{ route('paket.index') }}" class="btn-back-admin">
            <i class="fas fa-arrow-left"></i> Kembali ke Kelola Paket Wisata
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Pemesan</th>
                            <th>Paket Wisata</th>
                            <th>Tanggal</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                            <th>Pembayaran</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bookings as $index => $booking)
                        <tr>
                            <td>{{ $bookings->firstItem() + $index }}</td>
                            <td>
                                <strong>{{ $booking->nama_pemesan }}</strong><br>
                                <small class="text-muted">{{ $booking->email }}</small><br>
                                <small class="text-muted">{{ $booking->no_telp }}</small>
                            </td>
                            <td>
                                <strong>{{ $booking->nama_paket }}</strong><br>
                                <small class="text-muted">
                                    <i class="fas fa-map-marker-alt"></i> {{ $booking->destinasi }}
                                </small>
                            </td>
                            <td>{{ date('d M Y', strtotime($booking->tanggal_booking)) }}</td>
                            <td>{{ $booking->jumlah_orang }} orang</td>
                            <td><strong>Rp {{ number_format($booking->total_harga, 0, ',', '.') }}</strong></td>
                            <td>
                                @if($booking->bukti_pembayaran)
                                    <a href="{{ asset('uploads/bukti_qris/'.$booking->bukti_pembayaran) }}" target="_blank">
                                        Lihat Bukti
                                    </a><br>
                                    <small class="text-muted">{{ strtoupper($booking->metode_pembayaran ?? 'QRIS') }}</small>
                                @else
                                    <small class="text-muted">Belum ada bukti</small>
                                @endif
                            </td>
                            <td>
                                <span class="status-badge status-{{ $booking->status }}">
                                    @if($booking->status == 'pending')
                                        Menunggu
                                    @elseif($booking->status == 'confirmed')
                                        Dikonfirmasi
                                    @else
                                        Dibatalkan
                                    @endif
                                </span>
                            </td>
                            <td>
                                @if($booking->status == 'pending')
                                    <a href="{{ route('booking.confirm', $booking->id_booking) }}"
                                       class="btn-action btn-confirm"
                                       onclick="return confirm('Konfirmasi booking ini?')">
                                        <i class="fas fa-check"></i> Konfirmasi
                                    </a>
                                    <a href="{{ route('booking.cancel', $booking->id_booking) }}"
                                       class="btn-action btn-cancel"
                                       onclick="return confirm('Batalkan booking ini?')">
                                        <i class="fas fa-times"></i> Batalkan
                                    </a>
                                @endif
                                <a href="{{ route('booking.delete', $booking->id_booking) }}"
                                   class="btn-action btn-delete"
                                   onclick="return confirm('Hapus booking ini?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center py-4">
                                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                <p class="text-muted">Belum ada booking</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4 d-flex justify-content-center">
                {{ $bookings->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection
