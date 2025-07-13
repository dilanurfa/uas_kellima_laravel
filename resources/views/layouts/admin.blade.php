<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            margin: 0;
            overflow-x: hidden;
        }
        .sidebar {
            width: 220px;
            background-color: #343a40;
            color: white;
            min-height: 100vh;
            position: fixed;
            padding-top: 60px;
        }
        .sidebar h4 {
            padding-left: 20px;
            margin-bottom: 1rem;
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
            padding: 30px;
            background-color: #f8f9fa;
            min-height: 100vh;
        }
    </style>
</head>
<body>

    <div class="d-flex">
        {{-- Sidebar --}}
        <div class="sidebar">
            <h4>Administrator</h4>
            <a href="{{ route('admin.dashboard') }}">
                <i class="fas fa-chart-bar me-2"></i> Dashboard
            </a>
            <a href="{{ route('admin.users.index') }}">
                <i class="fas fa-users me-2"></i> Manajemen User
            </a>
            <a href="{{ route('admin.Ruangan.index') }}">
                <i class="fas fa-door-open me-2"></i> Manajemen Ruangan
            </a>
        </div>

        {{-- Main Content --}}
        <div class="main-content w-100">
            @yield('content')
        </div>
    </div>

    {{-- Script --}}
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
