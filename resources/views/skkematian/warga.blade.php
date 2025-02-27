@extends('layouts.warga')

@section('title', 'Surat Keterangan')

@section('content')
    @push('styles')
        <link href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css" rel="stylesheet">
        <style>
            .nav-tabs .nav-link {
                background-color:rgb(23, 173, 23);
                color: white;
            }
            .nav-tabs .nav-link.active {
                background-color:rgb(23, 173, 23);
                color: white;
            }
        </style>
    @endpush

    <div class="container">
        <!-- HEADER -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
            <a class="navbar-brand fw-bold text-warning" href="#">E - SUKET</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="pelayananDropdown" role="button" data-bs-toggle="dropdown">Pelayanan Warga</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Surat Keterangan Belum Menikah</a></li>
                            <li><a class="dropdown-item" href="#">Surat Keterangan Domisili</a></li>
                            <li><a class="dropdown-item" href="#">Surat Keterangan Boro</a></li>
                            <li><a class="dropdown-item" href="#">Surat Keterangan Tidak Mampu</a></li>
                            <li><a class="dropdown-item" href="#">Surat Keterangan Penghasilan</a></li>
                            <li><a class="dropdown-item" href="#">Surat Keterangan Usaha</a></li>
                            <li><a class="dropdown-item" href="#">Surat Keterangan Kelahiran</a></li>
                            <li><a class="dropdown-item" href="#">Surat Keterangan</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-secondary" onclick="window.location.href='/'">Beranda</button>
                    </li>
                    <li class="nav-item">
                        <img src="/path/to/profile.jpg" alt="Foto Profil" class="rounded-circle" width="40" height="40">
                    </li>
                </ul>
            </div>
        </nav>

        <!-- TABS -->
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
            <!-- STATUS -->
            <div class="tab-pane fade show active" id="status">
                <h3 class="fw-bold">USULAN PENGAJUAN SURAT KETERANGAN KEMAIAN</h3>
                <br>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#modalTambah">
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
            
            <!-- DESKRIPSI -->  
            <div class="tab-pane fade" id="deskripsi">
                <h3 class="fw-bold">PENGAJUAN SURAT KETERANGAN KEMATIAN</h3>
                <p>Surat Keterangan Kematian adalah surat yang menerangkan belum pernah menikah alias berstatus lajang.</p>
                <p><strong>Output:</strong> <span id="output"></span></p>
                <p><strong>Masa berlaku:</strong> <span id="masaBerlaku"></span> tahun</p>
                <button class="btn btn-primary">Ajukan</button>
            </div>

            <!-- PERSYARATAN -->
            <div class="tab-pane fade" id="persyaratan">
                <h3 class="fw-bold">PERSYARATAN PENGAJUAN</h3>
                <ol>
                    <li>Fotokopi KTP</li>
                    <li>Fotokopi Kartu Keluarga</li>
                    <li>Surat Pengantar dari RT/RW</li>
                    <li>Pas Foto ukuran 3x4 cm</li>
                </ol>
                <button class="btn btn-primary">Ajukan</button>
            </div>
        </div>
    </div>

    @include('modals.skbn-add-modal')

    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                document.getElementById("output").textContent = "Surat Keterangan Kematian ";
                document.getElementById("masaBerlaku").textContent = "1";
            });
        </script>
    @endpush
@endsection
