<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\RuanganController;
use App\Http\Controllers\KlienController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AkunController;

Route::get('/', [KlienController::class, 'index']);
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('ruangan', RuanganController::class);
    Route::get('/booking/riwayat', [BookingController::class, 'riwayatAdmin'])->name('booking.riwayat');


    // pengguna dan ruangan
    Route::resource('users', UserController::class);
    Route::resource('Ruangan', RuanganController::class);

    // booking oleh admin
    Route::get('/booking', [AdminBookingController::class, 'index'])->name('booking.index');
    Route::post('/booking/{id}/confirm', [AdminBookingController::class, 'confirm'])->name('booking.confirm');
    Route::post('/booking/{id}/reject', [AdminBookingController::class, 'reject'])->name('booking.reject');
    Route::post('/booking/selesai/{id}', [AdminBookingController::class, 'selesaikan'])->name('booking.selesai');

});


Route::middleware(['auth'])->group(function () {

    Route::get('/klien', [KlienController::class, 'index'])->name('klien.index');
    Route::get('/klien/dashboard', [KlienController::class, 'dashboard'])->name('klien.dashboard');

    Route::get('/klien/riwayat', [BookingController::class, 'riwayat'])->name('klien.riwayat');
    Route::get('/klien/show/{id}', [BookingController::class, 'show'])->name('klien.show');
    
    Route::delete('/booking/{id}/delete', [BookingController::class, 'destroy'])->name('klien.delete');
    Route::post('/booking/{id}/cancel', [BookingController::class, 'cancel'])->name('klien.cancel');


    // ini bukingg
    Route::get('/booking/{id}', [BookingController::class, 'create'])->name('klien.booking'); 
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');     
    Route::get('/booking/success/{id}', [BookingController::class, 'success'])->name('booking.success'); 
    Route::get('/booking/{id}/download', [BookingController::class, 'download'])->name('booking.download');
    Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');

   Route::match(['get','post'], '/klien/riwayat', [App\Http\Controllers\KlienController::class, 'riwayat'])->name('klien.riwayat');


});

Route::middleware(['auth'])->prefix('akun')->name('akun.')->group(function () {
    Route::get('/', [AkunController::class, 'show'])->name('show');
    Route::get('/edit', [AkunController::class, 'edit'])->name('edit');
    Route::post('/update', [AkunController::class, 'update'])->name('update');
    
   // Tambahan dari Jeon untuk upload foto profil
    Route::post('/photo', [AkunController::class, 'updatePhoto'])->name('photo.update');
});

