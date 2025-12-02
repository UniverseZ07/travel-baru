<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Booking - {{ $booking->nama_paket }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            padding: 2rem;
            background: #f5f5f5;
        }

        .print-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 3rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .header {
            text-align: center;
            border-bottom: 3px solid #1a1a1a;
            padding-bottom: 1.5rem;
            margin-bottom: 2rem;
        }

        .header h1 {
            font-size: 2rem;
            font-weight: 900;
            color: #1a1a1a;
            margin-bottom: 0.5rem;
        }

        .header p {
            color: #666666;
            font-size: 1rem;
        }

        .status-badge {
            display: inline-block;
            background: #d1fae5;
            color: #065f46;
            padding: 0.5rem 1.5rem;
            border-radius: 50px;
            font-weight: 700;
            margin: 1rem 0;
        }

        .info-section {
            margin-bottom: 2rem;
        }

        .info-section h2 {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 1rem;
            border-bottom: 2px solid #e0e0e0;
            padding-bottom: 0.5rem;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-top: 1rem;
        }

        .info-item {
            padding: 0.75rem;
            background: #f9f9f9;
            border-radius: 8px;
        }

        .info-label {
            font-size: 0.875rem;
            color: #666666;
            margin-bottom: 0.25rem;
        }

        .info-value {
            font-size: 1rem;
            font-weight: 600;
            color: #1a1a1a;
        }

        .total-section {
            background: #1a1a1a;
            color: white;
            padding: 1.5rem;
            border-radius: 12px;
            text-align: center;
            margin: 2rem 0;
        }

        .total-section h3 {
            font-size: 1rem;
            margin-bottom: 0.5rem;
            opacity: 0.9;
        }

        .total-section .amount {
            font-size: 2rem;
            font-weight: 900;
        }

        .qr-section {
            margin: 2rem 0;
            text-align: center;
        }

        .qr-section h3 {
            font-size: 1rem;
            margin-bottom: 0.5rem;
            color: #1a1a1a;
        }

        .qr-section p {
            font-size: 0.9rem;
            color: #666666;
            margin-bottom: 1rem;
        }

        .footer {
            text-align: center;
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 2px solid #e0e0e0;
            color: #666666;
            font-size: 0.875rem;
        }

        .btn-container {
            text-align: center;
            margin-top: 2rem;
        }

        .btn-print {
            background: #1a1a1a;
            color: white;
            padding: 0.875rem 2rem;
            border: none;
            border-radius: 8px;
            font-weight: 700;
            cursor: pointer;
            font-size: 1rem;
        }

        .btn-print:hover {
            background: #000000;
        }

        @media print {
            body {
                background: white;
                padding: 0;
            }

            .print-container {
                box-shadow: none;
                padding: 1rem;
            }

            .btn-container {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="print-container">
        <!-- Header -->
        <div class="header">
            <h1>🏝️ TravelIndo</h1>
            <p>Laporan Konfirmasi Booking</p>
            <div class="status-badge">
                ✅ Booking Dikonfirmasi
            </div>
        </div>

        <!-- Info Pemesan -->
        <div class="info-section">
            <h2>📋 Informasi Pemesan</h2>
            <div class="info-grid">
                <div class="info-item">
                    <div class="info-label">Nama Pemesan</div>
                    <div class="info-value">{{ $booking->nama_pemesan }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Email</div>
                    <div class="info-value">{{ $booking->email }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">No. Telepon</div>
                    <div class="info-value">{{ $booking->no_telp }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Tanggal Booking</div>
                    <div class="info-value">{{ date('d M Y', strtotime($booking->created_at)) }}</div>
                </div>
            </div>
        </div>

        <!-- Info Paket -->
        <div class="info-section">
            <h2>🧳 Detail Paket Wisata</h2>
            <div class="info-grid">
                <div class="info-item">
                    <div class="info-label">Nama Paket</div>
                    <div class="info-value">{{ $booking->nama_paket }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Destinasi</div>
                    <div class="info-value">{{ $booking->destinasi }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Durasi</div>
                    <div class="info-value">{{ $booking->durasi }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Tanggal Keberangkatan</div>
                    <div class="info-value">{{ date('d M Y', strtotime($booking->tanggal_booking)) }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Jumlah Orang</div>
                    <div class="info-value">{{ $booking->jumlah_orang }} orang</div>
                </div>
                @if($booking->catatan)
                <div class="info-item" style="grid-column: 1 / -1;">
                    <div class="info-label">Catatan</div>
                    <div class="info-value">{{ $booking->catatan }}</div>
                </div>
                @endif
            </div>
        </div>

        <!-- QR Laporan Booking -->
        <div class="qr-section">
            <h3>QR Laporan Booking</h3>
            <p>Scan QR ini untuk membuka laporan booking ini di perangkat lain.</p>
            {!! QrCode::size(200)->generate(route('booking.print', $booking->id_booking)) !!}
        </div>

        <!-- Total Pembayaran -->
        <div class="total-section">
            <h3>Total Pembayaran</h3>
            <div class="amount">Rp {{ number_format($booking->total_harga, 0, ',', '.') }}</div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p><strong>TravelIndo</strong> - Wujudkan Liburan Impian Anda</p>
            <p style="margin-top: 0.5rem;">Dokumen ini dicetak pada: {{ date('d F Y, H:i') }} WIB</p>
        </div>

        <!-- Tombol Print -->
        <div class="btn-container">
            <button onclick="window.print()" class="btn-print">
                🖨️ Cetak Dokumen
            </button>
        </div>
    </div>
</body>
</html>
