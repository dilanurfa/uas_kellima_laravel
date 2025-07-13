@extends('layouts.admin')

@section('content')
<div class="main-content w-100" style="background-color: #f0f0f0;">
    <div class="d-flex justify-content-center align-items-center" style="height: 100%;">
        <div class="text-center py-5">
            <h2 class="fw-bold" style="color: #222;">Selamat Datang, {{ Auth::user()->name }}!</h2>
            <p class="text-muted">Anda masuk sebagai <strong>Administrator</strong>.</p>
        </div>
    </div>
</div>
<div>
    <div class="sidebar">
    <h4 class="px-3 mb-4">Administrator</h4>
    <a href="{{ route('admin.users.index') }}">
        <i class="fas fa-users me-2"></i> Manajemen User
    </a>
    <a href="{{ route('admin.Ruangan.index') }}">
        <i class="fas fa-door-open me-2"></i> Manajemen Ruangan
    </a>
    <a href="{{ route('admin.booking') }}">
        <i class="fas fa-calendar-check me-2"></i> Daftar Booking
    </a> 
</div>

<style>
    body {
            min-height: 100vh;
            overflow-x: hidden;
        }
        .sidebar {
            width: 220px;
            background-color: #343a40;
            color: white;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 60px;
        }
        .sidebar a {
            color: #fff;
            padding: 12px 20px;
            display: block;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .main-content {
            margin-left: 220px;
            padding: 20px;
        }
        .navbar {
            z-index: 1030;
        }
</style>
@endsection
