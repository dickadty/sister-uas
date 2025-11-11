<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Pengguna;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return view('kelas.index', compact('kelas'));
    }

    public function show($id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('kelas.show', compact('kelas'));
    }

    public function create()
    {
        $gurus = Pengguna::where('role', 'guru')->get();
        return view('kelas.create', compact('gurus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required',
            'guru_id' => 'required|exists:pengguna,id',
        ]);

        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'guru_id' => $request->guru_id,
        ]);

        return redirect()->route('kelas.index');
    }
}
