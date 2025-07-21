@extends('layouts.app')

@section('content')
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<!-- Cropper.js CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css"/>

<style>
    .profile-header {
        background: linear-gradient(135deg, #1b7ab5, #74cdd9);
        min-height: 300px;
        position: relative;
        overflow: hidden;
        z-index: 1;
    }

    .profile-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        padding: 90px;
        text-align: center;
        margin-top: -140px;
        margin-bottom: 50px;
        position: relative;
        z-index: 2;
    }

    .avatar-wrapper {
        position: relative;
        width: 130px;
        height: 130px;
        margin: 0 auto;
        margin-top: -65px;
    }

    .profile-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        border: 5px solid white;
        object-fit: cover;
        background: white;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }

    .edit-icon {
        position: absolute;
        bottom: 0;
        right: 0;
        font-size: 20px;
        color: #0d6efd;
        cursor: pointer;
    }

    .edit-icon input[type="file"] {
        opacity: 0;
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        cursor: pointer;
    }

    .btn-rounded {
        border-radius: 50px;
        padding: 10px 25px;
        font-weight: bold;
    }

    .stat-box {
        text-align: center;
        padding: 10px;
    }

    .stat-box h4 {
        margin-bottom: 0;
        font-weight: bold;
    }

    .stat-box small {
        color: #888;
    }

    #preview-crop {
        width: 100%;
        max-height: 400px;
    }
</style>

<div class="profile-header d-flex align-items-center justify-content-center"></div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="profile-card">
                <div class="avatar-wrapper">
                    <img 
                        src="{{ $user->photo ? asset('storage/photos/' . $user->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=0d6efd&color=fff&size=120' }}" 
                        alt="Foto Profil" 
                        class="profile-avatar shadow" 
                        id="user-photo">

                    <label class="edit-icon">
                        <i class="bi bi-pencil-fill"></i>
                        <input type="file" id="photo-input" accept="image/*">
                    </label>
                </div>

                <h3 class="mt-4 mb-1">{{ $user->name }}</h3>
                <p class="text-muted mb-2">{{ $user->email }}</p>
                <p class="text-secondary small mb-4">{{ $user->role->name ?? 'User Biasa' }}</p>

                <div class="row text-center mb-4">
                   <div class="col stat-box">
                <h4>{{ $totalBooking }}</h4><small>Booking</small>
                    </div>
                    <div class="col stat-box">
                <h4>{{ $totalRiwayat }}</h4><small>Riwayat</small>
                    </div> 

                    <div class="col stat-box">
                        <h4>{{ \Carbon\Carbon::parse($user->created_at)->format('Y') }}</h4><small>Member Sejak</small>
                    </div>
                </div>

                <a href="{{ route('akun.edit') }}" class="btn btn-primary btn-rounded">
                    <i class="bi bi-person-lines-fill me-1"></i> Edit Profil
                </a>
            </div>
        </div>
    </div>
</div>

{{-- Modal Cropper --}}
<div class="modal fade" id="cropperModal" tabindex="-1" aria-labelledby="cropperModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form id="cropperForm" action="{{ route('akun.photo.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Atur Foto Profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <img id="preview-crop" src="" alt="Preview" style="max-width: 100%; max-height: 300px; display: block; margin: 0 auto;">
                    <input type="hidden" name="cropped_image" id="cropped_image">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const input = document.getElementById('photo-input');
    const modal = new bootstrap.Modal(document.getElementById('cropperModal'));
    const preview = document.getElementById('preview-crop');
    let cropper;

    input.addEventListener('change', (e) => {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = () => {
                preview.src = reader.result;
                modal.show();

                setTimeout(() => {
                    cropper?.destroy();
                    cropper = new Cropper(preview, {
                        aspectRatio: 1,
                        viewMode: 1,
                        dragMode: 'move',
                        background: false,
                        autoCropArea: 1,
                    });
                }, 300);
            };
            reader.readAsDataURL(file);
        }
    });

    document.getElementById('cropperForm').addEventListener('submit', function (e) {
        e.preventDefault();

        cropper.getCroppedCanvas().toBlob(blob => {
            const form = e.target;
            const formData = new FormData(form);
            formData.delete('cropped_image');
            formData.append('photo', blob, 'cropped.jpg');

            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                }
            }).then(() => location.reload());
        }, 'image/jpeg', 0.9);
    });
</script>
@endsection
