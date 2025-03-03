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
            display: flex;
            flex-direction: column;
            align-items: center;
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
            <img src="{{ asset('assets/icon-envelope.png') }}" alt="Icon" class="me-2" width="20">
            Jenis Surat
        </h5>
        <div class="list-group w-100">
            <a href="#" class="list-group-item active d-flex align-items-center">
                <img src="{{ asset('assets/images/surat-belum-menikah.png') }}" alt="" class="img-fluid rounded me-2" width="50">
                <span>Surat Keterangan Belum Menikah</span>
            </a>
            <a href="#" class="list-group-item d-flex align-items-center">
                <span class="badge bg-primary me-2" style="width: 5px; height: 100%;"></span>
                <span>Surat Keterangan Penghasilan</span>
            </a>
            <a href="#" class="list-group-item d-flex align-items-center">
                <span class="badge bg-primary me-2" style="width: 5px; height: 100%;"></span>
                <span>Surat Keterangan Miskin</span>
            </a>
            <a href="#" class="list-group-item d-flex align-items-center">
                <span class="badge bg-primary me-2" style="width: 5px; height: 100%;"></span>
                <span>Surat Keterangan Boro</span>
            </a>
            <a href="#" class="list-group-item d-flex align-items-center">
                <span class="badge bg-primary me-2" style="width: 5px; height: 100%;"></span>
                <span>Surat Keterangan Kelahiran</span>
            </a>
            <a href="#" class="list-group-item d-flex align-items-center">
                <span class="badge bg-primary me-2" style="width: 5px; height: 100%;"></span>
                <span>Surat Keterangan Kematian</span>
            </a>
            <a href="#" class="list-group-item d-flex align-items-center">
                <span class="badge bg-primary me-2" style="width: 5px; height: 100%;"></span>
                <span>Surat Keterangan Domisili</span>
            </a>
            <a href="#" class="list-group-item d-flex align-items-center">
                <span class="badge bg-primary me-2" style="width: 5px; height: 100%;"></span>
                <span>Surat Keterangan Usaha</span>
            </a>
            <a href="#" class="list-group-item d-flex align-items-center">
                <span class="badge bg-primary me-2" style="width: 5px; height: 100%;"></span>
                <span>Surat Keterangan</span>
            </a>
        </div>
    </div>

    <main class="py-4 flex-grow-1">
        @yield('content')
    </main>
</body>

</html> 