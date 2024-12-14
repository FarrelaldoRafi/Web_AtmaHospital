<?php

namespace App\Http\Controllers;
use Exception;
use App\Models\Layanan;
use App\Models\PaketMedicalCheckup;
use App\Models\DetailTambahPaketMCU;
use Illuminate\Http\Request;

class PaketMedicalCheckupController extends Controller
{
    public function index()
    {
        $paketMCU = PaketMedicalCheckup::with('layanan')->get();
        $layanan = Layanan::all();
        return view('admin.medicalcheckup', compact('paketMCU', 'layanan'));
    }

    public function edit($id_paketMCU)
    {
        $paketMCU = PaketMedicalCheckup::all(); // Seluruh data layanan untuk tabel
        $selectedPaketMCU = PaketMedicalCheckup::findOrFail($id_paketMCU); // Layanan yang sedang diedit
        return view('admin.medicalcheckup', compact('paketMCU', 'selectedPaketMCU'));
    }

    public function show($id)
    {
        return PaketMedicalCheckup::findOrFail($id);
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_paket' => 'required|string|max:255',
            'selected_layanan' => 'required|string', // Pastikan ini ada
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric'
        ]);

        // Yang ini buat paket MCU baru bos
        $paketMCU = PaketMedicalCheckup::create([
            'nama_paket' => $request->nama_paket,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga
        ]);

        // Proses layanan yang dipilih
        $layananIds = explode(',', $request->selected_layanan);
        
        // Kalau yg ini buat simpan relasi layanan dengan paket MCU bosku
        foreach ($layananIds as $layananId) {
            DetailTambahPaketMCU::create([
                'id_paketMCU' => $paketMCU->id_paketMCU,
                'id_layanan' => $layananId
            ]);
        }

        return redirect()->route('admin.medicalcheckup.index')
            ->with('success', 'Paket MCU berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $paketMCU = PaketMedicalCheckup::findOrFail($id);
        $request->validate([
            'id_layanan' => 'required|exists:layanan,id_layanan',
            'nama_paket' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric',
        ]);

        $paketMCU->update($request->all());
        return redirect('/admin/medicalcheckup')->with(['success' => 'Paket Medical Check Up berhasil diupdate']);
    }

    public function destroy($id)
    {
        $paketMCU = PaketMedicalCheckup::findOrFail($id);
        $paketMCU->delete();
        return redirect('/admin/medicalcheckup')->with(['success' => 'Paket Medical Check Up berhasil dihapus']);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $paketMCU = PaketMedicalCheckup::where('nama_paket', 'LIKE', "%{$query}%")
            ->orWhere('harga', 'LIKE', "%{$query}%")
            ->get();

        return response()->json($paketMCU, 200);
    }
}