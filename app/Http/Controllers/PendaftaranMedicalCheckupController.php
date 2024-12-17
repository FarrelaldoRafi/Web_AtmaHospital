<?php

namespace App\Http\Controllers;

use App\Models\PendaftaranMedicalCheckup;
use Illuminate\Http\Request;

class PendaftaranMedicalCheckupController extends Controller
{
    public function index()
    {
        return PendaftaranMedicalCheckup::all();
    }

    public function show($id)
    {
        return PendaftaranMedicalCheckup::findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pengguna' => 'required|exists:pengguna,id_pengguna',
            'id_paketMCU' => 'required|exists:paketmedicalcheckup,id_paketMCU',
            'nama_pasien' => 'required|string|max:100',
            'tanggal_lahir_pasien' => 'required|date',
            'no_telp_pasien' => 'required|string|max:15',
            'jenis_kelamin_pasien' => 'required|in:Laki-laki,Perempuan',
            'alamat_pasien' => 'required|string',
            'riwayat_penyakit' => 'nullable|string',
            'tanggal_periksa' => 'required|date',
        ]);

        $pendaftaranMedicalCheckup = PendaftaranMedicalCheckup::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Pendaftaran MCU berhasil',
            'data' => $pendaftaranMedicalCheckup
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $pendaftaranMedicalCheckup = PendaftaranMedicalCheckup::findOrFail($id);
        $pendaftaranMedicalCheckup->update($request->all());

        return response()->json($pendaftaranMedicalCheckup, 200);
    }

    public function destroy($id)
{
    try {
        $pendaftaranMedicalCheckup = PendaftaranMedicalCheckup::findOrFail($id);
        $pendaftaranMedicalCheckup->delete();

        return redirect()->route('admin.medicalcheckup.index')
            ->with('success', 'Pendaftaran Medical Check Up berhasil dihapus');
    } catch (\Exception $e) {
        return redirect()->back()
            ->with('error', 'Gagal menghapus Pendaftaran Medical Check Up: ' . $e->getMessage());
    }
}

    public function search(Request $request)
    {
        $query = $request->input('query');
        $pendaftaranMedicalCheckup = PendaftaranMedicalCheckup::where('nama_pasien', 'LIKE', "%{$query}%")
            ->orWhere('no_telp_pasien', 'LIKE', "%{$query}%")
            ->get();

        return response()->json($pendaftaranMedicalCheckup, 200);
    }

//     public function infoMCU()
// {
//     // Pastikan user sudah login
//     if (!session('user')) {
//         return redirect('/login');
//     }

//     // Ambil data pendaftaran MCU untuk user yang sedang login
//     $pendaftaranMCU = PendaftaranMedicalCheckup::where('id_pengguna', session('user.id'))
//         ->with('paketMCU')
//         ->first();

//     // Kirim ke view
//     return view('infomcu', compact('pendaftaranMCU'));
// }

public function infoMCU()
{
    // Pastikan user sudah login
    if (!session('user')) {
        return redirect('/login');
    }

    // Ambil semua data pendaftaran MCU untuk user yang sedang login
    $pendaftaranMCU = PendaftaranMedicalCheckup::where('id_pengguna', session('user.id'))
        ->with(['paketMCU.layanan']) // Memuat relasi layanan
        ->get(); // Mengambil semua data

    // Kirim ke view
    return view('infomcu', compact('pendaftaranMCU'));
}
}