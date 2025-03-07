@extends('layouts.app')

@section('title', 'Surat Keterangan')

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css" rel="stylesheet">
    <style>
        .nav-tabs .nav-link {
            background-color: #007bff;
            color: white;
        }
        .nav-tabs .nav-link.active {
            background-color: #007bff;
            color: white;
        }
    </style>
@endpush

@section('content')
    <ul class="nav nav-tabs" id="skusahaTabs">
        <li class="nav-item">
            <a class="nav-link active" id="status-tab" data-bs-toggle="tab" href="#status">STATUS</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="deskripsi-tab" data-bs-toggle="tab" href="#deskripsi">DESKRIPSI</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="persyaratan-tab" data-bs-toggle="tab" href="#persyaratan">PERSYARATAN</a>
        </li>
    </ul>

    <div class="tab-content mt-3">
        <div class="tab-pane fade show active" id="status">
            <h3 class="fw-bold">USULAN PENGAJUAN SURAT KETERANGAN USAHA</h3>
            <br>
            <div class="d-flex gap-2">
                <button type="button" class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#formModal">
                    <i class="ri-add-circle-fill me-2"></i><span>Tambah</span>
                </button>
                <button class="btn btn-secondary d-flex align-items-center" onclick="location.reload()">
                    <i class="ri-refresh-line me-2"></i><span>Reload</span>
                </button>
            </div>
            <br>
            <div class="card card-body">
                <div class="table-responsive">
                    <table id="tableSurat" class="table table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Surat</th>
                                <th>NIK</th>
                                <th>Tanggal</th>
                                <th>Peruntukan</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="tab-pane fade" id="deskripsi">
            <h3 class="fw-bold">PENGAJUAN SURAT KETERANGAN USAHA</h3>
            <p>Surat Keterangan Usaha adalah dokumen resmi yang menerangkan bahwa pemohon memiliki usaha tertentu. Surat ini sering digunakan untuk keperluan seperti pengajuan pinjaman usaha atau administrasi lainnya.</p>            <p><strong>Output:</strong> <span id="output"></span></p>
            <p><strong>Masa berlaku:</strong> <span id="masaBerlaku"></span> tahun</p>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal">Ajukan</button>
        </div>

        <div class="tab-pane fade" id="persyaratan">
            <h3 class="fw-bold">PERSYARATAN PENGAJUAN</h3>
            <ol>
                <li>Fotokopi KTP</li>
                <li>Fotokopi Kartu Keluarga</li>
                <li>Surat pengantar dari RT/RW</li>
                <li>Surat keterangan usaha dari desa/kelurahan</li>
            </ol>
            <button type="submit" class="btn btn-primary mt-3 flex items-center space-x-2">
                    <img src="{{ asset('images/Ajukan.png') }}" alt="Ajukan" class="w-6 h-6"> 
                </button>
            </div>
        </div>
        
    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Usulan Pengajuan Surat Keterangan Usaha</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="suratForm">
                    <div class="form-group mb-3">
                        <label>No. Surat</label>
                        <div class="flex items-center space-x-2">
                            <input type="text" class="small-input w-1/3 border-gray-300 rounded-lg" placeholder="No. Surat">
                            <input type="text" value="419.407" disabled class="w-1/3 border-gray-300 rounded-lg">
                            <input type="text" value="2024" disabled class="w-1/3 border-gray-300 rounded-lg">
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label>Tanggal Surat</label>
                        <input type="date" class="form-control border-gray-300 rounded-lg">
                    </div>

                    <div class="form-group mb-3">
                        <label>NIK</label>
                        <div class="flex items-center space-x-2">
                            <input type="text" id="nikInput" class="form-control border-gray-300 rounded-lg" placeholder="Masukkan 16 Digit NIK">
                            <button type="button" class="btn btn-secondary" id="searchNikBtn">CARI</button>
                        </div>
                        <small id="nikError" class="text-red-500 hidden">NIK tidak valid atau tidak ditemukan.</small>
                    </div>

                    <div class="form-group mb-3">
                        <label>No. KK</label>
                        <input type="text" class="form-control border-gray-300 rounded-lg" placeholder="Masukkan 16 Digit No.KK">
                    </div>

                    <div class="form-group mb-3">
                        <label>Nama</label>
                        <input type="text" class="form-control border-gray-300 rounded-lg" placeholder="Nama Lengkap">
                    </div>

                    <div class="form-group mb-3">
                        <label>Kegunaan</label>
                        <textarea class="form-control border-gray-300 rounded-lg" placeholder="Kegunaan"></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label>Surat Pengantar</label>
                        <input type="file" class="form-control border-gray-300 rounded-lg">
                    </div>

                    <button type="submit" class="btn btn-primary mt-3 flex items-center space-x-2">
                        <img src="{{ asset('images/save changes.png') }}" alt="Save Changes" class="w-6 h-6"> 
                    </button>
                </form>
            </div>
        </div>

<script>
    document.getElementById('searchNikBtn').addEventListener('click', function() {
        const nikInput = document.getElementById('nikInput').value;
        const nikError = document.getElementById('nikError');

        if (nikInput.length !== 16 || isNaN(nikInput)) {
            nikError.textContent = 'NIK harus terdiri dari 16 digit angka.';
            nikError.classList.remove('hidden');
            return;
        }

        nikError.classList.add('hidden');

        // Simulasi pencarian (replace dengan AJAX/Fetch API jika ada backend)
        fetch(`/api/cari-nik/${nikInput}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('NIK tidak ditemukan.');
                }
                return response.json();
            })
            .then(data => {
                alert(`Data ditemukan: Nama: ${data.nama}, No KK: ${data.noKK}`);
                // Isi formulir dengan data hasil pencarian
            })
            .catch(error => {
                nikError.textContent = error.message;
                nikError.classList.remove('hidden');
            });
    });
</script>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("output").textContent = "Surat Keterangan Usaha";
            document.getElementById("masaBerlaku").textContent = "1";
        });
    </script>
@endpush
