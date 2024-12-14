<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:50',
            'password' => 'required|string|min:6',
        ]);

        $admin = Admin::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return response()->json($admin, 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $admin = Admin::where('username', $request->username)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            session(['user' => [
                'id' => $admin->id,
                'name' => $admin->username,
                'role' => 'admin'
            ]]);
            return redirect('/admin/dashadmin');
        }

        return back()->withErrors(['username' => 'The provided credentials do not match our records.']);
    }

    public function index()
    {
        return Admin::all();
    }

    public function show($id)
    {
        return Admin::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
        $admin->username = $request->username;
        if ($request->password) {
            $admin->password = Hash::make($request->password);
        }
        $admin->save();

        return response()->json($admin, 200);
    }

    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return response()->json(null, 204);
    }
}