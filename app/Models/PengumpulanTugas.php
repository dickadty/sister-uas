<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengumpulanTugas extends Model
{
    use HasFactory;

    protected $table = 'pengumpulan_tugas';

    /**
     * Relasi dengan Tugas yang dikumpulkan oleh siswa.
     */
    public function tugas()
    {
        return $this->belongsTo(Tugas::class);
    }

    /**
     * Relasi dengan Pengguna (siswa) yang mengumpulkan tugas.
     */
    public function siswa()
    {
        return $this->belongsTo(Pengguna::class, 'pengguna_id');
    }
}
