@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css" rel="stylesheet">
    <style>
        .nav-tabs {
            border-bottom: 2px solid #007bff;
        }
        .nav-tabs .nav-link {
            background-color: #f8f9fa;
            color: #007bff;
            border: 1px solid #007bff;
            border-radius: 5px 5px 0 0;
            margin-right: 5px;
            transition: all 0.3s ease;
        }
        .nav-tabs .nav-link:hover {
            background-color: #007bff;
            color: white;
        }
        .nav-tabs .nav-link.active {
            background-color: #007bff;
            color: white;
            border-bottom: 2px solid white;
        }
        .tab-content {
            border: 1px solid #ddd;
            border-top: none;
            padding: 20px;
            background: #ffffff;
            border-radius: 0 0 5px 5px;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
        }
        .status-card {
            background: white;
            width: 600px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .status-header {
            background: #5d8aa8;
            color: white;
            padding: 10px;
            border-radius: 10px;
            font-size: 18px;
        }
        .progress-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 20px 0;
        }
        .step {
            text-align: center;
            flex: 1;
            position: relative;
        }
        .step .icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #ddd;
            border: 2px solid #ccc;
            margin: 0 auto 5px;
        }
        .step.active .icon {
            background: #5d8aa8;
            border: 2px solid #5d8aa8;
        }
        .step p {
            color: #bbb;
        }
        .step.active p {
            color: #5d8aa8;
        }
        .progress-line {
            position: absolute;
            top: 25px;
            left: 50%;
            width: 100%;
            height: 4px;
            background: #ccc;
            z-index: -1;
        }
        .button-container {
        display: flex;
        gap: 10px;
        justify-content: center;
        margin-top: 20px;
    }
    .button-container button {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 10px 20px;
        border: none;
        border-radius: 25px;
        font-size: 14px;
        font-weight: bold;
        transition: all 0.3s ease;
        cursor: pointer;
    }
    .btn-danger {
        background-color: #d9534f;
        color: white;
    }
    .btn-danger:hover {
        background-color: #c9302c;
    }
    .btn-warning {
        background-color: #b3a07f;
        color: white;
    }
    .btn-warning:hover {
        background-color: #998c6b;
    }
    .btn-secondary {
        background-color: #b3a07f;
        color: white;
        opacity: 0.7;
        cursor: not-allowed;
    }
    .btn-secondary:enabled:hover {
        background-color: #998c6b;
    }
    .button-container button img {
        width: 16px;
        height: 16px;
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
            <h3 class="fw-bold">USULAN PENGAJUAN SURAT KETERANGAN BELUM MENIKAH</h3>
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
          
            <div class="status-card">
    <div class="status-header">
        <h3>Surat Keterangan Belum Menikah</h3>
        <span id="no-surat">No. Surat: 00000000000000</span>
    </div>

    <div class="progress-bar">
        <div class="step active" id="step-diajukan">
            <div class="icon">
                <img src="{{ asset('images/diajukan.png') }}" alt="Diajukan">
            </div>
            <p>Diajukan</p>
            <span class="timestamp"></span> 
        </div>
        <div class="progress-line"></div>
        <div class="step" id="step-diproses">
            <div class="icon">
                <img src="{{ asset('images/diproses.png') }}" alt="Diproses">
            </div>
            <p>Diproses</p>
        </div>
        <div class="progress-line"></div>
        <div class="step" id="step-disetujui">
            <div class="icon">
                <img src="{{ asset('images/disetujui.png') }}" alt="Disetujui">
            </div>
            <p>Disetujui</p>
        </div>
    </div>

    <div class="button-container">
        <button class="btn-danger" onclick="hapusSurat()">
            <img src="{{ asset('images/Hapus.png') }}" alt="Hapus"> 
        </button>
        <button class="btn-warning" onclick="lihatSurat()">
            <img src="{{ asset('images/Lihat.png') }}" alt="Lihat">
        </button>
        <button class="btn-secondary" id="btn-cetak" onclick="cetakSurat()" disabled>
            <img src="{{ asset('images/Cetak Surat.png') }}" alt="Cetak Surat"> 
        </button>
    </div>
</div>


    <script>
        let statusIndex = 0;
    const steps = document.querySelectorAll('.step');
    const btnCetak = document.getElementById('btn-cetak');

    function nextStatus() {
        if (statusIndex < 2) {
            steps[statusIndex].classList.remove('active');
            statusIndex++;
            steps[statusIndex].classList.add('active');

            // Aktifkan tombol cetak jika sudah disetujui
            if (statusIndex === 2) {
                btnCetak.classList.add('active');
                btnCetak.disabled = false;
            }
        }
    }

    function hapusSurat() {
        alert("Surat berhasil dihapus.");
        location.reload();
    }

    function lihatSurat() {
        alert("Menampilkan detail surat...");
        nextStatus(); // Lanjut ke status berikutnya saat tombol lihat diklik
    }

    function cetakSurat() {
        if (statusIndex === 2) {
            alert("Mencetak surat...");
        } else {
            alert("Surat belum disetujui!");
        }
    }
    </script>
    
    <div class="tab-pane fade" id="deskripsi">
            <h3 class="fw-bold">PENGAJUAN SURAT KETERANGAN BELUM MENIKAH</h3>
            <p>Surat Keterangan Belum Menikah adalah sebuah dokumen resmi yang menyatakan bahwa seseorang belum pernah menikah dan berstatus lajang.</p>
            <p><strong>Output:</strong> <span id="output"></span></p>
            <p><strong>Masa berlaku:</strong> <span id="masaBerlaku"></span> tahun</p>
                    <button type="submit" class="btn btn-primary mt-3 flex items-center space-x-2">
                        <img src="{{ asset('images/Ajukan.png') }}" alt="Ajukan" class="w-6 h-6"> 
                    </button>
                </div>

        <div class="tab-pane fade" id="persyaratan">
            <h3 class="fw-bold">PERSYARATAN PENGAJUAN</h3>
            <ol>
                <li>Fotokopi KTP</li>
                <li>Fotokopi Kartu Keluarga</li>
                <li>Surat Keterangan dari RT/RW</li>
                <li>Surat Keterangan dari pengadilan agama</li>
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
                    <h5 class="modal-title" id="formModalLabel">Usulan Pengajuan Surat Keterangan Belum Menikah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="suratForm">
                        <div class="form-group mb-3">
                            <label>No. Surat</label>
                            <div class="d-flex gap-2">
                                <input type="text" class="form-control w-25" placeholder="No. Surat">
                                <input type="text" value="419.407" disabled class="form-control w-25">
                                <input type="text" value="2024" disabled class="form-control w-25">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Tanggal Surat</label>
                            <input type="date" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>NIK</label>
                            <div class="d-flex gap-2">
                                <input type="text" id="nikInput" class="form-control" placeholder="Masukkan 16 Digit NIK">
                                <button type="button" class="btn btn-secondary" id="searchNikBtn">CARI</button>
                            </div>
                            <small id="nikError" class="text-danger d-none">NIK tidak valid atau tidak ditemukan.</small>
                        </div>

                        <div class="form-group mb-3">
                            <label>No. KK</label>
                            <input type="text" class="form-control" placeholder="Masukkan 16 Digit No.KK">
                        </div>

                        <div class="form-group mb-3">
                            <label>Nama</label>
                            <input type="text" class="form-control" placeholder="Nama Lengkap">
                        </div>

                        <div class="form-group mb-3">
                            <label>Kegunaan</label>
                            <textarea class="form-control" placeholder="Kegunaan"></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label>Surat Pengantar</label>
                            <input type="file" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">
                            <img src="{{ asset('images/save changes.png') }}" alt="Save Changes" class="w-6 h-6"> 
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#searchNikBtn').click(function () {
            var nik = $('#nikInput').val().trim();
            
            if (nik.length !== 16 || isNaN(nik)) {
                $('#nikError').text('NIK harus terdiri dari 16 digit angka.').removeClass('d-none');
                return;
            }

            $('#nikError').addClass('d-none');

            $.ajax({
                url: '/search-nik',
                type: 'GET',
                data: { nik: nik },
                success: function (response) {
                    if (response.status === 'success') {
                        $('#nikError').addClass('d-none');
                        $('input[placeholder="Nama Lengkap"]').val(response.data.nama);
                        $('input[placeholder="Masukkan 16 Digit No.KK"]').val(response.data.no_kk);
                    } else {
                        $('#nikError').text(response.message).removeClass('d-none');
                    }
                },
                error: function () {
                    $('#nikError').text('Terjadi kesalahan, coba lagi.').removeClass('d-none');
                }
            });
        });
    });
</script>
