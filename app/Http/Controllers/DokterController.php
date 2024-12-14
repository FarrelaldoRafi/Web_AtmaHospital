<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Tambahkan baris ini di bagian atas file

class DokterController extends Controller
{
    public function index()
    {
        return Dokter::all();
    }

    public function show($id)
{
    try {
        $dokter = Dokter::findOrFail($id);
        
        return response()->json([
            'id' => $dokter->id,
            'nama_dokter' => $dokter->nama_dokter,
            'spesialis' => $dokter->spesialis,
            'no_telp' => $dokter->no_telp,
            'jam_mulai' => $dokter->jam_mulai,
            'jam_selesai' => $dokter->jam_selesai,
            'deskripsi' => $dokter->deskripsi,
            'foto' => $dokter->foto ? asset('storage/' . $dokter->foto) : null // Tambahkan asset() untuk URL foto
        ]);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Dokter tidak ditemukan'], 404);
    }
}

    public function showTambahDokter()
    {
        // Ambil data untuk dashboard
        $totalPengguna = \App\Models\Pengguna::count();
        $totalDokter = Dokter::count();
        $totalLayanan = \App\Models\Layanan::count();
        $totalPaketMCU = \App\Models\PaketMedicalCheckup::count();
        $totalAntrian = \App\Models\PendaftaranAntrian::count();
        $totalDaftarMCU = \App\Models\PendaftaranMedicalCheckup::count();

        // Ambil semua dokter
        $dokters = Dokter::all();

        return view('admin.tambahdokter', [
            'totalPengguna' => $totalPengguna,
            'totalDokter' => $totalDokter,
            'totalLayanan' => $totalLayanan,
            'totalPaketMCU' => $totalPaketMCU,
            'totalAntrian' => $totalAntrian,
            'totalDaftarMCU' => $totalDaftarMCU,
            'dokters' => $dokters
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'startTime' => 'required',
            'endTime' => 'required',
            'desc' => 'nullable|string',
            'photo' => 'nullable|image|max:2048'
        ]);

        // Proses upload foto
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('dokter_photos', 'public');
        }

        $dokter = new Dokter();
        $dokter->nama_dokter = $validatedData['name'];
        $dokter->spesialis = $validatedData['specialization'];
        $dokter->no_telp = $validatedData['phone'];
        $dokter->jam_mulai = $validatedData['startTime'];
        $dokter->jam_selesai = $validatedData['endTime'];
        $dokter->deskripsi = $validatedData['desc'] ?? '';
        $dokter->foto = $photoPath;
        $dokter->save();

        return redirect()->back()->with('success', 'Dokter berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'startTime' => 'required',
            'endTime' => 'required',
            'desc' => 'nullable|string',
            'photo' => 'nullable|image|max:2048'
        ]);

        $dokter = Dokter::findOrFail($id);

        // Proses upload foto baru
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($dokter->foto) {
                Storage::disk('public')->delete($dokter->foto);
            }

            // Simpan foto baru
            $photoPath = $request->file('photo')->store('dokter_photos', 'public');
            $dokter->foto = $photoPath;
        }

        // Update data dokter
        $dokter->nama_dokter = $validatedData['name'];
        $dokter->spesialis = $validatedData['specialization'];
        $dokter->no_telp = $validatedData['phone'];
        $dokter->jam_mulai = $validatedData['startTime'];
        $dokter->jam_selesai = $validatedData['endTime'];
        $dokter->deskripsi = $validatedData['desc'] ?? '';
        $dokter->save();

        return redirect()->back()->with('success', 'Dokter berhasil diupdate');
    }

    public function destroy($id)
{
    try {
        $dokter = Dokter::findOrFail($id);
        
        // Hapus foto jika ada
        if ($dokter->foto) {
            Storage::delete('public/' . $dokter->foto);
        }
        
        $dokter->delete();
        
        return redirect()->route('admin.dokter.index')->with('success', 'Dokter berhasil dihapus');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal menghapus dokter: ' . $e->getMessage());
    }
}

    public function search(Request $request)
    {
        $query = $request->input('query');
        $dokter = Dokter::where('nama_dokter', 'LIKE', "%{$query}%")
            ->orWhere('spesialis', 'LIKE', "%{$query}%")
            ->get();

        return response()->json($dokter, 200);
    }
}