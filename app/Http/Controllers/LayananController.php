<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

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
        ]);

        $layanan = Layanan::create($request->all());

        return response()->json($layanan, 201);
    }

    public function update(Request $request, $id)
    {
        $layanan = Layanan::findOrFail($id);
        $layanan->update($request->all());

        return response()->json($layanan, 200);
    }

    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);
        $layanan->delete();

        return response()->json(null, 204);
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