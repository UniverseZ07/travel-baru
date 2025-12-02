<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Kalau tabel bookings sudah ada, jangan buat lagi supaya tidak error
        if (!Schema::hasTable('bookings')) {
            Schema::create('bookings', function (Blueprint $table) {
                $table->bigIncrements('id_booking');
                $table->unsignedBigInteger('user_id');
                $table->unsignedInteger('id_paket'); // sesuaikan dengan tipe di tabel paket_wisata
                $table->string('nama_pemesan', 100);
                $table->string('email', 100);
                $table->string('no_telp', 20);
                $table->date('tanggal_booking');
                $table->integer('jumlah_orang');
                $table->decimal('total_harga', 12, 2);
                $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending');
                $table->text('catatan')->nullable();
                $table->timestamps();

                // Foreign keys
                $table->foreign('user_id')
                      ->references('id')
                      ->on('users')
                      ->onDelete('cascade');

                $table->foreign('id_paket')
                      ->references('id_paket')
                      ->on('paket_wisata')
                      ->onDelete('cascade');
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
