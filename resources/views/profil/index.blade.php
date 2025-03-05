@extends('layouts.warga')

@section('content')
<div class="container mt-4">
    <div class="card profile-card">
        <div class="card-body">
            <!-- Tombol Kembali -->
            <a href="{{ url()->previous() }}" class="btn btn-link kembali-btn">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>

            <!-- Judul Profil -->
            <h2 class="text-center profile-title">PROFIL PENGGUNA</h2>

            <div class="row mt-4">
                <!-- Kolom Foto Profil -->
                <div class="col-md-4 text-center">
                    <div class="profile-image">
                        <img id="previewImage" src="{{ asset(Auth::user()->photo ? 'storage/' . Auth::user()->photo : 'assets/default-avatar.png') }}" 
                        alt="Foto Profil" class="img-fluid rounded-circle" width="150">
                    </div>

                    <!-- Tombol untuk membuka modal -->
                    <button type="button" class="btn btn-light mt-3" data-bs-toggle="modal" data-bs-target="#editPhotoModal">
                        Edit Foto
                    </button>
                </div>

                <!-- Modal Edit Foto Profil -->
                <div class="modal fade" id="editPhotoModal" tabindex="-1" aria-labelledby="editPhotoModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editPhotoModalLabel">Edit Foto Profil</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center">
                                    <img id="modalPreviewImage" src="{{ asset(Auth::user()->photo ? 'storage/' . Auth::user()->photo : 'assets/default-avatar.png') }}" 
                                        class="img-fluid rounded-circle mb-3" width="150">
                                </div>

                                <form action="{{ route('profile.update-photo') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="photo" id="modalPhotoInput" class="form-control" accept="image/*" onchange="previewFileInModal()">
                                    <button type="submit" class="btn btn-primary w-100 mt-3">Simpan Foto</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kolom Formulir Profil -->
                <div class="col-md-8">
                    <form method="POST" action="{{ route('profile.edit') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="name" placeholder="Nama Panjang" value="{{ Auth::user()->name }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Alamat Email" value="{{ Auth::user()->email }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">No. NIK</label>
                            <input type="text" class="form-control" name="nik" placeholder="Masukkan 16 Digit NIK" value="{{ Auth::user()->nik }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Username" value="{{ Auth::user()->username }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Masukkan Password">
                            <small class="password-rules">
                                • Panjang minimal 8 karakter <br>
                                • Harus mengandung huruf besar & kecil (A-a) <br>
                                • Harus menyertakan angka (1,2,3, dst.) <br>
                                • Harus menyertakan simbol (!@#$%^&*, dst.)
                            </small>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password Anda">
                        </div>

                        <div class="text-end">
    <!-- Tombol Edit & Simpan -->
    <a href="{{ route('profile.edit') }}" class="btn btn-gold">Edit</a>
    <button type="submit" class="btn btn-primary">Simpan</button>
</div>
</form> <!-- Tutup Form Edit Profil -->

<!-- Form Logout yang Terpisah -->
<form method="POST" action="{{ route('logout') }}" class="text-end mt-2">
    @csrf
    <button type="submit" class="btn btn-danger">Logout</button>
</form>

                                </div>
                            </form>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CSS Kustom -->
<style>
    body {
        background-color: #e0e8f0;
    }

    .profile-card {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }

    .kembali-btn {
        font-size: 16px;
        text-decoration: none;
        color: black;
    }

    .profile-title {
        font-weight: bold;
        color: #333;
    }

    .profile-image img {
        width: 100%;
        max-width: 200px;
        border-radius: 10px;
        border: 2px solid #ccc;
    }

    .form-control {
        background: #f8f6f2;
        border-radius: 8px;
        border: 1px solid #c5b28a;
    }

    .password-rules {
        font-size: 12px;
        color: gray;
    }

    .btn-gold {
        background: #b59d6a;
        color: white;
        border-radius: 10px;
        padding: 8px 15px;
        border: none;
    }

    .btn-gold:hover {
        background: #a0895d;
    }
</style>

<script>
function previewFileInModal() {
    var preview = document.getElementById('modalPreviewImage');
    var file = document.getElementById('modalPhotoInput').files[0];
    var reader = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
    };

    if (file) {
        reader.readAsDataURL(file);
    }
}
</script>
@endsection
