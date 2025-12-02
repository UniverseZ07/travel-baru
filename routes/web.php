<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaketWisataController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DestinasiController;
use App\Http\Middleware\PreventBackHistory;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Landing Page (Public)
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Review Page (Public)
Route::get('/review', function () {
    return view('review');
})->name('review');

// About Page (Public)
Route::get('/about', function () {
    return view('about');
})->name('about');

// Destinasi Populer (Public)
Route::get('/destinasi', [DestinasiController::class, 'index'])->name('destinasi.index');

// Authentication Routes
Auth::routes();

// ===== ROUTE SETELAH LOGIN (UMUM) =====
Route::middleware(['auth', PreventBackHistory::class])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Paket Wisata index (admin & user)
    Route::get('/paket-wisata', [PaketWisataController::class, 'index'])->name('paket.index');
});

// ===== ADMIN ROUTES =====
Route::middleware(['auth', 'admin', PreventBackHistory::class])->group(function () {

    // Paket Wisata Management (ADMIN ONLY)
    Route::prefix('paket-wisata')->group(function () {
        Route::get('/tambah', [PaketWisataController::class, 'tambah'])->name('paket.tambah');
        Route::post('/store', [PaketWisataController::class, 'store'])->name('paket.store');
        Route::get('/edit/{id}', [PaketWisataController::class, 'edit'])->name('paket.edit');
        Route::post('/update', [PaketWisataController::class, 'update'])->name('paket.update');
        Route::get('/hapus/{id}', [PaketWisataController::class, 'hapus'])->name('paket.hapus');
        Route::get('/cari', [PaketWisataController::class, 'cari'])->name('paket.cari');
        Route::get('/laporan', [PaketWisataController::class, 'laporan'])->name('paket.laporan');
    });

    // Booking Management (ADMIN ONLY)
    Route::prefix('bookings')->group(function () {
        Route::get('/', [BookingController::class, 'index'])->name('booking.index');
        Route::get('/confirm/{id}', [BookingController::class, 'confirm'])->name('booking.confirm');
        Route::get('/cancel/{id}', [BookingController::class, 'cancel'])->name('booking.cancel');
        Route::get('/delete/{id}', [BookingController::class, 'destroy'])->name('booking.delete');
    });

    // Admin Dashboard
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

// ===== USER ROUTES =====
Route::middleware(['auth', 'user', PreventBackHistory::class])->group(function () {

    // Detail Paket
    Route::get('/paket/{id}', [PaketWisataController::class, 'detail'])->name('paket.detail');

    // Booking
    Route::get('/booking/{id}', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');

    // My Bookings
    Route::get('/my-bookings', [BookingController::class, 'myBookings'])->name('booking.my');

    // Cetak Laporan Booking
    Route::get('/booking/print/{id}', [BookingController::class, 'print'])->name('booking.print');

    // User Dashboard
    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');
});

// Fallback Route
Route::fallback(function () {
    return redirect('/');
});
