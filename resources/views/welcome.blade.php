<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Aplikasi Gaji BPS 3322</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .bg-login-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 0;
        }

        .bg-login-image {
            border-top-left-radius: 0.35rem;
            border-bottom-left-radius: 0.35rem;
            overflow: hidden;
        }

        .small-text {
            font-size: 0.875rem;
            color: #6c757d;
        }
    </style>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 bg-login-image">
                                <img src="assets/landing_bps.jpg" alt="Kantor BPS">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Dashboard Pegawai</h1>
                                    </div>
                                    <p class="text-center small-text mb-4">
                                        Aplikasi ini digunakan untuk perhitungan gaji pegawai BPS Kabupaten Semarang.
                                    </p>

                                    <!-- Form Login -->
                                    <form action="{{ route('postlogin') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" name="username" id="username" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="password">NIP (Password)</label>
                                            <input type="password" name="password" id="password" class="form-control" required>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </form>


                                    <!-- Error Message -->
                                    @if ($errors->any())
                                        <div class="alert alert-danger mt-3">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
