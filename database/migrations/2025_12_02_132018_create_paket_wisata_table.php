<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('paket_wisata', function (Blueprint $table) {
            $table->id();
            $table->string('nama_paket');
            $table->string('slug')->unique();      // untuk URL /paket/nama-paket
            $table->string('destinasi_utama');     // contoh: Bali, Raja Ampat
            $table->text('deskripsi')->nullable();
            $table->integer('durasi_hari')->default(1);
            $table->integer('harga_mulai');        // simpan dalam rupiah (integer)
            $table->string('tipe_trip')->nullable(); // open trip, private, family, dll.
            $table->string('thumbnail')->nullable(); // path gambar
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('paket_wisata');
    }
};
