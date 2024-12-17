<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use App\Models\Dokter;
use App\Models\Layanan;
use App\Models\PaketMedicalCheckup;
use App\Models\PendaftaranAntrian;
use App\Models\PendaftaranMedicalCheckup;

class DashboardController extends Controller
{
    // Dashboard Admin
    public function adminDashboard()
    {
        // Pastikan Anda menggunakan model yang sesuai
        $totalPengguna = \App\Models\Pengguna::count(); // Pastikan namespace benar
        $totalDokter = \App\Models\Dokter::count();
        $totalLayanan = \App\Models\Layanan::count();
        $totalPaketMCU = \App\Models\PaketMedicalCheckup::count();
        $totalAntrian = \App\Models\PendaftaranAntrian::count();
        $totalDaftarMCU = \App\Models\PendaftaranMedicalCheckup::count();

        // Ambil data untuk tabel
        $pengguna = \App\Models\Pengguna::all();
        $dokter = \App\Models\Dokter::all();
        $layanan = \App\Models\Layanan::all();

        return view('admin.dashadmin', compact(
            'totalPengguna', 
            'totalDokter', 
            'totalLayanan', 
            'totalPaketMCU',  
            'totalAntrian', 
            'totalDaftarMCU',
            'pengguna',
            'dokter',
            'layanan'
        ));
    }

    // Dashboard User
    public function userDashboard()
    {
        // Ambil data pengguna yang sedang login
        $pengguna = session('pengguna');

        // Hitung atau ambil data yang relevan untuk user
        $totalAntrian = PendaftaranAntrian::where('pengguna_id', $pengguna->id)->count();
        $totalMCU = PendaftaranMedicalCheckup::where('pengguna_id', $pengguna->id)->count();
        
        // Ambil riwayat antrian dan MCU
        $riwayatAntrian = PendaftaranAntrian::where('pengguna_id', $pengguna->id)->get();
        $riwayatMCU = PendaftaranMedicalCheckup::where('pengguna_id', $pengguna->id)->get();

        return view('home', compact(
            'pengguna', 
            'totalAntrian', 
            'totalMCU',
            'riwayatAntrian',
            'riwayatMCU'
        ));
    }
}