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
    
    $pendaftaranMCU = PendaftaranMedicalCheckup::with('paketMCU')->get();

    return view('admin.medicalcheckup', compact('paketMCU', 'layanan', 'pendaftaranMCU'));
}

    public function store(Request $request)
    {
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
            DB::beginTransaction();

            $paketMCU = PaketMedicalCheckup::create([
                'nama_paket' => $request->nama_paket,
                'deskripsi' => $request->deskripsi,
                'harga' => $request->harga
            ]);

            $layananIds = explode(',', $request->selected_layanan);
            
            $detailLayanan = [];
            foreach ($layananIds as $layananId) {
                $detailLayanan[] = [
                    'id_paketMCU' => $paketMCU->id_paketMCU,
                    'id_layanan' => $layananId
                ];
            }

            DetailTambahPaketMCU::insert($detailLayanan);

            DB::commit();

            return redirect()->route('admin.medicalcheckup.index')
                ->with('success', 'Paket MCU berhasil ditambahkan');

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()
                ->with('error', 'Gagal menambahkan Paket MCU: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function update(Request $request, $id)
    {
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
            DB::beginTransaction();

            $paketMCU = PaketMedicalCheckup::findOrFail($id);

            $paketMCU->update([
                'nama_paket' => $request->nama_paket,
                'deskripsi' => $request->deskripsi,
                'harga' => $request->harga
            ]);

            DetailTambahPaketMCU::where('id_paketMCU', $id)->delete();

            $layananIds = explode(',', $request->selected_layanan);
            
            $detailLayanan = [];
            foreach ($layananIds as $layananId) {
                $detailLayanan[] = [
                    'id_paketMCU' => $paketMCU->id_paketMCU,
                    'id_layanan' => $layananId
                ];
            }

            DetailTambahPaketMCU::insert($detailLayanan);

            DB::commit();

            return redirect()->route('admin.medicalcheckup.index')
                ->with('success', 'Paket MCU berhasil diupdate');

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()
                ->with('error', 'Gagal mengupdate Paket MCU: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            DetailTambahPaketMCU::where('id_paketMCU', $id)->delete();

            $paketMCU = PaketMedicalCheckup::findOrFail($id);
            $paketMCU->delete();

            DB::commit();

            return redirect()->route('admin.medicalcheckup.index')
                ->with('success', 'Paket MCU berhasil dihapus');

        } catch (\Exception $e) {
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