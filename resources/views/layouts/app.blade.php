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
            .navbar-custom {
                background-color: white;
                padding: 10px 20px;
                box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
                position: fixed;
                width: 100%;
                top: 0;
                z-index: 1000;
            }

            .btn-custom {
                background-color: #b59d6a;
                color: white;
                border-radius: 10px;
                padding: 8px 15px;
                border: none;
            }

            .btn-custom:hover {
                background-color: #a0895a;
            }

            .sidebar {
                width: 250px;
                background: #f8f9fa;
                padding: 20px;
                height: 100vh;
                position: fixed;
                left: 0;
                top: 60px; /* Adjusted to account for navbar height */
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
                margin-left: 250px; /* Adjusted to account for sidebar width */
                padding: 20px;
                margin-top: 60px; /* Adjusted to account for navbar height */
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
        </style>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('assets/esuket.png') }}" alt="E-SUKET Logo" height="30">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="btn btn-custom" href="{{ url('/') }}">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-custom" href="#">Ajukan Surat</a>
                        </li>
                    </ul>
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
        <a href="{{ route('skkelahiran.warga') }}" 
           class="list-group-item d-flex align-items-center {{ request()->is('skkelahiran') ? 'active' : '' }}">
            <img src="{{ asset('images/component31.png') }}" alt="Surat Keterangan Kelahiran" class="img-fluid rounded me-2" width="30">
            
        </a>
        <a href="{{ route('skkelahiran.warga') }}" 
           class="list-group-item d-flex align-items-center {{ request()->is('skkelahiran') ? 'active' : '' }}">
            <img src="{{ asset('images/component33.png') }}" alt="Surat Keterangan Kelahiran" class="img-fluid rounded me-2" width="30">
        
        </a>
        <a href="{{ route('skkematian.warga') }}" 
           class="list-group-item d-flex align-items-center {{ request()->is('skkematian') ? 'active' : '' }}">
            <img src="{{ asset('images/component34.png') }}" alt="Surat Keterangan Kematian" class="img-fluid rounded me-2" width="30">
            
        </a>
        <a href="{{ route('skusaha.warga') }}" 
           class="list-group-item d-flex align-items-center {{ request()->is('skusaha') ? 'active' : '' }}">
            <img src="{{ asset('images/component35.png') }}" alt="Surat Keterangan Usaha" class="img-fluid rounded me-2" width="30">
            
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


        <div class="content">
            @yield('content')
        </div>
    </body>

    </html>