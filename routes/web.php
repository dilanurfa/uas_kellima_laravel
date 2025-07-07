<?php

use Illuminate\Support\Facades\Route;
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
| Semua route web aplikasi ada di sini.
*/

// Landing page
Route::get('/', function () {
    return view('welcome');
});

// Auth routes (login, register, logout)
Auth::routes();

// Home / dashboard umum
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Resource CRUD Ruangan (bisa admin atau user tergantung middleware/controller)
Route::resource('/Ruangan', RuanganController::class);


// ==========================
// ADMIN ROUTES
// ==========================
Route::middleware(['isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    Route::resource('users', UserController::class);
    Route::resource('Ruangan', RuanganController::class);

    // Booking management admin
    Route::get('/booking', [BookingController::class, 'booking'])->name('booking');
    Route::post('/booking/{id}/confirm', [BookingController::class, 'confirm'])->name('booking.confirm');
    Route::post('/booking/{id}/reject', [BookingController::class, 'reject'])->name('booking.reject');
});


// ==========================
// KLIEN ROUTES (authenticated user)
// ==========================
Route::middleware(['auth'])->group(function () {

    // Klien dashboard
    Route::get('/klien', [KlienController::class, 'index'])->name('klien.index');
    Route::get('/klien/dashboard', [KlienController::class, 'dashboard'])->name('klien.dashboard');

    // Booking studio: show form booking
    Route::get('/booking/{id}', [BookingController::class, 'create'])->name('klien.booking');

    // Proses simpan booking (POST)
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

    // Halaman QRIS statis setelah booking sukses (GET)
    Route::get('/booking/qris/{id}', [BookingController::class, 'showQris'])->name('booking.qris');

    // Konfirmasi pembayaran (GET)
    Route::get('/booking/confirm/{id}', [BookingController::class, 'confirmPayment'])->name('booking.confirmPayment');

    // Halaman sukses booking
    Route::get('/booking/success/{id}', [BookingController::class, 'success'])->name('booking.success');

    // Download bukti pembayaran
    Route::get('/booking/receipt/{id}', [BookingController::class, 'downloadReceipt'])->name('booking.receipt');

    // Riwayat booking klien
    Route::get('/klien/riwayat', [BookingController::class, 'riwayat'])->name('klien.riwayat');

    // Cancel booking
    Route::delete('/booking/{id}/cancel', [BookingController::class, 'cancel'])->name('klien.cancel');
});


// ==========================
// AKUN ROUTES (authenticated user)
// ==========================
Route::middleware(['auth'])->prefix('akun')->name('akun.')->group(function () {
    Route::get('/', [AkunController::class, 'show'])->name('show');
    Route::get('/edit', [AkunController::class, 'edit'])->name('edit');
    Route::post('/update', [AkunController::class, 'update'])->name('update');
});
