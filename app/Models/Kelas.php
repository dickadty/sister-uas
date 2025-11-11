<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    /**
     * Relasi dengan Pengguna (guru) yang mengajar kelas.
     */
    public function guru()
    {
        return $this->belongsTo(Pengguna::class, 'guru_id');
    }

    /**
     * Relasi dengan Pengguna (siswa) yang mengikuti kelas.
     */
    public function siswa()
    {
        return $this->belongsToMany(Pengguna::class, 'keanggotaan_kelas', 'kelas_id', 'pengguna_id');
    }
}
