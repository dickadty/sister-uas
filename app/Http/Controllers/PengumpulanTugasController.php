<?php

namespace App\Http\Controllers;

use App\Models\PengumpulanTugas;
use App\Models\Tugas;
use App\Models\Pengguna;
use Illuminate\Http\Request;

class PengumpulanTugasController extends Controller
{
    public function index()
    {
        $pengumpulanTugas = PengumpulanTugas::all();
        return view('pengumpulan_tugas.index', compact('pengumpulanTugas'));
    }

    public function show($id)
    {
        $pengumpulanTugas = PengumpulanTugas::findOrFail($id);
        return view('pengumpulan_tugas.show', compact('pengumpulanTugas'));
    }

    public function create($tugas_id)
    {
        $tugas = Tugas::findOrFail($tugas_id);
        $siswa = Pengguna::where('role', 'siswa')->get();
        return view('pengumpulan_tugas.create', compact('tugas', 'siswa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tugas_id' => 'required|exists:tugas,id',
            'pengguna_id' => 'required|exists:pengguna,id',
            'file_path' => 'required|file',
        ]);

        $file = $request->file('file_path');
        $path = $file->store('tugas', 'public');

        PengumpulanTugas::create([
            'tugas_id' => $request->tugas_id,
            'pengguna_id' => $request->pengguna_id,
            'file_path' => $path,
        ]);

        return redirect()->route('pengumpulan_tugas.index');
    }
}
