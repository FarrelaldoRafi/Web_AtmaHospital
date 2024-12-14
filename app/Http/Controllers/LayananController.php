<?php

namespace App\Http\Controllers;
use Exception;
use App\Models\Layanan;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
            'foto' => 'required|image'
        ]);

        try {
        $image = $request->file('foto');
        $imageName = time() . '_' . $image->getClientOriginalName(); 
        $image->move(public_path('images'), $imageName);

        // $layanan = Layanan::create($request->all());
        Layanan::create([
            'nama_layanan' => $request->nama_layanan,
            'jenis_layanan' => $request->jenis_layanan,
            'deskripsi' => $request->deskripsi,
            'foto' => $imageName
        ]);

            return redirect('/admin/tambahlayanan')->with(['success' => 'Berhasil Menambah Layanan']);
        } catch (Exception $e) {
            return redirect('/admin/tambahlayanan')->with(['error' => 'Tidak berhasil Menambah Layanan']);
        }
    }

    public function update(Request $request, $id_layanan)
    {
        $layanan = Layanan::findOrFail($id_layanan);

        $request->validate([
            'nama_layanan' => 'sometimes|string|max:100',
            'jenis_layanan' => 'sometimes|string|max:50',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image'
        ]);

        $layanan->nama_layanan = $request->input('nama_layanan');
        $layanan->jenis_layanan = $request->input('jenis_layanan');
        $layanan->deskripsi = $request->input('deskripsi');

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);

            // Hapus foto lama jika ada
            if (File::exists(public_path('images/' . $layanan->foto))) {
                File::delete(public_path('images/' . $layanan->foto));
            }
            $layanan->foto = $imageName;
        }

        $layanan->save();

        return redirect('/admin/tambahlayanan')->with(['success' => 'Berhasil Mengupdate Layanan']);
    }

    public function destroy($id_layanan)
    {
        $layanan = Layanan::findOrFail($id_layanan);
        if (File::exists(public_path('images/' . $layanan->foto))) {
            File::delete(public_path('images/' . $layanan->foto));
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