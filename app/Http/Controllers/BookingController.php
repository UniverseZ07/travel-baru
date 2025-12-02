<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // ===== USER METHODS =====

    public function create($id)
    {
        $paket = DB::table('paket_wisata')->where('id_paket', $id)->first();

        if (! $paket) {
            return redirect()->route('paket.index')->with('error', 'Paket tidak ditemukan');
        }

        return view('booking.create', ['paket' => $paket]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_paket'         => 'required|exists:paket_wisata,id_paket',
            'nama_pemesan'     => 'required|max:100',
            'email'            => 'required|email',
            'no_telp'          => 'required|max:20',
            'tanggal_booking'  => 'required|date',
            'jumlah_orang'     => 'required|integer|min:1',
            'catatan'          => 'nullable',
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $paket = DB::table('paket_wisata')->where('id_paket', $request->id_paket)->first();
        $total_harga = $paket->harga * $request->jumlah_orang;

        // Upload bukti pembayaran QRIS
        $buktiName = null;
        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $buktiName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/bukti_qris'), $buktiName);
        }

        DB::table('bookings')->insert([
            'user_id'           => Auth::id(),
            'id_paket'          => $request->id_paket,
            'nama_pemesan'      => $request->nama_pemesan,
            'email'             => $request->email,
            'no_telp'           => $request->no_telp,
            'tanggal_booking'   => $request->tanggal_booking,
            'jumlah_orang'      => $request->jumlah_orang,
            'total_harga'       => $total_harga,
            'catatan'           => $request->catatan,
            'status'            => 'pending',
            'bukti_pembayaran'  => $buktiName,
            'metode_pembayaran' => 'qris',
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);

        return redirect()->route('booking.my')->with('success', 'Booking berhasil! Menunggu konfirmasi admin.');
    }

    public function myBookings()
    {
        $bookings = DB::table('bookings')
            ->join('paket_wisata', 'bookings.id_paket', '=', 'paket_wisata.id_paket')
            ->where('bookings.user_id', Auth::id())
            ->select('bookings.*', 'paket_wisata.nama_paket', 'paket_wisata.destinasi')
            ->orderBy('bookings.created_at', 'desc')
            ->paginate(7); // 7 per halaman

        return view('booking.my-bookings', ['bookings' => $bookings]);
    }

    // Cetak laporan booking (User only)
    public function print($id)
    {
        $booking = DB::table('bookings')
            ->join('paket_wisata', 'bookings.id_paket', '=', 'paket_wisata.id_paket')
            ->join('users', 'bookings.user_id', '=', 'users.id')
            ->where('bookings.id_booking', $id)
            ->where('bookings.user_id', Auth::id())
            ->select(
                'bookings.*',
                'paket_wisata.nama_paket',
                'paket_wisata.destinasi',
                'paket_wisata.durasi',
                'paket_wisata.deskripsi',
                'users.name as user_name',
                'users.email as user_email'
            )
            ->first();

        if (! $booking) {
            return redirect()->route('booking.my')->with('error', 'Booking tidak ditemukan');
        }

        if ($booking->status != 'confirmed') {
            return redirect()->route('booking.my')->with('error', 'Hanya booking yang dikonfirmasi yang bisa dicetak');
        }

        return view('booking.print', ['booking' => $booking]);
    }

    // ===== ADMIN METHODS =====

    // Lihat semua booking (Admin only)
    public function index()
    {
        $bookings = DB::table('bookings')
            ->join('paket_wisata', 'bookings.id_paket', '=', 'paket_wisata.id_paket')
            ->join('users', 'bookings.user_id', '=', 'users.id')
            ->select(
                'bookings.*',
                'paket_wisata.nama_paket',
                'paket_wisata.destinasi',
                'users.name as user_name'
            )
            ->orderBy('bookings.created_at', 'desc')
            ->paginate(10); // admin: 10 per halaman

        return view('booking.index', ['bookings' => $bookings]);
    }

    // Konfirmasi booking (Admin only)
    public function confirm($id)
    {
        DB::table('bookings')
            ->where('id_booking', $id)
            ->update([
                'status'     => 'confirmed',
                'updated_at' => now(),
            ]);

        return redirect()->route('booking.index')->with('success', 'Booking berhasil dikonfirmasi!');
    }

    // Batalkan booking (Admin only)
    public function cancel($id)
    {
        DB::table('bookings')
            ->where('id_booking', $id)
            ->update([
                'status'     => 'cancelled',
                'updated_at' => now(),
            ]);

        return redirect()->route('booking.index')->with('success', 'Booking berhasil dibatalkan!');
    }

    // Hapus booking (Admin only)
    public function destroy($id)
    {
        DB::table('bookings')->where('id_booking', $id)->delete();

        return redirect()->route('booking.index')->with('success', 'Booking berhasil dihapus!');
    }
}
