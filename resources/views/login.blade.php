<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="position: relative; 
        width: 100%;
        min-height: 100vh;
        background-image: url('img/backlogin.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;">

    <nav class="navbar navbar-light" style="background-color: transparent;">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" height="70">
            </a>
        </div>
    </nav>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="row align-items-center w-100">
            <div class="col-lg-6 text-center">
                <img src="{{ asset('img/header-img.png') }}" alt="header-img" class="img-fluid">
            </div>

            <div class="col-lg-6">
                <div class="card p-4">
                    <h2 class="text-center">Selamat Datang</h2>
                    <p class="text-center">Login</p>
                    <form action="{{ url('/login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username/Email</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="Masukkan username/email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan password" required>
                        </div>
                        <a href="#" class="d-block text-end mb-3">Lupa password?</a>
                        <button type="submit" class="btn btn-warning w-100" style="background-color: #FFD700; color: #004080;">Login</button>
                    </form>
                    <p class="text-center mt-3">Belum punya akun? <a href="/register">Register</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
