@extends('layouts.warga')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card shadow-lg p-4 rounded-4" style="width: 50rem; background: #F9F9F9;">
        <div class="card-header text-white text-center py-3 rounded-top-4" style="background: #89A2C0;">
            <h4 class="mb-0">Edit Profil</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('profile.edit') }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control border border-secondary rounded-3" name="name" value="{{ old('name', Auth::user()->name) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control border border-secondary rounded-3" name="email" value="{{ old('email', Auth::user()->email) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">No. NIK</label>
                    <input type="text" class="form-control border border-secondary rounded-3" name="nik" value="{{ old('nik', Auth::user()->nik) }}" maxlength="16" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control border border-secondary rounded-3" name="password">
                    <small class="text-muted d-block mt-1">
                        • Panjang minimal 8 karakter <br>
                        • Harus mengandung huruf besar dan kecil (A-a) <br>
                        • Harus menyertakan angka (1,2,3,dst.) <br>
                        • Harus menyertakan simbol ((!),(#),dst.)
                    </small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" class="form-control border border-secondary rounded-3" name="password_confirmation">
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn text-white px-4 rounded-3" style="background: #89A2C0;">
                        <i class="ri-save-3-fill"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
