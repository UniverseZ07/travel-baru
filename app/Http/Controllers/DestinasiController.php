<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DestinasiController extends Controller
{
    public function index()
    {
        $destinasi = [
            [
                'nama'       => 'Bali',
                'lokasi'     => 'Pulau Dewata',
                'gambar'     => 'bali.jpg',
                'deskripsi'  => 'Pulau Dewata dengan pantai eksotis dan budaya yang kaya',
            ],
            [
                'nama'       => 'Raja Ampat',
                'lokasi'     => 'Papua Barat',
                'gambar'     => 'raja-ampat.jpg',
                'deskripsi'  => 'Surga bawah laut dengan keindahan alam yang menakjubkan',
            ],
            [
                'nama'       => 'Yogyakarta',
                'lokasi'     => 'Istimewa Yogyakarta',
                'gambar'     => 'jogja.jpg', // file di public/images/jogja.jpg
                'deskripsi'  => 'Kota budaya dengan candi dan keraton yang megah',
            ],
            [
                'nama'       => 'Lombok',
                'lokasi'     => 'Nusa Tenggara Barat',
                'gambar'     => 'mandalika.jpg', // file di public/images/mandalika.jpg
                'deskripsi'  => 'Pulau dengan Gunung Rinjani dan pantai yang memukau',
            ],
            [
                'nama'       => 'Gunung Bromo',
                'lokasi'     => 'Jawa Timur',
                'gambar'     => 'gunung-bromo.jpg', // file di public/images/gunung-bromo.jpg
                'deskripsi'  => 'Gunung berapi aktif dengan pemandangan sunrise yang spektakuler',
            ],
            [
                'nama'       => 'Pulau Komodo',
                'lokasi'     => 'Nusa Tenggara Timur',
                'gambar'     => 'pulau-komodo.jpg', // file di public/images/pulau-komodo.jpg
                'deskripsi'  => 'Habitat asli komodo dan pink beach yang eksotis',
            ],
        ];

        return view('destinasi.index', compact('destinasi'));
    }
}
