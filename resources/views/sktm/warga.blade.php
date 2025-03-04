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
    <ul class="nav nav-tabs" id="skbnTabs">
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
            <h3 class="fw-bold">USULAN PENGAJUAN SURAT KETERANGAN TIDAK MAMPU</h3>
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
            <h3 class="fw-bold">PENGAJUAN SURAT KETERANGAN TIDAK MAMPU</h3>
            <p>Surat Keterangan Tidak Mampu adalah </p>
            <p><strong>Output:</strong> <span id="output"></span></p>
            <p><strong>Masa berlaku:</strong> <span id="masaBerlaku"></span> tahun</p>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal">Ajukan</button>
        </div>

        <div class="tab-pane fade" id="persyaratan">
            <h3 class="fw-bold">PERSYARATAN PENGAJUAN</h3>
            <ol>
                <li>Fotokopi KTP</li>
                <li>Fotokopi Kartu Keluarga</li>
                <li>Surat Pengantar dari RT/RW</li>
                <li>Pas Foto ukuran 3x4 cm</li>
            </ol>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal">Ajukan</button>
        </div>
    </div>

    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel">Usulan Pengajuan Surat Keterangan Tidak Mampu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>No. Surat</label>
                            <input type="text" class="small-input"> 
                            <input type="text" value="419.407" disabled>
                            <input type="text" value="2024" disabled>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Surat</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>NIK</label>
                            <input type="text" class="form-control" placeholder="Masukkan 16 Digit NIK">
                            <button type="button" class="btn btn-secondary">CARI</button>
                        </div>
                        <div class="form-group">
                            <label>No. KK</label>
                            <input type="text" class="form-control" placeholder="Masukkan 16 Digit No.KK">
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" placeholder="Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <label>Kegunaan</label>
                            <textarea class="form-control" placeholder="Kegunaan"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Surat Pengantar</label>
                            <input type="file" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">
                            <img src="{{ asset('images/save changes.png') }}" alt="Save Changes" style="width: 24px; height: 24px;"> Save Changes
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("output").textContent = "Surat Keterangan Tidak Mampu";
            document.getElementById("masaBerlaku").textContent = "1";
        });
    </script>
@endpush
