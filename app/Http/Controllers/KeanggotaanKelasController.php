<?php

namespace App\Http\Controllers;

use App\Models\KeanggotaanKelas;
use App\Models\Kelas;
use App\Models\Pengguna;
use Illuminate\Http\Request;

class KeanggotaanKelasController extends Controller
{
    /**
     * Menampilkan daftar keanggotaan kelas.
     */
    public function index()
    {
        // Mengambil semua data keanggotaan kelas
        $keanggotaanKelas = KeanggotaanKelas::all();
        return view('keanggotaan_kelas.index', compact('keanggotaanKelas'));
    }

    /**
     * Menampilkan form untuk membuat keanggotaan kelas baru.
     */
    public function create()
    {
        // Mengambil semua kelas dan siswa yang tersedia
        $kelas = Kelas::all();
        $siswa = Pengguna::where('role', 'siswa')->get();

        return view('keanggotaan_kelas.create', compact('kelas', 'siswa'));
    }

    /**
     * Menyimpan keanggotaan kelas baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kelas_id' => 'required|exists:kelas,id',  // pastikan kelas_id ada di tabel kelas
            'pengguna_id' => 'required|exists:pengguna,id',  // pastikan pengguna_id ada di tabel pengguna
        ]);

        // Membuat data keanggotaan kelas
        KeanggotaanKelas::create([
            'kelas_id' => $request->kelas_id,
            'pengguna_id' => $request->pengguna_id,
        ]);

        // Redirect setelah berhasil
        return redirect()->route('keanggotaan_kelas.index');
    }

    /**
     * Menampilkan detail keanggotaan kelas.
     */
    public function show($id)
    {
        // Menampilkan detail berdasarkan id keanggotaan
        $keanggotaanKelas = KeanggotaanKelas::findOrFail($id);
        return view('keanggotaan_kelas.show', compact('keanggotaanKelas'));
    }

    /**
     * Menampilkan form untuk mengedit keanggotaan kelas.
     */
    public function edit($id)
    {
        $keanggotaanKelas = KeanggotaanKelas::findOrFail($id);
        $kelas = Kelas::all();
        $siswa = Pengguna::where('role', 'siswa')->get();

        return view('keanggotaan_kelas.edit', compact('keanggotaanKelas', 'kelas', 'siswa'));
    }

    /**
     * Memperbarui data keanggotaan kelas.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kelas_id' => 'required|exists:kelas,id',  // pastikan kelas_id ada di tabel kelas
            'pengguna_id' => 'required|exists:pengguna,id',  // pastikan pengguna_id ada di tabel pengguna
        ]);

        $keanggotaanKelas = KeanggotaanKelas::findOrFail($id);
        $keanggotaanKelas->update([
            'kelas_id' => $request->kelas_id,
            'pengguna_id' => $request->pengguna_id,
        ]);

        return redirect()->route('keanggotaan_kelas.index');
    }

    /**
     * Menghapus keanggotaan kelas.
     */
    public function destroy($id)
    {
        $keanggotaanKelas = KeanggotaanKelas::findOrFail($id);
        $keanggotaanKelas->delete();

        return redirect()->route('keanggotaan_kelas.index');
    }
}
