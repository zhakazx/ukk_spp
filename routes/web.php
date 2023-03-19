<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\KwitansiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function() {
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    Route::group(['middleware' => 'admin'], function() {
        Route::resource('siswa', SiswaController::class);
        Route::resource('kelas', KelasController::class, ['parameters' => ['kelas' => 'kelas']]);
        Route::resource('spp', SppController::class);
        Route::resource('petugas', PetugasController::class);
    });
    
    Route::get('pembayaran', [PembayaranController::class, 'index'])->name('pembayaran');
    Route::get('pembayaran/{siswa:nis}', [PembayaranController::class, 'transaksi'])->name('transaksi');
    Route::post('pembayaran/{siswa:nis}/bayar', [PembayaranController::class, 'bayar'])->name('bayar');

    Route::get('kwitansi/siswa', [KwitansiController::class, 'kwitansiSiswa'])->name('kwitansi.siswa');
    Route::get('kwitansi/siswa/cetak/{nis}', [KwitansiController::class, 'cetakKwitansiSiswa'])->name('cetak.kwitansi.siswa');
    Route::get('kwitansi/kelas', [KwitansiController::class, 'kwitansiKelas'])->name('kwitansi.kelas');
    Route::get('kwitansi/kelas/cetak/{id}', [KwitansiController::class, 'cetakKwitansiKelas'])->name('cetak.kwitansi.kelas');
    Route::get('kwitansi/tunggakan', [KwitansiController::class, 'kwitansiTunggakan'])->name('kwitansi.tunggakan');
    Route::get('kwitansi/tunggakan/cetak/{id}', [KwitansiController::class, 'cetakTunggakan'])->name('cetak.kwitansi.tunggakan');
});