<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PendaftaranAntrianController;
use App\Http\Controllers\PendaftaranMedicalCheckupController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PaketMedicalCheckupController;

// Rute Umum
// Route::get('dokter', [DokterController::class, 'index']); // Melihat daftar dokter
Route::get('layanan', [LayananController::class, 'index']); // Melihat layanan
// Route::get('dokter/{id}', [DokterController::class, 'show']);


// Rute untuk Pengguna
Route::post('pengguna/register', [PenggunaController::class, 'register']);
Route::post('pengguna/login', [PenggunaController::class, 'login']);

// Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('pengguna', PenggunaController::class)->only(['update']); // Mengganti profil pengguna

    // Rute untuk Pendaftaran Antrian dan Medical Checkup
    Route::apiResource('pendaftaran-antrian', PendaftaranAntrianController::class);
    Route::apiResource('pendaftaran-medical-checkup', PendaftaranMedicalCheckupController::class);
// });

// Rute untuk Admin
Route::post('admin/login', [AdminController::class, 'login']);
Route::post('admin/register', [AdminController::class, 'register']);

Route::post('admin/login', [AdminController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('admin', AdminController::class)->only(['index']); // Admin hanya dapat melihat jumlah pengguna
    Route::apiResource('dokter', DokterController::class); // Admin dapat mengelola dokter
    Route::apiResource('layanan', LayananController::class); // Admin dapat mengelola layanan
    Route::apiResource('paket-medical-checkup', PaketMedicalCheckupController::class); // Admin dapat mengelola paket medical checkup
    Route::apiResource('pendaftaran-antrian', PendaftaranAntrianController::class)->only(['index', 'show']); // Admin dapat melihat pendaftaran antrian
    Route::apiResource('pendaftaran-medical-checkup', PendaftaranMedicalCheckupController::class)->only(['index', 'show']); // Admin dapat melihat pendaftaran medical checkup
});