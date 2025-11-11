<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    protected $table = 'tugas';

    /**
     * Relasi dengan PengumpulanTugas yang dikumpulkan oleh siswa.
     */
    public function pengumpulanTugas()
    {
        return $this->hasMany(PengumpulanTugas::class);
    }

    /**
     * Relasi dengan Pengguna (guru) yang membuat tugas.
     */
    public function guru()
    {
        return $this->belongsTo(Pengguna::class, 'dibuat_oleh');
    }
}
