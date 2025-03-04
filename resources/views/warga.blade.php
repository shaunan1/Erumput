@extends('layouts.warga')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

<!-- HEADER & WELCOME SECTION -->
<section class="position-relative" style="background: url('{{ asset('assets/landing.png') }}') no-repeat center center; background-size: cover; min-height: 100vh;">
    
<!-- WELCOME SECTION -->
<div class="d-flex flex-column justify-content-center align-items-center text-white pt-5 text-center" 
     style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 90%; max-width: 600px;">
    <h1 class="fw-bold" 
        style="font-family: 'Times New Roman', serif; font-size: 3.5rem; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); letter-spacing: 2px;">
        SELAMAT DATANG
    </h1>
    <h2 class="fw-bold" 
        style="font-family: 'Georgia', serif; font-size: 2.5rem; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); letter-spacing: 1.5px; 
               max-width: 100%; overflow-wrap: break-word; word-break: break-word;">
        {{ auth()->user()->name }}
    </h2>
</div>
</section>

<div class="text-white text-center py-2" style="margin-top: -4px; background-color:rgb(165, 146, 109);"> 
    Pelayanan pengesahan dan pengambilan SK Senin - Jumat 08.00 - 15.00 WIB
</div>

<!-- INFORMASI LAYANAN -->
<section class="py-4" style="background-color: #B8A57E;">
    <div class="container">
        <div class="row align-items-center">
            <!-- Logo & Deskripsi Kiri -->
            <div class="col-md-6 d-flex align-items-center">
                <img src="{{ asset('assets/logo.png') }}" alt="Logo" style="width: 60px; margin-right: 15px;">
                <div>
                    <h6 class="mb-1" style="color: #FFFFFF; font-weight: bold;">Sistem Pelayanan Terpadu Kelurahan</h6>
                    <h6 class="mb-2" style="color: #FFFFFF;">Pemerintah Kota Kediri</h6>
                    <p style="color: #EDE6D3; font-size: 14px;">
                        Merupakan media untuk warga khususnya masyarakat Kota Kediri dalam membuat surat keterangan secara online.
                    </p>
                </div>
            </div>
            <!-- Informasi Kanan -->
            <div class="col-md-6 text-end">
                <h6 class="mb-1" style="color: #FFFFFF; font-weight: bold;">NGURUS SURAT, <br> NGGAK PAKAI RIBET</h6>
                <p style="color: #EDE6D3; font-size: 14px;">
                    E-Suket mempermudah dalam mengajukan berbagai surat keterangan di Kelurahan berbasis NIK Nasional
                </p>
            </div>
        </div>
    </div>
</section>

@include('berita.index')


<!-- PANDUAN & PROFIL -->
<section class="container py-4">
    <div class="row justify-content-center align-items-start">
        <!-- Panduan Mengakses E-SUKET -->
        <div class="col-md-6 mb-3">
            <div class="bg-white p-4 rounded shadow-sm text-center" style="border: 2px solid #E1E1E1;">
                <h5>
                    <span class="me-2" style="background-color: #A3936F; border-radius: 50%; padding: 8px;">
                        <i class="bi bi-camera-video text-white"></i>
                    </span>
                    Panduan Mengakses E-SUKET
                </h5>
        <!-- Space kosong untuk diisi konten -->
        <div class="d-flex justify-content-center align-items-center mt-3">
            <div class="video-container mx-2" style="width: 150px; height: 100px; background-color: #F9F9F9; border-radius: 10px; overflow: hidden;">
                <iframe width="150" height="100" src="https://www.youtube.com/embed/example1" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="video-container mx-2" style="width: 150px; height: 100px; background-color: #F9F9F9; border-radius: 10px; overflow: hidden;">
                <iframe width="150" height="100" src="https://www.youtube.com/embed/example2" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>


        <!-- Profil -->
        <div class="col-md-4">
            <div class="p-3 bg-white rounded shadow-sm text-center" style="border: 2px solid #E1E1E1;">
                <div class="mb-3" style="width: 100px; height: 130px; background: url('https://via.placeholder.com/100x130') center center / cover; border-radius: 10px; margin: 0 auto; border: 1px solid #E1E1E1;"></div>
                <div class="p-2 rounded" style="background-color: #F8F8F8; border: 1px solid #E1E1E1;">
                <p class="mb-0 fw-bold">{{ auth()->user()->nik }}</p>
                    <small class="text-muted">Nomor Induk Kependudukan</small>
                </div>
                <h5 class="mt-3 fw-bold text-uppercase">{{ auth()->user()->name }}</h5>
                <p class="text-muted mb-0">Kelurahan</p>
            </div>
        </div>
    </div>
</section>
<!-- MENU SURAT KETERANGAN -->
<section class="container py-4">
    <div class="row g-3">
        @php
            $surat = [
                27 => 'skbn',
                31 => 'skkelahiran',
                32 => 'skkematian',
                29 => 'sktm',
                30 => 'skboro',
                28 => 'skhsl',
                33 => 'skusaha',
                34 => 'skdom',
                35 => 'suket'
            ];
        @endphp

        @foreach($surat as $id => $jenis)
        <div class="col-md-4 d-flex justify-content-center">
            <a href="{{ url('/warga/'.$jenis) }}" class="btn btn-light shadow-sm w-100">
                <img src="{{ asset('images/component'.$id.'.png') }}" class="img-fluid rounded" alt="Surat Keterangan">
            </a>
        </div>
        @endforeach
    </div>
</section>


<!-- FOOTER -->
<footer class="py-3" style="background-color: rgb(226, 151, 12);">
    <div class="container d-flex justify-content-between align-items-center text-white">
        <p class="mb-0">© 2024 Pemerintah Kota Kediri</p>
        <p class="mb-0">Support by <a href="#" class="text-white text-decoration-none">Dinas Komunikasi dan Informatika Kota Kediri</a></p>
    </div>
</footer>
@endsection