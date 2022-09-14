<?php

use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TbmController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/edit/password', [UserController::class, 'edit'])->middleware(['auth'])->name('edit.password');
Route::put('/edit/password', [UserController::class, 'update'])->middleware(['auth']);


Route::prefix('list-buku')->middleware(['auth', 'anggota'])->group(function () {
    // Buku
    Route::get('/', [BukuController::class, 'buku_anggota'])->name('buku.anggota');

    // Tbm
    Route::get('/tbm-anggota', [TbmController::class, 'tbm_anggota'])->name('tbm.anggota');


    // Peminjaman
    Route::get('/daftar-pinjam', [PeminjamanController::class, 'index'])->name('peminjaman.index');
    Route::get('/detail-peminjaman', [PeminjamanController::class, 'detail_peminjaman'])->name('peminjaman.detail');
    Route::get('/pinjam/{id}', [PeminjamanController::class, 'create'])->name('peminjaman.create');
    Route::get('/pay', [PeminjamanController::class, 'pay'])->name('peminjaman.pay');
    Route::post('/pinjam', [PeminjamanController::class, 'store'])->name('peminjaman.store');
    Route::delete('/pinjam/{id}', [PeminjamanController::class, 'destroy'])->name('peminjaman.destroy');
    Route::get('/riwayat-pinjam_anggota', [PeminjamanController::class, 'riwayat_anggota'])->name('peminjaman.riwayat_anggota');


});

Route::prefix('admin')->middleware(['auth', 'admin'])->group( function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    // Kategori
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/tambah-kategori', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/tambah-kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

     // TBM
     Route::get('/tbm', [TbmController::class, 'index'])->name('tbm.index');
     Route::get('/tambah-tbm', [TbmController::class, 'create'])->name('tbm.create');
     Route::post('/tambah-tbm', [TbmController::class, 'store'])->name('tbm.store');
     Route::delete('/tbm/{id}', [TbmController::class, 'destroy'])->name('tbm.destroy');
    

      // Buku
      Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
      Route::get('/buku-pengurus', [BukuController::class, 'buku_pengurus'])->name('buku.pengurus');
      Route::get('/tambah/buku', [BukuController::class, 'create'])->name('buku.create');
      Route::post('/tambah-buku', [BukuController::class, 'store'])->name('buku.store');
      Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');

      // Pengurus
      Route::get('/pengurus', [PengurusController::class, 'index'])->name('pengurus.index');
      Route::get('/tambah-pengurus', [PengurusController::class, 'create'])->name('pengurus.create');
      Route::post('/tambah-pengurus', [PengurusController::class, 'store'])->name('pengurus.store');
      Route::delete('/pengurus/{id}', [PengurusController::class, 'destroy'])->name('pengurus.destroy');

      //   Peminjaman
      Route::get('/daftar-pinjam-pengurus', [PeminjamanController::class, 'pengurus'])->name('peminjaman.pengurus');
      Route::get('/riwayat-pinjam', [PeminjamanController::class, 'riwayat'])->name('peminjaman.riwayat');
      Route::post('/verifikasi/{id}', [PeminjamanController::class, 'verifikasi'])->name('peminjaman.verifikasi');
      Route::get('/peminjaman-edit/{id}', [PeminjamanController::class, 'edit'])->name('peminjaman.edit');
      Route::put('/update-peminjaman/{id}', [PeminjamanController::class, 'update'])->name('peminjaman.update');
      Route::delete('/pinjam/{id}', [PeminjamanController::class, 'retur_buku'])->name('peminjaman.retur');

});


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
