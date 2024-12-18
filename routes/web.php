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
use App\Http\Controllers\PendaftaranAntrianController;
use App\Http\Controllers\PaketMedicalCheckupController;
use App\Http\Controllers\PendaftaranMedicalCheckupController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Middleware\CheckAuthenticated;

Route::get('/', function () {
    // Ambil layanan berdasarkan kategori
    $layananLaboratorium = Layanan::where('jenis_layanan', 'laboratorium')->get();
    $layananPoliklinik = Layanan::where('jenis_layanan', 'poliklinik')->get();
    $layananRadiologi = Layanan::where('jenis_layanan', 'radiologi')->get();

    return view('home', [
        'layananLaboratorium' => $layananLaboratorium,
        'layananPoliklinik' => $layananPoliklinik,
        'layananRadiologi' => $layananRadiologi
    ]);
});

Route::get('/jadwal', [DokterController::class, 'searchDokter'])->name('jadwal.dokter');

Route::get('/layanan', function () {
    // Ambil layanan berdasarkan kategori
    $layananLaboratorium = Layanan::where('jenis_layanan', 'laboratorium')->get();
    $layananPoliklinik = Layanan::where('jenis_layanan', 'poliklinik')->get();
    $layananRadiologi = Layanan::where('jenis_layanan', 'radiologi')->get();

    return view('layanan', [
        'layananLaboratorium' => $layananLaboratorium,
        'layananPoliklinik' => $layananPoliklinik,
        'layananRadiologi' => $layananRadiologi
    ]);
});

Route::get('/layanan/{id}', function ($id) {
    $layanan = Layanan::findOrFail($id);
    return view('detaillayanan', compact('layanan'));
})->name('layanan.detail');

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
    $paketMCU = PaketMedicalCheckup::all();
    $layanan = Layanan::all();
    
    $pendaftaranMCU = PendaftaranMedicalCheckup::with('paketMCU')->get();

    return view('admin.medicalcheckup', compact('paketMCU', 'layanan', 'pendaftaranMCU'));
});
Route::delete('/admin/pendaftaran/{id}', [PendaftaranMedicalCheckupController::class, 'destroy'])
    ->name('admin.pendaftaran.destroy');

Route::delete('/admin/antrian/{id}', [PendaftaranAntrianController::class, 'destroy'])
    ->name('admin.antrian.destroy');

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

    // Cek admin
    $admin = Admin::where('username', $request->username)->first();
    if ($admin && Hash::check($request->password, $admin->password)) {
        session(['user' => [
            'id' => $admin->id_admin,
            'name' => $admin->username,
            'role' => 'admin'
        ]]);
        return response()->json([
            'success' => true,
            'redirect' => '/admin/dashadmin',
            'message' => 'Login berhasil!'
        ]);
    }

    // Cek pengguna
    $pengguna = Pengguna::where('username', $request->username)
        ->orWhere('email', $request->username)
        ->first();
    
    if ($pengguna && Hash::check($request->password, $pengguna->password)) {
        session(['user' => [
            'id' => $pengguna->id_pengguna,
            'name' => $pengguna->nama_lengkap,
            'username' => $pengguna->username,
            'email' => $pengguna->email,
            'profile_picture' => $pengguna->foto_profil,
            'role' => 'user'
        ]]);
        return response()->json([
            'success' => true,
            'redirect' => '/',
            'message' => 'Login berhasil!'
        ]);
    }

    // Jika login gagal
    return response()->json([
        'success' => false,
        'message' => 'Username atau password salah.'
    ], 401);
});

Route::get('/logout', [PenggunaController::class, 'logout']);

Route::post('/register', [PenggunaController::class, 'register'])->name('pengguna.register');

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

Route::get('/janji', function () {
    if (!session('user')) {
        return view('login', ['redirect' => '/janji']);
    }

    $spesialis = Dokter::select('spesialis')->distinct()->pluck('spesialis');
    
    return view('janji', compact('spesialis'));
});

Route::get('/get-dokter-by-spesialis', function(Request $request) {
    $spesialis = $request->input('spesialis');
    $dokters = Dokter::where('spesialis', $spesialis)->get();
    return response()->json($dokters);
});

Route::post('/antrian/store', [PendaftaranAntrianController::class, 'store'])->name('antrian.store');
Route::post('/mcu/store', [PendaftaranMedicalCheckupController::class, 'store'])->name('mcu.store');

Route::get('/infojanji', [PendaftaranAntrianController::class, 'infoAntrian'])->name('infoantrian');

Route::get('/berita', function () {
    return view('berita');
});

Route::get('/tentangkami', function () {
    return view('tentangkami');
});

Route::get('/List-Dokter/Narji-Sandoro', function () {
    return view('/List-Dokter/Narji-Sandoro');
});


Route::get('/List-Dokter/profiledokter/{id_dokter}', function ($id_dokter) {
    // Ambil data dokter berdasarkan id_dokter
    $dokter = Dokter::findOrFail($id_dokter);

    return view('List-Dokter.profiledokter', compact('dokter'));
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

Route::get('/infomcu', [PendaftaranMedicalCheckupController::class, 'infoMCU'])->name('infomcu');

Route::get('/medicalcheckup', function () {
    $paketMCU = PaketMedicalCheckup::all();
    
    return view('medicalcheckup',[
        'paketMCU'=> $paketMCU
    ]);
});
