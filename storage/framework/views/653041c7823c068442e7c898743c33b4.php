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
            width: 225px;
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

        .sidebar .btn-danger {
            background-color: #dc3545;
            border: none;
            text-align: left;
            padding-left: 1.25rem;
        }
        .sidebar .btn-danger:hover {
            background-color: #bb2d3b;
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
        
        <div class="sidebar">
            <h4 class="text-white px-3 mb-4">The Sound Project</h4>

            <a href="<?php echo e(route('admin.dashboard')); ?>">
                <i class="fas fa-home me-2"></i> Dashboard
            </a>
            <a href="<?php echo e(route('admin.booking.index')); ?>">
                <i class="fas fa-users me-2"></i> Manajemen Booking
            </a>
            <a href="<?php echo e(route('admin.users.index')); ?>">
                <i class="fas fa-users me-2"></i> Manajemen User
            </a>
            <a href="<?php echo e(route('admin.ruangan.index')); ?>">
                <i class="fas fa-door-open me-2"></i> Manajemen Ruangan
            </a>
            <a href="<?php echo e(route('admin.booking.riwayat')); ?>">
                <i class="fas fa-clock-rotate-left me-2"></i> Riwayat Booking
            </a>

            <form method="POST" action="<?php echo e(route('logout')); ?>" class="mt-4 px-3">
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn btn-danger w-100">
                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                </button>
            </form>
        </div>


        
        <div class="main-content w-100">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\Users\lenovo\Documents\uas_kellima_laravel\resources\views/layouts/admin.blade.php ENDPATH**/ ?>