<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atma Hospital Header</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        /* Internal CSS for user profile image */
        .profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }
        /* Style for dropdown menu items */
        .dropdown-item i {
            color: white; /* Icon color */
        }
        .dropdown-item {
            color: white; /* Text color */
        }
        .dropdown-item:hover {
            background-color: rgba(255, 255, 255, 0.1); /* Hover effect */
        }
        .d-none {
    display: none !important; /* Tambahkan !important */
}
    </style>
</head>
<body style="margin: 0; height: 100vh; background-image: url('/img/bg.png'); background-size: cover; background-position: center;">
<nav class="navbar navbar-expand-lg navbar-custom fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center ms-5" href="#">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo">
        </a>
        <button class="navbar-toggler border-0 text-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fas fa-bars fa-lg"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/" aria-current="page">
                        <span class="dropdown-icon"><i class="fas fa-home"></i></span>Beranda
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('jadwal') ? 'active' : '' }}" href="/jadwal">
                        <span class="dropdown-icon"><i class="fas fa-calendar-alt"></i></span>Jadwal Dokter
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('layanan') ? 'active' : '' }}" href="/layanan">
                        <span class="dropdown-icon"><i class="fas fa-hospital"></i></span>Layanan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('berita') ? 'active' : '' }}" href="/berita">
                        <span class="dropdown-icon"><i class="fas fa-newspaper"></i></span>Berita
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('kontak') ? 'active' : '' }}" href="/kontak">
                        <span class="dropdown-icon"><i class="fas fa-phone"></i></span>Kontak
                    </a>
                </li>
            </ul>
            
            <div id="userArea" class="d-none d-lg-flex align-items-center ms-lg-3 me-5 order-lg-1 order-2">
                <div class="dropdown">
                    <button class="btn dropdown-toggle text-white" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: transparent; border: none;">
                        <img src="https://via.placeholder.com/40" alt="Profile" class="profile-img">
                        <span class="ms-2" id="userName">Nama Pengguna</span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="userDropdown" style="background-color: rgba(0, 0, 0, 0.8);">
                        <li><a class="dropdown-item" href="/profile"><i class="fas fa-user"></i> Profile</a></li>
                        <li><a class="dropdown-item" href="#" onclick="logout()"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    </ul>
                </div>
            </div>

            <a href="{{ url('login') }}" class="btn btn-yellow ms-lg-3 me-5 order-lg-1 order-2" style="border-radius: 20px; background-color: #FFD700; color: #004080; width: 120px; height: auto;" id="loginButton">
                Login
            </a>
        </div>
    </div>
</nav>
<script>
// Simulasi user dan status login
// Simulasi user dan status login
const users = {
    user1: {
        name: "User 1",
        role: "user",
        redirect: "/"
    },
    admin: {
        name: "Admin",
        role: "admin",
        redirect: "/adminpage"
    }
};

// Fungsi untuk login simulasi
function login(userKey) {
    localStorage.setItem('loggedInUser', JSON.stringify(users[userKey]));
    updateNavbar(); // Panggil updateNavbar setelah login
}

// Fungsi untuk logout
function logout() {
    localStorage.removeItem('loggedInUser'); // Hapus user dari local storage
    updateNavbar(); // Panggil updateNavbar untuk memperbarui tampilan
}


// Menampilkan status user di navbar
function updateNavbar() {
    const loggedInUser = JSON.parse(localStorage.getItem('loggedInUser'));

    const userArea = document.getElementById('userArea');
    const loginButton = document.getElementById('loginButton');
    const userName = document.getElementById('userName');

    console.log('User Logged In:', loggedInUser); // Debugging line

    if (loggedInUser) {
        // Jika ada user yang login
        userArea.classList.remove('d-none'); // Tampilkan dropdown
        loginButton.classList.add('d-none'); // Sembunyikan tombol login
        userName.textContent = loggedInUser.name; // Set nama pengguna
    } else {
        // Jika tidak ada user yang login
        userArea.classList.add('d-none'); // Sembunyikan dropdown
        loginButton.classList.remove('d-none'); // Tampilkan tombol login
        userName.textContent = ""; // Kosongkan nama pengguna
    }
}

// Panggil fungsi ini saat halaman di-load
document.addEventListener('DOMContentLoaded', updateNavbar);

</script>
</body>
</html>
