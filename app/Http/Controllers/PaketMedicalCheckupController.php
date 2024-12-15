<?php

namespace App\Http\Controllers;
use Exception;
use App\Models\Layanan;
use App\Models\PaketMedicalCheckup;
use App\Models\PendaftaranMedicalCheckup;
use App\Models\DetailTambahPaketMCU;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaketMedicalCheckupController extends Controller
{
    public function index()
{
    $paketMCU = PaketMedicalCheckup::with('layanan')->get();
    $layanan = Layanan::all();
    
    // Tambahkan ini untuk mengambil data pendaftaran
    $pendaftaranMCU = PendaftaranMedicalCheckup::with('paketMCU')->get();

    return view('admin.medicalcheckup', compact('paketMCU', 'layanan', 'pendaftaranMCU'));
}

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_paket' => 'required|string|max:255|unique:paketmedicalcheckup,nama_paket',
            'selected_layanan' => 'required|string', 
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0'
        ], [
            'nama_paket.unique' => 'Nama paket sudah ada.',
            'selected_layanan.required' => 'Pilih minimal satu layanan.',
            'harga.min' => 'Harga harus bernilai positif.'
        ]);

        try {
            // Gunakan transaksi untuk memastikan konsistensi data
            DB::beginTransaction();

            // Buat paket MCU baru
            $paketMCU = PaketMedicalCheckup::create([
                'nama_paket' => $request->nama_paket,
                'deskripsi' => $request->deskripsi,
                'harga' => $request->harga
            ]);

            // Proses layanan yang dipilih
            $layananIds = explode(',', $request->selected_layanan);
            
            // Simpan relasi layanan dengan paket MCU
            $detailLayanan = [];
            foreach ($layananIds as $layananId) {
                $detailLayanan[] = [
                    'id_paketMCU' => $paketMCU->id_paketMCU,
                    'id_layanan' => $layananId
                ];
            }

            // Masukkan detail layanan
            DetailTambahPaketMCU::insert($detailLayanan);

            // Commit transaksi
            DB::commit();

            return redirect()->route('admin.medicalcheckup.index')
                ->with('success', 'Paket MCU berhasil ditambahkan');

        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi error
            DB::rollBack();

            return redirect()->back()
                ->with('error', 'Gagal menambahkan Paket MCU: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_paket' => 'required|string|max:255|unique:paketmedicalcheckup,nama_paket,' . $id . ',id_paketMCU',
            'selected_layanan' => 'required|string', 
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0'
        ], [
            'nama_paket.unique' => 'Nama paket sudah ada.',
            'selected_layanan.required' => 'Pilih minimal satu layanan.',
            'harga.min' => 'Harga harus bernilai positif.'
        ]);

        try {
            // Gunakan transaksi untuk memastikan konsistensi data
            DB::beginTransaction();

            // Temukan paket MCU
            $paketMCU = PaketMedicalCheckup::findOrFail($id);

            // Update data paket MCU
            $paketMCU->update([
                'nama_paket' => $request->nama_paket,
                'deskripsi' => $request->deskripsi,
                'harga' => $request->harga
            ]);

            // Hapus detail layanan lama
            DetailTambahPaketMCU::where('id_paketMCU', $id)->delete();

            // Proses layanan yang dipilih
            $layananIds = explode(',', $request->selected_layanan);
            
            // Simpan relasi layanan dengan paket MCU
            $detailLayanan = [];
            foreach ($layananIds as $layananId) {
                $detailLayanan[] = [
                    'id_paketMCU' => $paketMCU->id_paketMCU,
                    'id_layanan' => $layananId
                ];
            }

            // Masukkan detail layanan baru
            DetailTambahPaketMCU::insert($detailLayanan);

            // Commit transaksi
            DB::commit();

            return redirect()->route('admin.medicalcheckup.index')
                ->with('success', 'Paket MCU berhasil diupdate');

        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi error
            DB::rollBack();

            return redirect()->back()
                ->with('error', 'Gagal mengupdate Paket MCU: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            // Gunakan transaksi untuk memastikan konsistensi data
            DB::beginTransaction();

            // Hapus detail layanan terkait
            DetailTambahPaketMCU::where('id_paketMCU', $id)->delete();

            // Hapus paket MCU
            $paketMCU = PaketMedicalCheckup::findOrFail($id);
            $paketMCU->delete();

            // Commit transaksi
            DB::commit();

            return redirect()->route('admin.medicalcheckup.index')
                ->with('success', 'Paket MCU berhasil dihapus');

        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi error
            DB::rollBack();

            return redirect()->back()
                ->with('error', 'Gagal menghapus Paket MCU: ' . $e->getMessage());
        }
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