<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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

    public function update(Request $request)
    {
        $pengguna = Pengguna::findOrFail(session('user.id'));

        $validatedData = $request->validate([
            'fullName' => 'required|string|max:100',
            'username' => 'required|string|max:50|unique:pengguna,username,' . $pengguna->id_pengguna.',id_pengguna',
            'email' => 'required|string|email|max:100|unique:pengguna,email,' . $pengguna->id_pengguna.',id_pengguna',
            'dob' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
            'profile_picture' => 'nullable|image|max:2048'
        ]);
        // Jika ada file foto_profil, simpan ke storage
        if ($request->hasFile('profile_picture')) {
            if ($pengguna->foto_profil && Storage::disk('public')->exists($pengguna->foto_profil)) {
                Storage::disk('public')->delete($pengguna->foto_profil);
            }
            $pengguna->foto_profil = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        $pengguna->nama_lengkap = $request->input('fullName');
        $pengguna->username = $request->input('username');
        $pengguna->email = $request->input('email');
        $pengguna->tanggal_lahir = $request->input('dob');
        $pengguna->alamat = $request->input('address');
        $pengguna->no_telp = $request->input('phone');
        $pengguna->save();

        session([
            'user' => [
                'id' => $pengguna->id_pengguna,
                'name' => $pengguna->nama_lengkap,
                'username' => $pengguna->username,
                'email' => $pengguna->email,
                'phone' => $pengguna->no_telp,
                'dob' => $pengguna->tanggal_lahir,
                'address' => $pengguna->alamat,
                'profile_picture' => $pengguna->foto_profil,
                'role' => 'user'
            ]
        ]);

        return response()->json([
            'success' => true,
            'image_url' => $pengguna->foto_profil ? asset('storage/' . $pengguna->foto_profil) : null
        ], 200);
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