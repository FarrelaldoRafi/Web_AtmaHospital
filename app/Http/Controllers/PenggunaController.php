<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'username' => 'required|string|max:50|unique:pengguna',
            'password' => 'required|string|min:6',
            'email' => 'required|string|email|max:100|unique:pengguna',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'no_telp' => 'required|string|max:15',
            'foto_profil' => 'nullable|image|max:2048' // Validasi untuk gambar
        ]);

        // Jika ada file foto_profil, simpan ke storage
        $fotoProfilPath = $request->hasFile('foto_profil') ? $request->file('foto_profil')->store('profile_pictures', 'public') : null;

        $pengguna = Pengguna::create([
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'foto_profil' => $fotoProfilPath,
        ]);

        return response()->json($pengguna, 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $pengguna = Pengguna::where('username', $request->username)->first();

        if ($pengguna && Hash::check($request->password, $pengguna->password)) {
            session(['user' => [
                'id' => $pengguna->id_pengguna, // Sesuaikan dengan primary key
                'name' => $pengguna->nama_lengkap,
                'role' => 'user'
            ]]);
            return redirect('/');
        }

        return back()->withErrors(['username' => 'The provided credentials do not match our records.']);
    }

    public function index()
    {
        return Pengguna::all();
    }

    public function show($id)
    {
        return Pengguna::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $pengguna = Pengguna::findOrFail($id);

        $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'username' => 'required|string|max:50|unique:pengguna,username,' . $pengguna->id_pengguna,
            'email' => 'required|string|email|max:100|unique:pengguna,email,' . $pengguna->id_pengguna,
            'tanggal_lahir' => 'nullable|date',
            'alamat' => 'nullable|string|max:255',
            'no_telp' => 'nullable|string|max:15',
            'foto_profil' => 'nullable|image|max:2048' // Validasi untuk gambar
        ]);

        // Jika ada file foto_profil, simpan ke storage
        if ($request->hasFile('foto_profil')) {
            // Hapus foto_profil lama jika ada
            if ($pengguna->foto_profil && Storage::disk('public')->exists($pengguna->foto_profil)) {
                Storage::disk('public')->delete($pengguna->foto_profil);
            }
            $pengguna->foto_profil = $request->file('foto_profil')->store('profile_pictures', 'public');
        }

        $pengguna->nama_lengkap = $request->nama_lengkap;
        $pengguna->username = $request->username;

        if ($request->password) {
            $pengguna->password = Hash::make($request->password);
        }

        $pengguna->email = $request->email;
        $pengguna->tanggal_lahir = $request->tanggal_lahir;
        $pengguna->alamat = $request->alamat;
        $pengguna->no_telp = $request->no_telp;
        $pengguna->save();

        return response()->json($pengguna, 200);
    }

    public function destroy($id)
    {
        $pengguna = Pengguna::findOrFail($id);
        // Hapus foto_profil jika ada
        if ($pengguna->foto_profil && Storage::disk('public')->exists($pengguna->foto_profil)) {
            Storage::disk('public')->delete($pengguna->foto_profil);
        }
        $pengguna->delete();

        return response()->json(null, 204);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $pengguna = Pengguna::where('nama_lengkap', 'LIKE', "%{$query}%")
            ->orWhere('username', 'LIKE', "%{$query}%")
            ->get();

        return response()->json($pengguna, 200);
    }
}