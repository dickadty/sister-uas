<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;

    protected $table = 'pengguna';

    public function tugas()
    {
        return $this->hasMany(Tugas::class, 'dibuat_oleh');
    }

    public function pengumpulanTugas()
    {
        return $this->hasMany(PengumpulanTugas::class, 'pengguna_id');
    }

    public function kelas()
    {
        return $this->belongsToMany(Kelas::class, 'keanggotaan_kelas', 'pengguna_id', 'kelas_id');
    }
}
