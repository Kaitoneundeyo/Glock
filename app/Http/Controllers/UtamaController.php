<?php

namespace App\Http\Controllers;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UtamaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Users::all(); // ambil semua data user

        return view('dashboard', compact('users'));
    }

    public function create()
    {
        return view('user.form_ts');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        Users::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('dashboard')->with('success', 'User berhasil ditambahkan!');
    }

    public function edit($id)
    {
    $user = Users::findOrFail($id); // Cari user berdasarkan id, kalau tidak ketemu akan otomatis 404

    return view('user.form_ts', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = Users::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:id,email,'.$id,
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('dashboard')->with('success', 'User berhasil diupdate!');
    }

    public function destroy($id)
    {
        $user = Users::findOrFail($id);
        $user->delete();

        return redirect()->route('dashboard')->with('success', 'User berhasil dihapus!');
    }
}
