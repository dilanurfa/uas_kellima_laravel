@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin Dashboard') }}</div>
 
                <div class="card-body">
                    <div class="alert alert-success">
                        Selamat datang, {{ Auth::user()->name }}! Anda masuk sebagai Administrator.
                    </div>
 
                    <h4>Panel Admin</h4>
                    <p>Ini adalah halaman khusus admin. Hanya user dengan role admin yang bisa mengakses halaman ini.</p>
 
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Manajemen User</h5>
                                    <p class="card-text">Kelola data pengguna sistem.</p>
                                    <a href="{{ route('users.index') }}" class="btn btn-primary">Kelola User</a>
                                     <a href="{{ route('Ruangan.index') }}" class="btn btn-primary">Kelola Ruangan</a>
                                      <a href="{{ route('admin.booking') }}" class="btn btn-primary">Daftar Booking</a>
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