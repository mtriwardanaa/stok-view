<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('pengguna', [PenggunaController::class, 'index'])->name('list-pengguna');

Route::get('gaji/tambah', [GajiController::class, 'tambah'])->name('tambah-gaji');
Route::get('gaji', [GajiController::class, 'index'])->name('list-gaji');
Route::get('gaji/export/{id}', [GajiController::class, 'export'])->name('export-gaji');
Route::post('gaji/simpan', [GajiController::class, 'simpan'])->name('simpan-gaji');

Route::get('pegawai', [PegawaiController::class, 'index'])->name('list-pegawai');
Route::get('pegawai/delete/{id}', [PegawaiController::class, 'delete'])->name('delete-pegawai');
Route::get('pegawai/detail/{id}', [PegawaiController::class, 'detail'])->name('detail-pegawai');
