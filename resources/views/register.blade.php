<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="position: relative; 
        width: 100%;
        min-height: 100vh;
        background-image: url('https://rs-jih.co.id/assets/bridge/img/bg-intro-2.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;">

    <!-- Navbar -->
    <nav class="navbar navbar-light" style="background-color: transparent;">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" height="70"> <!-- Sesuaikan link logo -->
            </a>
        </div>
    </nav>

    <!-- Main content -->
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="row align-items-center w-100">
            <!-- Image section -->
            <div class="col-lg-6 text-center">
                <img src="{{ asset('img/header-img.png') }}" alt="header-img" class="img-fluid">
            </div>

            <!-- Register section -->
            <div class="col-lg-6">
                <div class="card p-4">
                    <!-- Welcome and Register Text -->
                    <h2 class="text-center">Selamat Datang</h2>
                    <p class="text-center">Register</p>
                    <form action="{{ url('/') }}">
                        <div class="mb-3">
                            <label for="fullname" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="fullname" placeholder="Masukkan nama lengkap">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Masukkan username">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Masukkan email">
                        </div>
                        
                        <!-- Row for Phone and Birth Date -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control" id="phone" placeholder="Masukkan no telepon">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="birthdate" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="birthdate">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="address" placeholder="Masukkan alamat">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Masukkan password">
                        </div>

                        <button type="submit" class="btn btn-warning w-100" style="background-color: #FFD700; color: #004080;">Register</button>
                    </form>

                    <!-- Already have an account link -->
                    <p class="text-center mt-3">Sudah punya akun? <a href="/login">Login</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
