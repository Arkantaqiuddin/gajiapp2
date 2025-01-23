<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - BPS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: rgb(6, 50, 97);
        }
        .navbar-brand {
            color: white;
        }
        .navbar-nav .nav-link {
            color: white;
        }
        .container {
            margin-top: 30px;
        }
        .button {
            transition-duration: 0.4s;
            background-color: white; /* Warna awal (putih) */
            color: rgb(6, 50, 97); /* Warna teks awal */
            border: 2px solid rgb(6, 50, 97); /* Border dengan warna utama */
            padding: 5px 15px;
            border-radius: 5px;
        }
        .button:hover {
            background-color: rgb(6, 50, 97); /* Warna latar saat di-hover (biru) */
            color: white; /* Warna teks saat di-hover */
            border-color: rgb(6, 50, 97); /* Border tetap biru */
        }
        .navbar-nav .nav-link {
        color: white;
        transition: color 0.3s ease; /* Tambahkan transisi untuk efek halus */
        }
        /* Warna teks saat di-hover */
        .navbar-nav .nav-link:hover {
            color: gray; /* Ubah warna teks menjadi abu-abu */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">BPS GajiApp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @if (Session::get('is_admin') == 1) <!-- Cek apakah user adalah admin -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}" title="Kembali ke Halaman Admin">Import Laporan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('staff.dashboard') }}" title="Lihat detail gaji dan tunjangan sebagai staff">Detail Gaji</a>
                        </li>
                    @endif
                    @if (Session::get('is_staff')) <!-- Cek apakah user adalah staff -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('staff.dashboard2') }}" title="Dashboard Staff">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('staff.dashboard') }}" title="Detail Gaji">Detail Gaji</a>
                        </li>
                        
                    @endif
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="GET">
                            @csrf
                            <button type="submit" class="button">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
