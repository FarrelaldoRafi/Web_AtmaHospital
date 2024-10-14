<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
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

Route::get('/register', function () {
    return view('register');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/infojanji', function () {
    return view('infojanji');
});