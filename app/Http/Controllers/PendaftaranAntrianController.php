<?php

namespace App\Http\Controllers;

use App\Models\PendaftaranAntrian;
use App\Models\Dokter;
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

    public function infoAntrian(Request $request)
    {
        if (!session('user')) {
            return redirect('/login');
        }
    
        $userId = session('user.id');
        $pendaftaranAntrianUser = PendaftaranAntrian::where('id_pengguna', $userId)->get();
    
        if ($pendaftaranAntrianUser ->isEmpty()) {
            session()->flash('alert', 'Anda belum melakukan pendaftaran antrian. Silakan mendaftar untuk mendapatkan antrian.');
            return view('infojanji', ['dokterAntrian' => []]);
        }
    
        $dokterIds = $pendaftaranAntrianUser ->pluck('id_dokter')->unique();
    
        $antrian = PendaftaranAntrian::with('dokter')
            ->whereIn('id_dokter', $dokterIds)
            ->orderBy('tanggal_antrian')
            ->get()
            ->groupBy('id_dokter');
    
        $dokterAntrian = [];
    
        foreach ($antrian as $dokterId => $antrianDokter) {
            $antrianDokter = $antrianDokter->sortBy('id_pengguna');
    
            $antrianSaatIni = $antrianDokter->first();
            $antrianSelanjutnya = $antrianDokter->slice(1, 1)->first();
    
            $dokterAntrian[] = [
                'dokter' => $antrianSaatIni->dokter,
                'total_pasien' => $antrianDokter->count(),
                'antrian_saat_ini' => $antrianSaatIni ? $antrianSaatIni->namaLengkap_pasien : null,
                'antrian_selanjutnya' => $antrianSelanjutnya ? $antrianSelanjutnya->namaLengkap_pasien : null,
                'antrian_detail' => $antrianDokter
            ];
        }
    
        $searchQuery = $request->input('search');
        if ($searchQuery) {
            $dokterAntrian = array_filter($dokterAntrian, function($dokterInfo) use ($searchQuery) {
                return (
                    str_contains(strtolower($dokterInfo['dokter']->nama_dokter), strtolower($searchQuery)) ||
                    str_contains(strtolower($dokterInfo['dokter']->spesialis), strtolower($searchQuery))
                );
            });
        }
    
        $selectedSpesialis = $request->input('spesialis');
        if ($selectedSpesialis) {
            $dokterAntrian = array_filter($dokterAntrian, function($dokterInfo) use ($selectedSpesialis) {
                return strtolower($dokterInfo['dokter']->spesialis) === strtolower($selectedSpesialis);
            });
        }
    
        $spesialisList = Dokter::distinct()->pluck('spesialis');
    
        if (empty($dokterAntrian)) {
            session()->flash('alert', 'Anda belum melakukan pendaftaran Antrian Janji untuk spesialis yang dipilih.');
        }
    
        // dd($dokterAntrian);
        return view('infojanji', compact('dokterAntrian', 'spesialisList'));
    }
}    