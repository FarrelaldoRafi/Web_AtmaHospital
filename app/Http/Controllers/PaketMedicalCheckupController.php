<?php

namespace App\Http\Controllers;

use App\Models\PaketMedicalCheckup;
use Illuminate\Http\Request;

class PaketMedicalCheckupController extends Controller
{
    public function index()
    {
        return PaketMedicalCheckup::all();
    }

    public function show($id)
    {
        return PaketMedicalCheckup::findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_admin' => 'required|exists:admin,id_admin',
            'nama_paket' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric',
        ]);

        $paketMCU = PaketMedicalCheckup::create($request->all());

        return response()->json($paketMCU, 201);
    }

    public function update(Request $request, $id)
    {
        $paketMCU = PaketMedicalCheckup::findOrFail($id);
        $paketMCU->update($request->all());

        return response()->json($paketMCU, 200);
    }

    public function destroy($id)
    {
        $paketMCU = PaketMedicalCheckup::findOrFail($id);
        $paketMCU->delete();

        return response()->json(null, 204);
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