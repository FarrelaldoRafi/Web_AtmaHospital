<?php

namespace App\Http\Controllers;
use Exception;
use App\Models\Layanan;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LayananController extends Controller
{
    public function index()
    {
        $layanan = Layanan::all(); 
        return view('admin.tambahlayanan', compact('layanan'));
    }

    public function edit($id_layanan)
    {
        $layanan = Layanan::all(); // Seluruh data layanan untuk tabel
        $selectedLayanan = Layanan::findOrFail($id_layanan); // Layanan yang sedang diedit
        return view('admin.tambahlayanan', compact('layanan', 'selectedLayanan'));
    }

    public function show($id_layanan)
    {
        return Layanan::findOrFail($id_layanan);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_layanan' => 'required|string|max:100',
            'jenis_layanan' => 'required|string|max:50',
            'deskripsi' => 'nullable|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Lokasi penyimpanan foto
        $layananPicturesPath = storage_path('app/public/layanan_pictures');
        
        // Pastikan direktori ada
        if (!file_exists($layananPicturesPath)) {
            mkdir($layananPicturesPath, 0755, true);
        }

        // Proses upload foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            
            // Generate nama file unik
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            
            // Pindahkan file
            $file->move($layananPicturesPath, $filename);
            
            // Path baru
            $newLayananPath = 'layanan_pictures/' . $filename;

            // Buat layanan baru
            $layanan = Layanan::create([
                'nama_layanan' => $request->nama_layanan,
                'jenis_layanan' => $request->jenis_layanan,
                'deskripsi' => $request->deskripsi,
                'foto' => $newLayananPath
            ]);

            return redirect('/admin/tambahlayanan')->with(['success' => 'Berhasil Menambah Layanan']);
        }

        return redirect('/admin/tambahlayanan')->with(['error' => 'Gagal Mengunggah Foto']);
    }

    public function update(Request $request, $id_layanan)
    {
        $layanan = Layanan::findOrFail($id_layanan);

        $request->validate([
            'nama_layanan' => 'sometimes|string|max:100',
            'jenis_layanan' => 'sometimes|string|max:50',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Lokasi penyimpanan foto
        $layananPicturesPath = storage_path('app/public/layanan_pictures');
        
        // Pastikan direktori ada
        if (!file_exists($layananPicturesPath)) {
            mkdir($layananPicturesPath, 0755, true);
        }

        // Proses upload foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            
            // Generate nama file unik
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            
            // Pindahkan file
            $file->move($layananPicturesPath, $filename);
            
            // Path baru
            $newLayananPath = 'layanan_pictures/' . $filename;

            // Hapus foto lama jika ada
            if ($layanan->foto) {
                $oldFilePath = storage_path('app/public/' . $layanan->foto);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }

            // Update path foto layanan
            $layanan->foto = $newLayananPath;
        }

        // Update data lainnya
        $layanan->nama_layanan = $request->input('nama_layanan');
        $layanan->jenis_layanan = $request->input('jenis_layanan');
        $layanan->deskripsi = $request->input('deskripsi');
        $layanan->save();

        return redirect('/admin/tambahlayanan')->with(['success' => 'Berhasil Mengupdate Layanan']);
    }

    public function destroy($id_layanan)
    {
        $layanan = Layanan::findOrFail($id_layanan);
        
        // Hapus foto layanan jika ada
        if ($layanan->foto && Storage::disk('public')->exists($layanan->foto)) {
            Storage::disk('public')->delete($layanan->foto);
        }
        
        $layanan->delete();
        return redirect('/admin/tambahlayanan')->with(['success' => 'Berhasil Hapus Layanan']);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $layanan = Layanan::where('nama_layanan', 'LIKE', "%{$query}%")
            ->orWhere('jenis_layanan', 'LIKE', "%{$query}%")
            ->get();

        return response()->json($layanan, 200);
    }
}