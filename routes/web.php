<?php

use App\Models\Admin;
use App\Models\Pengguna;
use App\Models\Dokter;
use App\Models\Layanan;
use App\Models\PaketMedicalCheckup;
use App\Models\PendaftaranAntrian;
use App\Models\PendaftaranMedicalCheckup;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PaketMedicalCheckupController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Middleware\CheckAuthenticated;

Route::get('/', function () {
    return view('home');
});

Route::get('/jadwal', function () {
    return view('jadwal');
});

Route::get('/layanan', function () {
    return view('layanan');
});

Route::middleware([CheckAuthenticated::class])->group(function () {
    Route::get('/admin/dashadmin', function () {
        // Hitung total data
        $totalPengguna = Pengguna::count();
        $totalDokter = Dokter::count();
        $totalLayanan = Layanan::count();
        $totalPaketMCU = PaketMedicalCheckup::count();
        $totalAntrian = PendaftaranAntrian::count();
        $totalDaftarMCU = PendaftaranMedicalCheckup::count();

        // Ambil data untuk tabel
        $pengguna = Pengguna::all();
        $dokter = Dokter::all();
        $layanan = Layanan::all();

        // Kirim data ke view
        return view('admin.dashadmin', [
            'totalPengguna' => $totalPengguna,
            'totalDokter' => $totalDokter,
            'totalLayanan' => $totalLayanan,
            'totalPaketMCU' => $totalPaketMCU,
            'totalAntrian' => $totalAntrian,
            'totalDaftarMCU' => $totalDaftarMCU,
            'pengguna' => $pengguna,
            'dokter' => $dokter,
            'layanan' => $layanan
        ]);
    });

    Route::get('/admin/sidebar', function () {
        return view('admin.sidebar');
    });
    
    // Tambahkan route untuk dokter
    Route::get('/admin/tambahdokter', [DokterController::class, 'showTambahDokter'])->name('admin.tambahdokter');
    Route::get('/admin/dokter/{id}', [DokterController::class, 'show'])->name('admin.dokter.show');
    Route::post('/admin/dokter/store', [DokterController::class, 'store'])->name('admin.dokter.store');
    Route::put('/admin/dokter/update/{id}', [DokterController::class, 'update'])->name('admin.dokter.update');
    Route::delete('/admin/dokter/{id}', [DokterController::class, 'destroy'])->name('admin.dokter.destroy');
    
    Route::get('/admin/tambahlayanan', function () {
        return view('admin.tambahlayanan');
    });

    Route::get('/admin/tambahlayanan', [LayananController::class, 'index'])->name('admin.layanan.index');
    Route::post('/admin/layanan/store', [LayananController::class, 'store'])->name('admin.layanan.store');
    Route::get('/admin/layanan/edit/{id_layanan}', [LayananController::class, 'edit'])->name('admin.layanan.edit');
    Route::put('/admin/layanan/update/{id_layanan}', [LayananController::class, 'update'])->name('admin.layanan.update');
    Route::delete('/admin/layanan/{id_layanan}', [LayananController::class, 'destroy'])->name('admin.layanan.destroy');

    
    Route::get('/admin/medicalcheckup', function () {
        return view('admin.medicalcheckup');
    });

    Route::get('/admin/medicalcheckup', [PaketMedicalCheckupController::class, 'index'])->name('admin.medicalcheckup.index');
    Route::post('/admin/medicalcheckup/store', [PaketMedicalCheckupController::class, 'store'])->name('admin.medicalcheckup.store');
    Route::get('/admin/layanan/edit/{id_paketMCU}', [PaketMedicalCheckupController::class, 'edit'])->name('admin.medicalcheckup.edit');
    Route::put('/admin/medicalcheckup/update/{id_paketMCU}', [PaketMedicalCheckupController::class, 'update'])->name('admin.medicalcheckup.update');
    Route::delete('/admin/medicalcheckup/{id_paketMCU}', [PaketMedicalCheckupController::class, 'destroy'])->name('admin.medicalcheckup.destroy');

});

// Route login
Route::get('/login', function () {
    return view('login');
});

Route::post('/login', function (Request $request) {
    $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    // Cek apakah pengguna adalah admin
    $admin = Admin::where('username', $request->username)->first();
    if ($admin && Hash::check($request->password, $admin->password)) {
        // Login admin berhasil
        session(['user' => [
            'id' => $admin->id,
            'name' => $admin->username, // Sesuaikan dengan nama field di model Admin
            'role' => 'admin'
        ]]);
        return redirect('/admin/dashadmin')->with('success', 'Login berhasil!');
    }

    // Cek pengguna biasa
    $pengguna = Pengguna::where('username', $request->username)->first();
    if ($pengguna && Hash::check($request->password, $pengguna->password)) {
        // Login pengguna berhasil
        session(['user' => [
            'id' => $pengguna->id_pengguna,
            'name' => $pengguna->nama_lengkap,
            'username' => $pengguna->username,
            'email' => $pengguna->email,
            'profile_picture' => $pengguna->foto_profil,
            'role' => 'user'
        ]]);
        return redirect('/')->with('success', 'Login berhasil!');
    }

    // Jika login gagal
    return back()->withErrors(['username' => 'Username atau password salah.']);
});

Route::post('/register', [PenggunaController::class, 'register'])->name('pengguna.register');

// Route::post('/profile/update', function (Request $request) {
//     $response = ['success' => false];
    
//     try {
//         $currentUser = session('user', []);
        
//         if ($request->hasFile('profile_picture')) {
//             $file = $request->file('profile_picture');
            
//             if ($file->isValid()) {
//                 if (isset($currentUser['profile_picture']) && Storage::disk('public')->exists($currentUser['profile_picture'])) {
//                     Storage::disk('public')->delete($currentUser['profile_picture']);
//                 }
                
//                 $path = $file->store('profile_pictures', 'public');
//                 $currentUser['profile_picture'] = $path;
//                 $response['image_url'] = asset('storage/' . $path);
//             }
//         }
        
//         $userData = [
//             'name' => $request->input('fullName'),
//             'username' => $request->input('username'),
//             'email' => $request->input('email'),
//             'phone' => $request->input('phone'),
//             'dob' => $request->input('dob'),
//             'address' => $request->input('address')
//         ];
        
//         session(['user' => array_merge($currentUser, $userData)]);
        
//         $response['success'] = true;
        
//     } catch (\Exception $e) {
//         $response['error'] = $e->getMessage();
//     }
    
//     return response()->json($response);
// });

Route::post('/profile/update', [PenggunaController::class, 'update']);

Route::get('/logout', function () {
    session()->forget('user');
    return redirect('/login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/profile', function () {
    $pengguna = Pengguna::findOrFail(session('user.id'));
    return view('profile', compact('pengguna'));
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
