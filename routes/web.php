<?php

use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TbmController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\DashboardController;

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

Route::prefix('admin')->middleware('auth')->group( function () {
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
      Route::get('/tambah/buku', [BukuController::class, 'create'])->name('buku.create');
      Route::post('/tambah-buku', [BukuController::class, 'store'])->name('buku.store');
      Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');

      // Buku
      Route::get('/pengurus', [PengurusController::class, 'index'])->name('pengurus.index');
      Route::get('/tambah-pengurus', [PengurusController::class, 'create'])->name('pengurus.create');
      Route::post('/tambah-pengurus', [PengurusController::class, 'store'])->name('pengurus.store');
      Route::delete('/pengurus/{id}', [PengurusController::class, 'destroy'])->name('pengurus.destroy');

});


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');