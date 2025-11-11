<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use App\Models\Pengguna;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function index()
    {
        $tugas = Tugas::all();
        return view('tugas.index', compact('tugas'));
    }

    public function show($id)
    {
        $tugas = Tugas::findOrFail($id);
        return view('tugas.show', compact('tugas'));
    }

    public function create()
    {
        $gurus = Pengguna::where('role', 'guru')->get();
        return view('tugas.create', compact('gurus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal_tenggat' => 'required|date',
            'dibuat_oleh' => 'required|exists:pengguna,id',
        ]);

        Tugas::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tanggal_tenggat' => $request->tanggal_tenggat,
            'dibuat_oleh' => $request->dibuat_oleh,
        ]);

        return redirect()->route('tugas.index');
    }
}
