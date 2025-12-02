<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaketWisata extends Model
{
    protected $table = 'paket_wisata';
    protected $primaryKey = 'id_paket';
    public $timestamps = false;
    
    protected $fillable = [
        'nama_paket',
        'destinasi',
        'harga',
        'durasi',
        'deskripsi',
        'foto'
    ];
}