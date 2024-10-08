<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Rumah Sakit</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        .register-container {
            display: flex;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            width: 100%;
        }

        .logo, .image-placeholder {
            width: 50%;
            padding: 10px;
        }

        .logo div {
            width: 100px;
            height: 50px;
            background-color: lightgray;
            text-align: center;
            padding-top: 10px;
            font-weight: bold;
        }

        .image-placeholder {
            background-color: lightgray;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 300px;
        }

        .form-container {
            width: 50%;
            padding: 10px;
        }

        h1 {
            margin-top: 0;
        }

        h3 {
            margin-top: 10px;
            margin-bottom: 20px;
        }

        label {
            font-size: 14px;
            margin-bottom: 5px;
            display: inline-block;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            background-color: #f3f3f3;
        }

        .register-button {
            background-color: #9fffe1;
            border: none;
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            color: black;
            margin-top: 20px;
            text-align: center;
        }

        .register-button:hover {
            background-color: #8ee4c8;
        }
    </style>
</head>
<body>

<div class="register-container">
    <div class="logo">
        <div>LOGO</div>
        <div class="image-placeholder">
            GAMBAR
        </div>
    </div>
    <div class="form-container">
        <h1>SELAMAT DATANG</h1>
        <h3>REGISTER</h3>
        <label for="nama">Nama :</label>
        <input type="text" id="nama" placeholder="Masukkan nama">
        <label for="tanggal_lahir">Tanggal Lahir :</label>
        <input type="date" id="tanggal_lahir">
        <label for="alamat">Alamat :</label>
        <input type="text" id="alamat" placeholder="Masukkan alamat">
        <label for="no_telp">No Telp :</label>
        <input type="text" id="no_telp" placeholder="Masukkan nomor telepon">
        <label for="username">Username :</label>
        <input type="text" id="username" placeholder="Masukkan username">
        <label for="password">Password :</label>
        <input type="password" id="password" placeholder="Masukkan password">
        <label for="email">Email :</label>
        <input type="email" id="email" placeholder="Masukkan email">
        <a href="{{ route('home') }}" class="register-button">Register</a>
    </div>
</div>

</body>
</html>
