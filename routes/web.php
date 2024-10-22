<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'username' => 'User1',
            'email' => 'User1@gmail.com',
            'phone' => 1234567890,
            'dob' => '1990-01-01',
            'address' => 'Jl. Abcdef No.999',
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

Route::post('/profile/update', function (Request $request) {
    $response = ['success' => false];
    
    try {
        $currentUser = session('user', []);
        
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            
            if ($file->isValid()) {
                if (isset($currentUser['profile_picture']) && Storage::disk('public')->exists($currentUser['profile_picture'])) {
                    Storage::disk('public')->delete($currentUser['profile_picture']);
                }
                
                $path = $file->store('profile_pictures', 'public');
                $currentUser['profile_picture'] = $path;
                $response['image_url'] = asset('storage/' . $path);
            }
        }
        
        $userData = [
            'name' => $request->input('fullName'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'dob' => $request->input('dob'),
            'address' => $request->input('address')
        ];
        
        session(['user' => array_merge($currentUser, $userData)]);
        
        $response['success'] = true;
        
    } catch (\Exception $e) {
        $response['error'] = $e->getMessage();
    }
    
    return response()->json($response);
});

Route::get('/logout', function () {
    if (session('user.profile_picture')) {
        Storage::disk('public')->delete(session('user.profile_picture'));
        session()->forget('user.profile_picture');
    }
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

Route::get('/tentangkami', function () {
    return view('tentangkami');
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

Route::get('/List-Layanan/pemeriksaanPsikologi', function () {
    return view('/List-Layanan/pemeriksaanPsikologi');
});

Route::get('/List-Layanan/ct-scan', function () {
    return view('/List-Layanan/ct-scan');
});
