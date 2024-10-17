<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    <style>
        .sidebar-mini.sidebar-collapse .main-sidebar {
            width: 80px;
        }

        .sidebar-mini.sidebar-collapse .main-sidebar:hover {
            width: 250px;
            transition: width 0.3s ease-in-out;
        }

        .sidebar-mini.sidebar-collapse .content-wrapper {
            margin-left: 80px;
        }

        .sidebar-mini.sidebar-collapse .main-sidebar:hover ~ .content-wrapper {
            margin-left: 250px;
            transition: margin-left 0.3s ease-in-out;
        }

        .admin-info {
            display: flex;
            align-items: center;
            padding: 15px;
            overflow: hidden;
        }

        .admin-info img {
            border-radius: 50%;
            width: 35px;
            height: 35px;
            margin-right: 10px;
            transition: all 0.3s ease;
        }

        .admin-info .admin-name {
            color: white;
            opacity: 1;
            white-space: nowrap;
            transition: opacity 0.3s ease, margin-left 0.3s ease;
            margin-left: 0px;
        }

        .sidebar-mini.sidebar-collapse .admin-name {
            opacity: 0;
            margin-left: -50px;
        }

        .sidebar-mini.sidebar-collapse .main-sidebar:hover .admin-name {
            opacity: 1;
            margin-left: 10px;
        }

        .content-wrapper, .content {
            padding-top: 0;
            margin-top: 0;
        }

        .main-header {
            z-index: 1030;
        }

        .brand-link {
            display: flex;
            align-items: center;
            flex-direction: column;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>
                <a class="btn btn-danger rounded-pill px-4" href="{{ url('/logout') }}">LOGOUT</a>
            </div>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="#" class="brand-link">
                <img src="{{ asset('img/logo.png') }}" alt="Atma Hospital Logo" class="brand-image">
            </a>
            <div class="admin-info">
                <img src="path/to/admin-avatar.jpg" alt="Admin Avatar">
                <span class="admin-name">John Doe</span>
            </div>
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                        <li class="nav-item">
                            <a href="{{ url('/admin/dashadmin') }}" class="nav-link {{ Request::is('admin/dashadmin') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/admin/tambahdokter') }}" class="nav-link {{ Request::is('admin/tambahdokter') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user-md"></i>
                                <p>Tambah Dokter</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/admin/tambahlayanan') }}" class="nav-link {{ Request::is('admin/tambahlayanan') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-clipboard-list"></i>
                                <p>Tambah Layanan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/admin/medicalcheckup') }}" class="nav-link {{ Request::is('admin/medicalcheckup') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-stethoscope"></i>
                                <p>Medical Check Up</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>
