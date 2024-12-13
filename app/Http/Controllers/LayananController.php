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
        return Layanan::all();
    }

    public function show($id)
    {
        return Layanan::findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_admin' => 'required|exists:admin,id_admin',
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
            'id_admin' => $request->id_admin,
            'nama_layanan' => $request->nama_layanan,
            'jenis_layanan' => $request->jenis_layanan,
            'deskripsi' => $request->deskripsi,
            'foto' => $imageName
        ]);

            return redirect('/admin/tambahlayanan')->with(['success' => 'Berhasil Menambah Layanan']);
        } catch (Exception $e) {
            \Log::error('Error storing layanan: ' . $e->getMessage());
            return redirect('/admin/tambahlayanan')->with(['error' => 'Tidak berhasil Menambah Layanan']);
        }
    }

    public function update(Request $request, $id)
    {
        $layanan = Layanan::findOrFail($id);

        $request->validate([
            'nama_layanan' => 'sometimes|string|max:100',
            'jenis_layanan' => 'sometimes|string|max:50',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image'
        ]);

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

        $layanan->update($request->except('foto'));
        $layanan->save();

        return redirect('/admin/layanan')->with(['success' => 'Berhasil Mengupdate Layanan']);
    }

    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);
        if (File::exists(public_path('images/' . $layanan->foto))) {
            File::delete(public_path('images/' . $layanan->foto));
        }
        $layanan->delete();
        return redirect('/admin/layanan')->with(['success' => 'Berhasil Menghapus Layanan']);
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