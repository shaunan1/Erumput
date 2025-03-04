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

<!-- SECTION PENCAPAIAN, INFORMASI, KEGIATAN, GALERI -->
<section class="py-5" style="background-color: #FFFFFF; height: 100vh; display: flex; align-items: center;">
    <div class="container text-center">
        <h2 class="mb-4 fw-bold text-uppercase" style="color: #A67C52;">Pencapaian, Informasi, Kegiatan, dan Galeri</h2>
        
        <div class="carousel slide position-relative" id="horizontalCarousel" data-bs-ride="carousel">
            <div class="carousel-inner shadow-lg rounded-4">

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const carousel = document.querySelector('#horizontalCarousel');
        const carouselItems = carousel.querySelectorAll('.carousel-item');

        carouselItems.forEach((item, index) => {
            item.addEventListener('click', () => {
                switch (index) {
                    case 0: // Slide "Pencapaian"
                        window.location.href = '#pencapaian'; // Ganti dengan link halaman pencapaian
                        break;
                    case 1: // Slide "Informasi"
                        window.location.href = '#informasi'; // Ganti dengan link halaman informasi
                        break;
                    case 2: // Slide "Kegiatan"
                        window.location.href = '#kegiatan'; // Ganti dengan link halaman kegiatan
                        break;
                    case 3: // Slide "Galeri"
                        window.location.href = '#galeri'; // Ganti dengan link halaman galeri
                        break;
                }
            });
        });
    });
</script>

                <!-- Slide 1: PENCAPAIAN -->
                <div class="carousel-item active">
                <h4 class="mb-4 fw-semibold" style="color: #A67C52;">Pencapaian</h4>
                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ url('/pencapaian') }}" class="content-box"></a>
                    <a href="{{ url('/pencapaian') }}" class="content-box light"></a>
                    <a href="{{ url('/pencapaian') }}" class="content-box"></a>
                </div>
                </div>


                <!-- Slide 2: INFORMASI -->
                    <div class="carousel-item">
                        <h4 class="mb-4 fw-semibold" style="color: #A67C52;">Informasi</h4>
                        <div class="d-flex justify-content-center gap-3">
                            <a href="{{ url('/informasi') }}" class="content-box light"></a>
                            <a href="{{ url('/informasi') }}" class="content-box"></a>
                            <a href="{{ url('/informasi') }}" class="content-box light"></a>
                        </div>
                    </div>

            <!-- Slide 3: KEGIATAN -->
                <div class="carousel-item">
                <h4 class="mb-4 fw-semibold" style="color: #A67C52;">Kegiatan</h4>
                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ url('/kegiatan') }}" class="content-box"></a>
                    <a href="{{ url('/kegiatan') }}" class="content-box light"></a>
                    <a href="{{ url('/kegiatan') }}" class="content-box"></a>
                    </div>
                </div>

            <!-- Slide 4: GALERI -->
                <div class="carousel-item">
                <h4 class="mb-4 fw-semibold" style="color: #A67C52;">Galeri</h4>
                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ url('/galeri') }}" class="content-box light"></a>
                    <a href="{{ url('/galeri') }}" class="content-box"></a>
                    <a href="{{ url('/galeri') }}" class="content-box light"></a>
                </div>
                </div>

            </div>

            <!-- Navigasi Carousel di Tengah Pinggir -->
            <button class="carousel-control-prev custom-nav" type="button" data-bs-target="#horizontalCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next custom-nav" type="button" data-bs-target="#horizontalCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>
</section>

<!-- CSS untuk Tampilan dengan Navigasi Tengah Pinggir -->
<style>
    /* Background utama putih */
    section {
        background: #FFFFFF;
    }

    /* Box konten */
    .content-box {
        width: 260px;
        height: 190px;
        background: #F3E5D0;
        border-radius: 20px;
        box-shadow: 4px 4px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out;
        border: 3px solid #A67C52;
    }

    .content-box.light {
        background: #E8D8C3;
    }

    .content-box:hover {
        transform: scale(1.05);
        box-shadow: 6px 6px 20px rgba(0, 0, 0, 0.2);
    }

    /* Tombol Navigasi di Tengah Pinggir */
    .custom-nav {
        width: 55px;
        height: 55px;
        background-color: #A67C52;
        border-radius: 50%;
        opacity: 0.85;
        transition: opacity 0.3s;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
    }

    .custom-nav:hover {
        opacity: 1;
    }

    .carousel-control-prev {
        left: -60px; /* Menggeser tombol kiri ke luar carousel */
    }

    .carousel-control-next {
        right: -60px; /* Menggeser tombol kanan ke luar carousel */
    }

    .carousel-inner {
        background: #FAF6F0;
        padding: 30px;
        border-radius: 15px;
    }
</style>





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
                <div class="d-flex justify-content-center mt-3">
                    <div class="mx-2" style="width: 150px; height: 100px; background: url('https://via.placeholder.com/150') center center / cover; border-radius: 10px;"></div>
                    <div class="mx-2" style="width: 150px; height: 100px; background: url('https://via.placeholder.com/150') center center / cover; border-radius: 10px;"></div>
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