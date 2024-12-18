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
    public function adminDashboard()
    {
        $totalPengguna = \App\Models\Pengguna::count(); 
        $totalDokter = \App\Models\Dokter::count();
        $totalLayanan = \App\Models\Layanan::count();
        $totalPaketMCU = \App\Models\PaketMedicalCheckup::count();
        $totalAntrian = \App\Models\PendaftaranAntrian::count();
        $totalDaftarMCU = \App\Models\PendaftaranMedicalCheckup::count();

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

    public function userDashboard()
    {
        $pengguna = session('pengguna');

        $totalAntrian = PendaftaranAntrian::where('pengguna_id', $pengguna->id)->count();
        $totalMCU = PendaftaranMedicalCheckup::where('pengguna_id', $pengguna->id)->count();
        
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