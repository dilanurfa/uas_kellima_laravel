<?php $__env->startSection('content'); ?>
<!-- Tambahkan style gradasi + splash -->
<style>
    body {
        background: radial-gradient(circle at top left, #74cdd9 0%, transparent 40%),
                    radial-gradient(circle at bottom right, #ffffff 0%, transparent 40%),
                    radial-gradient(circle at center, #a5d8f3 0%, transparent 50%),
                    linear-gradient(135deg, #3598bf, rgb(184, 227, 255));
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

    .card.custom-card {
        backdrop-filter: blur(6px);
        background: rgb(168, 220, 255);
        border-radius: 20px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        border: none;
        padding: 5%;
        width: 100%;

    }

    .card-header h3 {
        font-weight: 600;
        color: #145DA0;
    }

    .btn-primary {
        background-color: #1b7ab5;
        border-color: #1b7ab5;
    }

    .btn-primary:hover {
        background-color: #155e8a;
        border-color: #155e8a;
    }

    .form-label {
        font-weight: 600;
    }
</style>

<div class="container pt-5 mt-4" style="max-width: 600px;">
    <div class="card custom-card shadow">
        <div class="card-header bg-transparent text-center">
            <h3>Edit Profil</h3>
        </div>

        <div class="card-body">
            <form action="<?php echo e(route('akun.update')); ?>" method="POST">
                <?php echo csrf_field(); ?>

                
                <div class="mb-3">
                    <label for="name" class="form-label">Nama <span class="text-danger">*</span></label>
                    <input type="text"
                           class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                           name="name"
                           id="name"
                           value="<?php echo e(old('name', $user->name)); ?>"
                           placeholder="Masukkan nama">
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <small class="text-danger"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div class="mb-3">
                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email"
                           class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                           name="email"
                           id="email"
                           value="<?php echo e(old('email', $user->email)); ?>"
                           placeholder="Masukkan email">
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <small class="text-danger"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <hr class="my-4">
                <h6 class="fw-semibold mb-3">Ganti Password?</h6>

                
                <div class="mb-3">
                    <label for="password" class="form-label">Password Baru</label>
                    <input type="password"
                           class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                           name="password"
                           id="password"
                           autocomplete="new-password"
                           placeholder="Masukkan password baru">
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <small class="text-danger"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div class="mb-4">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input type="password"
                           class="form-control"
                           name="password_confirmation"
                           id="password_confirmation"
                           autocomplete="new-password"
                           placeholder="Konfirmasi password baru">
                </div>

                
                <div class="d-flex justify-content-between">
                    <a href="<?php echo e(route('akun.show')); ?>" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Batal
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ASUS VIVOBOOK DC\uas_kellima_laravel\resources\views/akun/edit.blade.php ENDPATH**/ ?>