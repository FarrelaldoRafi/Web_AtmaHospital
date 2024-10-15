<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('janji');
});

Route::get('/jadwal', function () {
    return view('jadwal');
});

Route::get('/layanan', function () {
    return view('layanan');
});

Route::get('/login', function () {
    return view('login');
});

// Route::get('/adminpage', function () {
//     return view('adminpage');
// });

Route::get('/register', function () {
    return view('register');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/infojanji', function () {
    return view('infojanji');
});

Route::get('/berita', function () {
    return view('berita');
});

Route::get('/kontak', function () {
    return view('kontak');
});

Route::get('/List-Dokter/Narji-Sandoro', function () {
    return view('/List-Dokter/Narji-Sandoro');
});

Route::get('/List-Dokter/Sandoro-Narji', function () {
    return view('/List-Dokter/Sandoro-Narji');
});

Route::get('/List-Berita/berita1', function () {
    return view('/List-Berita/berita1');
});

Route::get('/List-Berita/berita2', function () {
    return view('/List-Berita/berita2');
});

Route::get('/List-Berita/berita3', function () {
    return view('/List-Berita/berita3');
});

Route::get('/List-Berita/berita4', function () {
    return view('/List-Berita/berita4');
});

Route::get('/List-Berita/berita5', function () {
    return view('/List-Berita/berita5');
});

Route::get('/List-Berita/berita6', function () {
    return view('/List-Berita/berita6');
});

Route::get('/janji', function () {
    return view('janji');
});