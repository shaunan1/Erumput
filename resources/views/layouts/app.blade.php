    <!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'E-SUKET') }}</title>

        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <style>
        /* Navbar */
.navbar {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 60px; /* Sesuaikan dengan tinggi navbar */
    background: white; /* Pastikan warna latar */
    z-index: 1000; /* Pastikan lebih tinggi dari sidebar */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

    .btn-custom {
        background-color: #b59d6a;
        color: white;
        border-radius: 10px;
        padding: 10px 20px;
        font-weight: bold;
        transition: all 0.3s ease-in-out;
    }

    .btn-custom:hover {
        background-color: #a0895a;
        transform: scale(1.05);
    }

    .profile-btn {
        border-radius: 10px;
        padding: 8px 15px;
        font-weight: bold;
        display: flex;
        align-items: center;
        transition: all 0.3s ease-in-out;
    }

    .profile-btn:hover {
        background-color: #e0e0e0;
        transform: scale(1.05);
    }

    .sidebar {
    width: 250px;
    background: #f8f9fa;
    padding: 20px;
    height: 100vh; /* Pastikan sidebar penuh */
    position: fixed;
    left: 0;
    top: 60px; /* Sesuaikan dengan tinggi navbar */
    overflow-y: auto; /* Tambahkan scrollbar jika kontennya panjang */
}

/* Sidebar */
.sidebar {
    position: fixed;
    top: 60px; /* Sesuaikan dengan tinggi navbar */
    left: -100%;
    width: 250px;
    height: calc(100vh - 60px); /* Sesuaikan dengan tinggi layar dikurangi navbar */
    background: #f8f9fa;
    z-index: 999; /* Pastikan lebih rendah dari navbar */
    transition: left 0.3s ease-in-out;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
}

/* Jika sidebar terbuka */
.sidebar.show {
    left: 0;
}

            .sidebar a {
                display: block;
                width: 200px;
                margin: 15px 0;
                transition: transform 0.3s ease-in-out;
                text-decoration: none;
                color: inherit;
            }

            .sidebar a:hover, .sidebar a.active {
                transform: scale(1.1);
            }

            .sidebar img {
                width: 100%;
                height: auto;
            }

            .content {
                margin-left: 0;
                padding: 20px;
                margin-top: 60px;
                transition: margin-left 0.3s ease-in-out;
            }

            .list-group-item {
                border: none;
                padding: 10px 15px;
                border-radius: 10px;
                margin-bottom: 5px;
                display: flex;
                align-items: center;
            }

            .list-group-item.active {
                background-color: #b59d6a;
                color: white;
            }

            .list-group-item .badge {
                border-radius: 3px;
            }

            body {
                padding-top: 60px; /* Sesuaikan dengan tinggi navbar */
            }

            /* Jika sidebar terbuka, geser konten */
@media (max-width: 768px) {
    .sidebar {
        width: 65%; /* Sidebar lebih kecil di layar kecil */
    }
    .content {
        margin-left: 0; /* Jangan geser konten di mobile */
    }
}

@media (min-width: 768px) {
    .sidebar {
        left: 0;
        width: 250px;
    }
    .content {
        margin-left: 250px;
    }
}


            /* Tombol menu (hamburger) di mobile */
                #toggleSidebar {
                    display: block;
                }
            /* Atur tabel agar tidak keluar batas */
                .table-responsive {
                    overflow-x: auto;
                }    
        </style>
    </head>

    <body>
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
    <div class="container">
    <button class="btn btn-outline-secondary d-md-none" id="toggleSidebar">
    ☰ Menu
    </button>
        <a class="navbar-brand" href="{{ url('/warga') }}">
            <img src="{{ asset('assets/esuket.png') }}" alt="E-SUKET Logo" height="30">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item mx-2">
                    <a class="btn btn-custom" href="{{ url('/warga') }}">Beranda</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="btn btn-custom" href="#">Ajukan Surat</a>
                </li>
            </ul>
        </div>
        <div class="d-flex align-items-center">
            @auth
                <a class="btn btn-outline-secondary profile-btn" href="{{ route('profile') }}">
                <img src="{{ Auth::user()->profile_image ? asset(Auth::user()->profile_image) : asset('assets/profil.png') }}" 
                alt="{{ Auth::user()->name }}" height="30" class="me-2">

                </a>
            @else
                <a class="btn btn-outline-secondary profile-btn" href="{{ route('login') }}">
                    Masuk
                </a>
            @endauth
        </div>  
    </div>
