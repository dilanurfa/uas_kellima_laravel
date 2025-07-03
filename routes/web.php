<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\KlienController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AkunController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/Ruangan', RuanganController::class);

// Admin routes (harus login dan isAdmin middleware)
Route::middleware(['isAdmin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('admin/users', UserController::class);
    Route::resource('admin/Ruangan', RuanganController::class);

    // Admin lihat daftar booking (view admin/booking.blade.php)
    Route::get('/admin/booking', [BookingController::class, 'booking'])->name('admin.booking');

    // Admin konfirmasi booking
    Route::post('/admin/booking/{id}/confirm', [BookingController::class, 'confirm'])->name('admin.booking.confirm');
    Route::post('/admin/booking/{id}/reject', [BookingController::class, 'reject'])->name('admin.booking.reject');
});

// Klien routes (harus login)
Route::middleware(['auth'])->group(function () {
    Route::get('/klien', [KlienController::class, 'index'])->name('klien.index');
    Route::get('/klien/dashboard', [KlienController::class, 'dashboard'])->name('klien.dashboard');

    // Form booking studio (klien.booking)
    Route::get('/klien/booking/{ruangan}', [BookingController::class, 'create'])->name('klien.booking');

    // Submit booking
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

    Route::get('/booking/thanks', function () {
    return view('klien.thanks');
})->name('booking.thanks')->middleware('auth');

    Route::get('/klien/riwayat', [\App\Http\Controllers\BookingController::class, 'riwayat'])->name('klien.riwayat');

});

Route::middleware(['auth'])->group(function () {
    Route::get('/akun', [AkunController::class, 'show'])->name('akun.show');
    Route::get('/akun/edit', [AkunController::class, 'edit'])->name('akun.edit');
    Route::post('/akun/update', [AkunController::class, 'update'])->name('akun.update');
});
