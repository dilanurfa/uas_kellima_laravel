@extends('layouts.app')

@section('content')
<style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background-color: #f0f4f8;
    }

    .detail-card {
        max-width: 800px;
        margin: 40px auto;
        background: #e9edf4;
        border: 1px solid #d3dce6;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }

    .detail-header {
        background-color: #cad9ec;
        padding: 20px 30px;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
        border-bottom: 1px solid #c1d0e3;
    }

    .detail-header h4 {
        margin: 0;
        font-size: 22px;
        font-weight: 600;
        color: #2b3a4d;
    }

    .detail-body {
        padding: 30px;
        background-color: #f7f9fc;
        border-bottom-left-radius: 12px;
        border-bottom-right-radius: 12px;
    }

    .detail-table {
        width: 100%;
        border-collapse: collapse;
        background-color: #fff;
        border-radius: 10px;
        overflow: hidden;
    }

    .detail-table th,
    .detail-table td {
        padding: 12px 16px;
        border-bottom: 1px solid #e0e0e0;
    }

    .detail-table th {
        width: 30%;
        background-color: #f0f5fa;
        color: #495057;
        font-weight: 600;
    }

    .detail-table td {
        color: #333;
    }

    .badge-role {
        background-color: #8da9c4;
        color: white;
        padding: 5px 12px;
        font-size: 0.85rem;
        border-radius: 20px;
    }

    .btn-back {
        margin-top: 25px;
        background-color: #cad9ec;
        color: #2b3a4d;
        padding: 8px 20px;
        border-radius: 6px;
        border: none;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-back:hover {
        background-color: #b0c6de;
        color: #1f2b3a;
    }
</style>

<div class="detail-card">
    <div class="detail-header">
        <h4><i class="fas fa-user-circle me-2"></i> Detail Pengguna</h4>
    </div>
    <div class="detail-body">
        <table class="detail-table mb-3">
            <tr>
                <th>ID</th>
                <td>{{ $user->id }}</td>
            </tr>
            <tr>
                <th>Nama</th>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th>Role</th>
                <td>
                    <span class="badge-role">{{ $user->role->name ?? 'No Role' }}</span>
                </td>
            </tr>
            <tr>
                <th>Tanggal Daftar</th>
                <td>{{ $user->created_at->translatedFormat('d F Y') }}</td>
            </tr>
        </table>

        <a href="{{ route('admin.users.index') }}" class="btn btn-back">
            <i class="fas fa-arrow-left me-1"></i> Kembali
        </a>
    </div>
</div>
@endsection