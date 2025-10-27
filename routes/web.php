<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PakanController;
use App\Http\Controllers\DasborController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\ProduksiController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\StokKeluarController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/', [DasborController::class, 'dasbor'])->name('/');   
    Route::resource('produksi', ProduksiController::class);
    Route::resource('pakan', PakanController::class);
    Route::resource('stok-keluar', StokKeluarController::class);
    Route::resource('pelanggan', PelangganController::class);
    // Route::get('/keuangan', [KeuanganController::class, 'keuangan'])->name('keuangan');
    Route::get('/keuangan', [KeuanganController::class, 'keuangan'])->name('keuangan.keuangan');
    Route::get('/laporan/{jenis}/cetak', [LaporanController::class, 'cetak'])->name('laporan.cetak');
});



// Route::get('/laporan/pakan/{type}', [LaporanController::class, 'pakan'])->name('laporan.pakan');
