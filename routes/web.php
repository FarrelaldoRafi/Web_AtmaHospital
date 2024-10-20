<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

Route::post('/profile/update', function (Request $request) {
    $request->validate([
        'profile_picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    if ($request->hasFile('profile_picture')) {
        $file = $request->file('profile_picture');
        $path = $file->store('profile_pictures', 'public');

        session(['user.profile_picture' => $path]);
    }

    return redirect('/profile')->with('success', 'Profile updated successfully.');
});

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

Route::post('/login', function (Request $request) {
    $credentials = $request->only('username', 'password');

    if ($credentials['username'] === 'user1' && $credentials['password'] === 'password') {
        session(['user' => [
            'name' => 'User',
            'role' => 'user'
        ]]);
        return redirect('/');
    } elseif ($credentials['username'] === 'admin1' && $credentials['password'] === 'adminpass') {
        session(['user' => [
            'name' => 'Admin', 
            'role' => 'admin'
        ]]);
        return redirect('/admin/dashadmin');
    }
});

Route::get('/logout', function () {
    session()->forget('user');
    return redirect('/');
});

Route::get('/admin/dashadmin', function () {
    return view('admin.dashadmin');
});
Route::get('/admin/sidebar', function () {
    return view('admin.sidebar');
});
Route::get('/admin/tambahdokter', function () {
    return view('admin.tambahdokter');
});
Route::get('/admin/tambahlayanan', function () {
    return view('admin.tambahlayanan');
});
Route::get('/admin/medicalcheckup', function () {
    return view('admin.medicalcheckup');
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

Route::get('/infomcu', function () {
    return view('infomcu');
});

Route::get('/medicalcheckup', function () {
    return view('medicalcheckup');
});

Route::get('/List-Layanan/pemeriksaanDarah', function () {
    return view('/List-Layanan/pemeriksaanDarah');
});