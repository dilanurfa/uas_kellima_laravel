<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\RuanganController;
use App\Http\Controllers\KlienController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AkunController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ==========================
// LANDING & AUTH
// ==========================
Route::get('/', [KlienController::class, 'index']);
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ==========================
// ADMIN ROUTES
// ==========================
Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {


    // Dashboard admin
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
     Route::resource('users', UserController::class);
      Route::resource('ruangan', RuanganController::class);


    // Manajemen booking
    Route::get('/booking', [BookingController::class, 'booking'])->name('booking');
    Route::post('/booking/{id}/confirm', [BookingController::class, 'confirm'])->name('booking.confirm');
    Route::post('/booking/{id}/reject', [BookingController::class, 'reject'])->name('booking.reject');
});

// ==========================
// KLIEN ROUTES
// ==========================
Route::middleware(['auth'])->group(function () {

    // Dashboard klien
    Route::get('/klien', [KlienController::class, 'index'])->name('klien.index');
    Route::get('/klien/show/{id}', [BookingController::class, 'show'])->name('klien.show');

    Route::get('/klien/dashboard', [KlienController::class, 'dashboard'])->name('klien.dashboard');

    // Booking ruangan
    Route::get('/booking/{id}', [BookingController::class, 'create'])->name('klien.booking');          // form booking
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');              // proses simpan
    Route::get('/booking/success/{id}', [BookingController::class, 'success'])->name('booking.success'); // halaman sukses
    Route::get('/klien/riwayat', [BookingController::class, 'riwayat'])->name('klien.riwayat');        // riwayat booking
    Route::delete('/booking/{id}/cancel', [BookingController::class, 'cancel'])->name('klien.cancel'); // batal booking
});

// ==========================
// AKUN PENGGUNA
// ==========================
Route::middleware(['auth'])->prefix('akun')->name('akun.')->group(function () {
    Route::get('/', [AkunController::class, 'show'])->name('show');
    Route::get('/edit', [AkunController::class, 'edit'])->name('edit');
    Route::post('/update', [AkunController::class, 'update'])->name('update');
});
