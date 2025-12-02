<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaketWisataController extends Controller
{
    // READ - Menampilkan semua paket (ADMIN & USER bisa akses)
    public function index()
    {
        $paket_wisata = DB::table('paket_wisata')
            ->orderBy('id_paket', 'desc')
            ->paginate(9); // 9 per halaman

        // Kirim data role ke view
        $isAdmin = auth()->user()->role === 'admin';

        return view('paket_wisata.index', [
            'paket_wisata' => $paket_wisata,
            'isAdmin'      => $isAdmin,
        ]);
    }

    // CREATE - Tampilkan form tambah paket (ADMIN ONLY)
    public function tambah()
    {
        return view('paket_wisata.tambah');
    }

    // CREATE - Proses simpan data (ADMIN ONLY)
    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required|max:100',
            'destinasi'  => 'required|max:100',
            'durasi'     => 'required|max:50',
            'harga'      => 'required|numeric',
            'deskripsi'  => 'nullable',
            'foto'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $foto_name = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $foto_name = time() . '_' . $foto->getClientOriginalName();
            $foto->move(public_path('uploads/paket_wisata'), $foto_name);
        }

        DB::table('paket_wisata')->insert([
            'nama_paket' => $request->nama_paket,
            'destinasi'  => $request->destinasi,
            'durasi'     => $request->durasi,
            'harga'      => $request->harga,
            'deskripsi'  => $request->deskripsi,
            'foto'       => $foto_name,
            'created_at' => now(),
        ]);

        return redirect('/paket-wisata')->with('success', 'Paket wisata berhasil ditambahkan!');
    }

    // UPDATE - Tampilkan form edit (ADMIN ONLY)
    public function edit($id)
    {
        $paket = DB::table('paket_wisata')->where('id_paket', $id)->first();

        if (! $paket) {
            return redirect('/paket-wisata')->with('error', 'Paket tidak ditemukan');
        }

        return view('paket_wisata.edit', ['paket' => $paket]);
    }

    // UPDATE - Proses update data (ADMIN ONLY)
    public function update(Request $request)
    {
        $request->validate([
            'id_paket'   => 'required',
            'nama_paket' => 'required|max:100',
            'destinasi'  => 'required|max:100',
            'durasi'     => 'required|max:50',
            'harga'      => 'required|numeric',
            'deskripsi'  => 'nullable',
            'foto'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $paket = DB::table('paket_wisata')->where('id_paket', $request->id_paket)->first();

        if (! $paket) {
            return redirect('/paket-wisata')->with('error', 'Paket tidak ditemukan');
        }

        $foto_name = $paket->foto;

        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($paket->foto && file_exists(public_path('uploads/paket_wisata/' . $paket->foto))) {
                unlink(public_path('uploads/paket_wisata/' . $paket->foto));
            }

            // Upload foto baru
            $foto = $request->file('foto');
            $foto_name = time() . '_' . $foto->getClientOriginalName();
            $foto->move(public_path('uploads/paket_wisata'), $foto_name);
        }

        DB::table('paket_wisata')
            ->where('id_paket', $request->id_paket)
            ->update([
                'nama_paket' => $request->nama_paket,
                'destinasi'  => $request->destinasi,
                'durasi'     => $request->durasi,
                'harga'      => $request->harga,
                'deskripsi'  => $request->deskripsi,
                'foto'       => $foto_name,
                'updated_at' => now(),
            ]);

        return redirect('/paket-wisata')->with('success', 'Paket wisata berhasil diupdate!');
    }

    // DELETE - Hapus data (ADMIN ONLY)
    public function hapus($id)
    {
        $paket = DB::table('paket_wisata')->where('id_paket', $id)->first();

        if (! $paket) {
            return redirect('/paket-wisata')->with('error', 'Paket tidak ditemukan');
        }

        // Hapus foto
        if ($paket->foto && file_exists(public_path('uploads/paket_wisata/' . $paket->foto))) {
            unlink(public_path('uploads/paket_wisata/' . $paket->foto));
        }

        DB::table('paket_wisata')->where('id_paket', $id)->delete();

        return redirect('/paket-wisata')->with('success', 'Paket wisata berhasil dihapus!');
    }

    // SEARCH - Pencarian (ADMIN ONLY)
    public function cari(Request $request)
    {
        $keyword = $request->cari;

        $paket_wisata = DB::table('paket_wisata')
            ->where('nama_paket', 'LIKE', "%{$keyword}%")
            ->orWhere('destinasi', 'LIKE', "%{$keyword}%")
            ->orderBy('id_paket', 'desc')
            ->paginate(9); // pakai 9 juga supaya konsisten

        $isAdmin = auth()->user()->role === 'admin';

        return view('paket_wisata.index', [
            'paket_wisata' => $paket_wisata,
            'isAdmin'      => $isAdmin,
        ]);
    }

    // REPORT - Laporan (ADMIN ONLY)
    public function laporan()
    {
        $paket_wisata = DB::table('paket_wisata')
            ->orderBy('id_paket', 'desc')
            ->get();

        return view('paket_wisata.laporan', ['paket_wisata' => $paket_wisata]);
    }

    // DETAIL - Untuk USER (bisa juga diakses admin)
    public function detail($id)
    {
        $paket = DB::table('paket_wisata')
            ->where('id_paket', $id)
            ->first();

        if (! $paket) {
            return redirect()->route('paket.index')->with('error', 'Paket tidak ditemukan');
        }

        $isAdmin = auth()->user()->role === 'admin';

        return view('paket_wisata.detail', [
            'paket'   => $paket,
            'isAdmin' => $isAdmin,
        ]);
    }
}
