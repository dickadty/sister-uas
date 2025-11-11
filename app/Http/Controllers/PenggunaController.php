<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    {
        $pengguna = Pengguna::all();
        return view('pengguna.index', compact('pengguna'));
    }

    public function show($id)
    {
        $pengguna = Pengguna::findOrFail($id);
        return view('pengguna.show', compact('pengguna'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:pengguna,email',
            'password' => 'required|min:6',
            'role' => 'required|in:siswa,guru,admin',
        ]);

        $pengguna = new Pengguna();
        $pengguna->nama = $request->nama;
        $pengguna->email = $request->email;
        $pengguna->password = bcrypt($request->password);
        $pengguna->role = $request->role;
        $pengguna->save();

        return redirect()->route('pengguna.index');
    }
}
