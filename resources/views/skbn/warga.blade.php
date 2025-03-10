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
            <h3>Surat Ket. Belum Menikah</h3>
            <span id="no-surat">No. Surat: </span>
        </div>
        <div class="progress-bar">
                <div class="step" id="step-diajukan">
                        <div class="icon">
                            <img src="{{ asset('images/diajukan.png') }}" alt="Diajukan">
                        </div>
                        <p>Diajukan</p>
                        <div class="timestamp" id="timestamp-diajukan"></div>
                    </div>
                <div class="step" id="step-diproses">
                        <div class="icon">
                            <img src="{{ asset('images/diproses.png') }}" alt="Diproses">
                        </div>
                        <p>Diproses</p>
                        <div class="timestamp" id="timestamp-diproses"></div>
                    </div>
                <div class="step" id="step-disetujui">
                        <div class="icon">
                            <img src="{{ asset('images/disetujui.png') }}" alt="Disetujui">
                        </div>
                        <p>Disetujui</p>
                        <div class="timestamp" id="timestamp-disetujui"></div>
                    </div>
                </div>
                <div class="button-container">
                    <img src="{{ asset('images/Hapus.png') }}" alt="Hapus" title="Hapus">
                    <img src="{{ asset('images/Lihat.png) }}" alt="Lihat" title="Lihat">
                    <img src="{{ asset('images/Cetak Surat.png') }}" alt="Cetak Surat" title="Cetak Surat">
                </div>
            </div>
        </div>

    <script>
        // Simulate status timestamps
        const timestamps = {
            submitted: new Date('2025-03-07T09:00:00'),
            processed: new Date('2025-03-07T12:00:00'),
            approved: null, // Change to a date when the approval step is completed
        };

        document.getElementById('time-submitted').textContent = timestamps.submitted.toLocaleString();
        document.getElementById('time-processed').textContent = timestamps.processed.toLocaleString();
        document.getElementById('time-approved').textContent = timestamps.approved ? timestamps.approved.toLocaleString() : 'Belum Disetujui';

        // Auto-generate a unique number for the letter
        const noSurat = `SN-${Date.now()}`;
        document.getElementById('no-surat').textContent += noSurat;
    </script>
    
<div class="tab-pane fade" id="deskripsi">
    <h3 class="fw-bold">PENGAJUAN SURAT KETERANGAN BELUM MENIKAH</h3>
    <p>Surat Keterangan Belum Menikah (SKBN) adalah surat resmi yang menerangkan bahwa pemohon belum pernah menikah dan masih berstatus lajang. Surat ini sering digunakan untuk berbagai keperluan administratif, seperti syarat pernikahan, melamar pekerjaan, pendaftaran beasiswa, atau keperluan hukum lainnya.</p>
    <p><strong>Output:</strong> Surat Keterangan Belum Menikah dalam bentuk fisik maupun digital</p>
    <p><strong>Masa berlaku:</strong> 6 bulan sejak tanggal penerbitan</p>
    <p><strong>Penerbit:</strong> Kantor Kelurahan atau Desa setempat</p>
    <p><strong>Proses Pengajuan:</strong> Pemohon harus melengkapi persyaratan dan mengajukan permohonan di kantor kelurahan atau secara daring (jika tersedia).</p>
</div>

<div class="tab-pane fade" id="persyaratan">
    <h3 class="fw-bold">PERSYARATAN PENGAJUAN</h3>
    <p>Untuk mengajukan Surat Keterangan Belum Menikah, pemohon harus memenuhi persyaratan berikut:</p>
    <ol>
        <li>Fotokopi Kartu Tanda Penduduk (KTP) yang masih berlaku</li>
        <li>Fotokopi Kartu Keluarga (KK)</li>
        <li>Surat Pengantar dari RT/RW setempat</li>
        <li>Surat Pernyataan Belum Menikah yang ditandatangani di atas materai</li>
        <li>Pas Foto berwarna ukuran 3x4 cm (2 lembar)</li>
        <li>Jika diperlukan, melampirkan Surat Keterangan dari Pengadilan Agama (untuk kasus tertentu)</li>
        <li>Biaya administrasi (jika ada, sesuai dengan kebijakan daerah masing-masing)</li>
    </ol>
    <p><strong>Catatan:</strong> Proses pengajuan dapat berbeda di setiap daerah. Pemohon disarankan untuk mengecek informasi lebih lanjut di kantor kelurahan atau situs resmi pemerintah setempat.</p>
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
