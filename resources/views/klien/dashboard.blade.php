@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>
 
                <div class="card-body">
                    <div class="alert alert-info">
                        Halo, {{ Auth::user()->name }}! Anda masuk sebagai pengguna biasa.
                    </div>

                    <h4>Panel Pengguna</h4>
                    <p>Ini adalah halaman utama untuk user. Anda bisa melihat dan melakukan pemesanan studio di sini.</p>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Booking Studio</h5>
                                    <p class="card-text">Lihat daftar studio & lakukan pemesanan.</p>
                                    <a href="{{ route('klien.index') }}" class="btn btn-success">Lihat Studio</a>
                                     <a href="{{ route('klien.riwayat') }}" class="btn btn-success">Riwayat Pemesanan</a>
                                     <a href="{{ route('akun.show') }}" class="btn btn-success">Akun Saya</a>
                                                                 
                            </div>
                        </div>
                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
