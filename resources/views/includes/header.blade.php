<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        .profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }
        .dropdown-item i {
            color: white;
        }
        .dropdown-item {
            color: white;
        }
        .dropdown-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
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
                    <a class="nav-link {{ Request::is('jadwal') || Request::is('List-Dokter/Narji-Sandoro') ? 'active' : '' }}" href="/jadwal">
                        <span class="dropdown-icon"><i class="fas fa-calendar-alt"></i></span>Jadwal Dokter
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('layanan') || Request::is('janji') || Request::is('infojanji') || Request::is('infomcu') || Request::is('medicalcheckup') || Request::is('List-Layanan/pemeriksaanDarah') ? 'active' : '' }}" href="/layanan">
                        <span class="dropdown-icon"><i class="fas fa-hospital"></i></span>Layanan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('berita') || Request::is('List-Berita/berita1') ? 'active' : '' }}" href="/berita">
                        <span class="dropdown-icon"><i class="fas fa-newspaper"></i></span>Berita
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('tentangkami') ? 'active' : '' }}" href="/tentangkami">
                        <span class="dropdown-icon"><i class="fas fa-phone"></i></span>Tentang Kami
                    </a>
                </li>
            </ul>
            @if(session('user'))
            <div class="dropdown me-5">
                <button class="btn dropdown-toggle text-white" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: transparent; border: none;">
                    @if(session('user.profile_picture'))
                    <img src="{{ asset('storage/' . session('user.profile_picture')) }}" alt="Profile" class="profile-img" id="navProfileImg">
                    @else
                    <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='24' height='24'%3E%3Cpath fill='none' d='M0 0h24v24H0z'/%3E%3Cpath d='M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z' fill='%23000'/%3E%3C/svg%3E" alt="Profile" class="profile-img" id="navProfileImg">
                    @endif
                    <span class="ms-2">{{ session('user')['name'] }}</span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="userDropdown" style="background-color: rgba(0, 0, 0, 0.8);">
                    <li><a class="dropdown-item" href="/profile"><i class="fas fa-user"></i> Profile</a></li>
                    <li><a class="dropdown-item" href="{{ url('/logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                </ul>
            </div>
            @else
            <a href="{{ url('login') }}" class="btn btn-yellow ms-lg-3 me-5 order-lg-1 order-2 mb-1" style="border-radius: 20px; background-color: #FFD700; color: #004080; width: 120px; height: auto;">
                Login
            </a>
            @endif
        </div>
    </div>
</nav>
</body>
</html>
