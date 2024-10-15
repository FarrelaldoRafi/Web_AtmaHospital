<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="position: relative; 
        width: 100%;
        min-height: 100vh;
        background-image: url('https://rs-jih.co.id/assets/bridge/img/bg-intro-2.png');
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
                    <form id="loginForm">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter your password">
                        </div>
                        <button type="submit" class="btn btn-warning w-100" style="background-color: #FFD700; color: #004080;">Login</button>
                    </form>
                    <p class="text-center mt-3">Belum punya akun? <a href="/register">Register</a></p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const users = {
            user1: {
                name: "User 1",
                role: "user",
                redirect: "/" // Halaman tujuan untuk user
            },
            admin: {
                name: "Admin",
                role: "admin",
                redirect: "/adminpage" // Halaman tujuan untuk admin
            }
        };

        // Handle login form submission
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah refresh halaman

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            // Simulasi login: cek email dan password
            if (email === "user1@example.com" && password === "password1") {
                login('user1');
            } else if (email === "admin@example.com" && password === "adminpass") {
                login('admin');
            } else {
                alert("Email atau password salah!");
            }
        });

        function login(userKey) {
            localStorage.setItem('loggedInUser', JSON.stringify(users[userKey]));
            // Redirect ke halaman yang sesuai
            window.location.href = users[userKey].redirect; // Mengarahkan pengguna
        }
    </script>
</body>
</html>
