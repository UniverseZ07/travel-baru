<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Paket Wisata</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .header {
            text-align: center;
            border-bottom: 3px solid #333;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .header h1 {
            margin: 5px 0;
            color: #333;
        }
        .header p {
            margin: 3px 0;
            color: #666;
        }
        .info-cetak {
            text-align: right;
            margin-bottom: 20px;
            font-size: 12px;
            color: #666;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #333;
        }
        th {
            background-color: #667eea;
            color: white;
            padding: 12px;
            text-align: left;
            font-weight: bold;
        }
        td {
            padding: 10px;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .footer {
            margin-top: 40px;
            text-align: right;
        }
        .signature {
            margin-top: 60px;
            text-align: right;
            margin-right: 50px;
        }
        .foto-paket {
            max-width: 80px;
            max-height: 60px;
            object-fit: cover;
            border-radius: 5px;
        }
        @media print {
            .no-print {
                display: none;
            }
            body {
                margin: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Header Laporan -->
    <div class="header">
        <h1>TRAVEL INDONESIA</h1>
        <p>Jl. Raya Wisata No. 123, Jakarta Selatan</p>
        <p>Telp: (021) 1234-5678 | Email: info@travelindonesia.com</p>
        <p>Website: www.travelindonesia.com</p>
    </div>

    <h2 style="text-align: center; margin-bottom: 5px;">LAPORAN DATA PAKET WISATA</h2>
    
    <div class="info-cetak">
        <p>Dicetak pada: <?php echo date('l, d F Y | H:i:s'); ?> WIB</p>
        <p>Dicetak oleh: {{ Auth::user()->name }}</p>
    </div>

    <!-- Tombol Print -->
    <div class="no-print" style="margin-bottom: 20px;">
        <button onclick="window.print()" style="padding: 10px 20px; background-color: #667eea; color: white; border: none; border-radius: 5px; cursor: pointer;">
            <i class="fas fa-print"></i> Cetak Laporan
        </button>
        <button onclick="window.close()" style="padding: 10px 20px; background-color: #6c757d; color: white; border: none; border-radius: 5px; cursor: pointer; margin-left: 10px;">
            Tutup
        </button>
    </div>

    <!-- Table Laporan -->
    <table>
        <thead>
            <tr>
                <th width="5%" class="text-center">No</th>
                <th width="12%" class="text-center">Foto</th>
                <th width="23%">Nama Paket</th>
                <th width="18%">Destinasi</th>
                <th width="15%" class="text-right">Harga</th>
                <th width="12%" class="text-center">Durasi</th>
                <th width="15%">Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @forelse($paket_wisata as $paket)
            <tr>
                <td class="text-center">{{ $no++ }}</td>
                <td class="text-center">
                    @if($paket->foto)
                        <img src="{{ public_path('uploads/paket_wisata/'.$paket->foto) }}" 
                             alt="{{ $paket->nama_paket }}" 
                             class="foto-paket">
                    @else
                        <small>No Image</small>
                    @endif
                </td>
                <td><strong>{{ $paket->nama_paket }}</strong></td>
                <td>{{ $paket->destinasi }}</td>
                <td class="text-right"><strong>Rp {{ number_format($paket->harga, 0, ',', '.') }}</strong></td>
                <td class="text-center">{{ $paket->durasi }}</td>
                <td style="font-size: 11px;">{{ Str::limit($paket->deskripsi, 80) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Tidak ada data paket wisata</td>
            </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <th colspan="4" class="text-right">Total Paket Wisata:</th>
                <th colspan="3" class="text-center">{{ $paket_wisata->count() }} Paket</th>
            </tr>
        </tfoot>
    </table>

    <!-- Footer -->
    <div class="footer">
        <div class="signature">
            <p>Jakarta, <?php echo date('d F Y'); ?></p>
            <p>Mengetahui,</p>
            <br><br><br>
            <p style="border-top: 1px solid #333; display: inline-block; padding-top: 5px;">
                <strong>{{ Auth::user()->name }}</strong>
            </p>
            <p>Manager Travel</p>
        </div>
    </div>

    <script>
        // Auto print saat halaman dibuka (opsional)
        // window.onload = function() { window.print(); }
    </script>
</body>
</html>