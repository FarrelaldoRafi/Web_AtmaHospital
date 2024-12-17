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
    $validatedData = $request->validate([
        'nama_lengkap' => 'required|string|max:100',
        'username' => [
            'required',
            'string',
            'max:50',
            'unique:pengguna',
            'regex:/^[a-zA-Z0-9_]+$/'
        ],
        'password' => [
            'required', 
            'string', 
            'min:6',
            'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/'
        ],
        'email' => 'required|string|email|max:100|unique:pengguna',
        'tanggal_lahir' => 'required|date|before:today',
        'alamat' => 'required|string|max:255',
        'no_telp' => [
            'required', 
            'string', 
            'regex:/^[0-9]{10,13}$/',
        ]
    ], [
        'username.unique' => 'Username sudah digunakan.',
        'username.regex' => 'Username hanya boleh huruf, angka, dan underscore.',
        'password.regex' => 'Password harus minimal 6 karakter dan mengandung huruf serta angka.',
        'no_telp.regex' => 'Nomor telepon harus terdiri dari 10 hingga 13 digit.',
        'tanggal_lahir.before' => 'Tanggal lahir tidak boleh di masa depan.',
    ]);

    // Default profile picture path
    $defaultProfilePath = 'profile_pictures/default.jpg';

    $pengguna = Pengguna::create([
        'nama_lengkap' => $request->nama_lengkap,
        'username' => $request->username,
        'password' => Hash::make($request->password),
        'email' => $request->email,
        'tanggal_lahir' => $request->tanggal_lahir,
        'alamat' => $request->alamat,
        'no_telp' => $request->no_telp,
        'foto_profil' => $defaultProfilePath,
    ]);

    // Kembalikan response JSON untuk AJAX
    return response()->json([
        'success' => true,
        'message' => 'Berhasil register Pengguna!'
    ], 200);
}

    public function update(Request $request)
    {
        $pengguna = Pengguna::findOrFail(session('user.id'));

        $validatedData = $request->validate([
            'fullName' => 'required|string|max:100',
            'username' => 'required|string|max:50|unique:pengguna,username,' . $pengguna->id_pengguna . ',id_pengguna',
            'email' => 'required|string|email|max:100|unique:pengguna,email,' . $pengguna->id_pengguna . ',id_pengguna',
            'dob' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Lokasi penyimpanan foto
        $profilePicturesPath = storage_path('app/public/profile_pictures');
        
        // Pastikan direktori ada
        if (!file_exists($profilePicturesPath)) {
            mkdir($profilePicturesPath, 0755, true);
        }

        // Proses upload foto
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            
            // Generate nama file unik
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            
            // Pindahkan file
            $file->move($profilePicturesPath, $filename);
            
            // Path baru
            $newProfilePath = 'profile_pictures/' . $filename;

            // Hapus foto lama jika bukan default
            if ($pengguna->foto_profil && 
                $pengguna->foto_profil !== 'profile_pictures/default.jpg') {
                $oldFilePath = storage_path('app/public/' . $pengguna->foto_profil);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }

            // Update path foto profil
            $pengguna->foto_profil = $newProfilePath;
        }

        // Update data lainnya
        $pengguna->nama_lengkap = $request->input('fullName');
        $pengguna->username = $request->input('username');
        $pengguna->email = $request->input('email');
        $pengguna->tanggal_lahir = $request->input('dob');
        $pengguna->alamat = $request->input('address');
        $pengguna->no_telp = $request->input('phone');
        $pengguna->save();

        // Update session
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
            'image_url' => asset('storage/' . $pengguna->foto_profil)
        ], 200);
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

    public function logout(Request $request)
{
    // Hapus token Sanctum
    if ($request->user()) {
        $request->user()->currentAccessToken()->delete();
    }

    // Hapus session
    session()->forget('user');
    return redirect('/login');
}
}