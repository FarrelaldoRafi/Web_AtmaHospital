<?php

namespace App\Http\Controllers;

use App\Models\PendaftaranAntrian;
use Illuminate\Http\Request;

class PendaftaranAntrianController extends Controller
{
    public function index()
    {
        return PendaftaranAntrian::all();
    }

    public function show($id)
    {
        return PendaftaranAntrian::findOrFail($id);
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'id_pengguna' => 'required|exists:pengguna,id_pengguna',
        'id_dokter' => 'required|exists:dokter,id_dokter',
        'tanggal_antrian' => 'required|date|after_or_equal:today',
        'namaLengkap_pasien' => 'required|string|max:100',
        'jenis_kelamin_pasien' => 'required|in:Laki-laki,Perempuan',
        'tanggal_lahir_pasien' => 'required|date|before:today',
        'email_pasien' => 'required|email|max:100',
        'no_telp_pasien' => 'required|string|max:15',
    ]);

    $pendaftaranAntrian = PendaftaranAntrian::create($validatedData);

    return response()->json([
        'success' => true,
        'message' => 'Pendaftaran antrian berhasil',
        'data' => $pendaftaranAntrian
    ], 201);
}

    public function update(Request $request, $id)
    {
        $pendaftaranAntrian = PendaftaranAntrian::findOrFail($id);
        $pendaftaranAntrian->update($request->all());

        return response()->json($pendaftaranAntrian, 200);
    }

    public function destroy($id)
    {
        $pendaftaranAntrian = PendaftaranAntrian::findOrFail($id);
        $pendaftaranAntrian->delete();

        return response()->json(null, 204);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $pendaftaranAntrian = PendaftaranAntrian::where('namaLengkap_pasien', 'LIKE', "%{$query}%")
            ->orWhere('no_telp_pasien', 'LIKE', "%{$query}%")
            ->get();

        return response()->json($pendaftaranAntrian, 200);
    }
}