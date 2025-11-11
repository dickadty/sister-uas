<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\PengumpulanTugasController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KeanggotaanKelasController;

Route::resource('pengguna', PenggunaController::class);
Route::resource('tugas', TugasController::class);
Route::resource('pengumpulan_tugas', PengumpulanTugasController::class);
Route::resource('kelas', KelasController::class);
Route::resource('keanggotaan_kelas', KeanggotaanKelasController::class);