</nav>

        <div class="sidebar">
    <h5 class="fw-bold mb-3 d-flex align-items-center">
        <img src="{{ asset('images/icon.png') }}" alt="Icon" class="me-2 small-icon">
        Jenis Surat
        <style>
            .sidebar h5 img {
                width: 25px; /* Sesuaikan ukuran sesuai kebutuhan */
                    height: auto;}
        </style>
    </h5>
    <div class="list-group w-100">
        <a href="{{ route('skbn.warga') }}" 
           class="list-group-item d-flex align-items-center {{ request()->is('skbn') ? 'active' : '' }}">
            <img src="{{ asset('images/component27.png') }}" alt="Surat Keterangan Belum Nikah" class="img-fluid rounded me-2" width="30">
            
        </a>
        <a href="{{ route('skhsl.warga') }}" 
           class="list-group-item d-flex align-items-center {{ request()->is('skhsl') ? 'active' : '' }}">
            <img src="{{ asset('images/component28.png') }}" alt="Surat Keterangan Penghasilan" class="img-fluid rounded me-2" width="30">
        
        </a>
        <a href="{{ route('sktm.warga') }}" 
           class="list-group-item d-flex align-items-center {{ request()->is('sktm') ? 'active' : '' }}">
            <img src="{{ asset('images/component29.png') }}" alt="Surat Keterangan Miskin" class="img-fluid rounded me-2" width="30">
            
        </a>
        <a href="{{ route('skboro.warga') }}" 
           class="list-group-item d-flex align-items-center {{ request()->is('skboro') ? 'active' : '' }}">
            <img src="{{ asset('images/component30.png') }}" alt="Surat Keterangan Boro" class="img-fluid rounded me-2" width="30">
            
        </a>
        <a href="{{ route('skdom.warga') }}" 
           class="list-group-item d-flex align-items-center {{ request()->is('skdom') ? 'active' : '' }}">
            <img src="{{ asset('images/component34.png') }}" alt="Surat Keterangan Domisili" class="img-fluid rounded me-2" width="30">
            
        </a>
        <a href="{{ route('skkelahiran.warga') }}" 
           class="list-group-item d-flex align-items-center {{ request()->is('skkelahiran') ? 'active' : '' }}">
            <img src="{{ asset('images/component31.png') }}" alt="Surat Keterangan Kelahiran" class="img-fluid rounded me-2" width="30">
        
        </a>
        <a href="{{ route('skkematian.warga') }}" 
           class="list-group-item d-flex align-items-center {{ request()->is('skkematian') ? 'active' : '' }}">
            <img src="{{ asset('images/component32.png') }}" alt="Surat Keterangan Kematian" class="img-fluid rounded me-2" width="30">
            
        </a>
        <a href="{{ route('skusaha.warga') }}" 
           class="list-group-item d-flex align-items-center {{ request()->is('skusaha') ? 'active' : '' }}">
            <img src="{{ asset('images/component33.png') }}" alt="Surat Keterangan Usaha" class="img-fluid rounded me-2" width="30">
            
        </a>
        <a href="{{ route('suket.warga') }}" 
           class="list-group-item d-flex align-items-center {{ request()->is('suket') ? 'active' : '' }}">
            <img src="{{ asset('images/component35.png') }}" alt="Surat Keterangan Umum" class="img-fluid rounded me-2" width="30">
            
        </a>
        <style>
            .list-group-item.active {
             background-color: #b59d6a !important;
                color: white !important;
                font-weight: bold;}
        </style>
    </div>
</div>

<script>
    document.getElementById("toggleSidebar").addEventListener("click", function () {
        let sidebar = document.querySelector(".sidebar");
        let content = document.querySelector(".content");

        sidebar.classList.toggle("show");

        // Jika sidebar terbuka di layar besar, geser konten
        if (window.innerWidth >= 768) {
            if (sidebar.classList.contains("show")) {
                content.style.marginLeft = "250px"; // Sesuaikan dengan sidebar
            } else {
                content.style.marginLeft = "0";
            }
        }
    });
</script>



        <div class="content">
            @yield('content')
        </div>
    </body>

    </html>