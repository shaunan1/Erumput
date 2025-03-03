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
            background-color: gold;
            color: black;
            border-radius: 10px;
            padding: 8px 20px;
            border: none;
            font-weight: 500;
            margin-right: 10px;
        }

        .btn-custom:hover {
            background-color: darkgoldenrod;
        }

        .profile-icon {
            background-color: black;
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 500;
        }

        .profile-icon i {
            font-size: 18px;
        }

        .navbar-nav {
            gap: 10px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
        <div class="container">
            <!-- Logo E-SUKET -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('assets/esuket.png') }}" alt="E-SUKET Logo" height="30">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-custom" href="{{ url('/') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-custom" href="#">Ajukan Surat</a>
                    </li>
                </ul>
            </div>

            <div class="d-flex align-items-center">
                <a class="profile-icon" href="{{ route('profile') }}">
                    <i class="ri-user-fill"></i> {{ Auth::user()->name }}
                </a>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>

</body>

</html>
