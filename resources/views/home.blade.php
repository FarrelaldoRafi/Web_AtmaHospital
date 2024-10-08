<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Rumah Sakit</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #f4f4f4;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 20px;
            font-weight: bold;
        }

        nav {
            flex-grow: 1;
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin: 0 15px;
        }

        nav ul li a {
            text-decoration: none;
            color: black;
            font-weight: bold;
        }

        .login-buttons {
            display: flex;
        }

        .register-button, .login-button {
            text-decoration: none;
            display: inline-block;
            padding: 10px 20px;
            border-radius: 15px;
            font-weight: bold;
            cursor: pointer;
            color: black;
            text-align: center;
        }

        .register-button {
            background-color: #9fffe1;
            border: none;
            margin-right: 10px;
        }

        .login-button {
            background-color: #f9f9f9;
            border: 2px solid black;
        }

        .carousel {
            background-color: lightgray;
            height: 300px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
            font-size: 24px;
            font-weight: bold;
        }

        .services {
            display: flex;
            justify-content: center;
            margin-top: 40px;
        }

        .services button {
            background-color: #9fffe1;
            border: 2px solid #9fffe1;
            padding: 15px 30px;
            border-radius: 10px;
            margin: 0 20px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>
<body>

<header>
    <div class="logo">NAMA RUMAH SAKIT</div>
    <nav>
        <ul>
            <li><a href="#">BERANDA</a></li>
            <li><a href="#">JADWAL DOKTER</a></li>
            <li><a href="#">LAYANAN</a></li>
            <li><a href="#">BERITA</a></li>
            <li><a href="#">KONTAK</a></li>
        </ul>
    </nav>
    <div class="login-buttons">
        <a href="{{ route('login') }}" class="register-button">Login</a>
    </div>
    
    <div>
        <a href="{{ route('register') }}" class="register-button">Register</a>
    </div>
</header>

<div class="carousel">
    CAROUSEL
</div>

<div class="services">
    <button>MEDICAL CHECK UP</button>
    <button>PESAN OBAT</button>
</div>

</body>
</html>
