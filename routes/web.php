<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KompetensiController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\TahunAjaranController;
use App\Http\Middleware\CekLevel;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/register', [AuthController::class, 'postRegister'])->name('postRegister');

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'postlogin'])->name('postlogin');

Route::get('/logout', [AuthController::class,'logout'])->name('logout');


//ROUTE GRUP BERSAMA

Route::middleware([CekLevel::class . ':1, 2, 3'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::get('/layout', function () {
        return view('layout.admin');
    });
});


//ROUTE GRUP ADMIN


Route::middleware([CekLevel::class . ':1'])->group(function () {
    Route::get('/barang', [BarangController::class,'index'])->name('barang.index');
    });

//ROUTE GRUP USER

Route::post('/barang', [BarangController::class,'store'])->name('barang.store');
Route::get('/barang/update/{id_barang}', [BarangController::class,'edit'])->name('barang.edit');
Route::post('/barang/update-barang/{id_user}', [BarangController::class,'update'])->name('barang.update');
Route::post('/barang/hapus/{id_user}', [BarangController::class,'destroy'])->name('barang.destroy');
Route::get('/barang/create', [BarangController::class,'create'])->name('barang.create');

//ROUTE GRUP GURU
Route::get('/guru', [GuruController::class,'index'])->name('guru.index');
Route::post('/guru', [GuruController::class,'store'])->name('guru.store');
Route::get('/guru/update/{id}', [GuruController::class,'edit'])->name('guru.edit');
Route::post('/guru/update-guru/{id}', [GuruController::class,'update'])->name('guru.update');
Route::post('/guru/hapus/{id}', [GuruController::class,'destroy'])->name('guru.destroy');

//ROUTE GRUP Kriteria
Route::get('/kriteria', [KriteriaController::class,'index'])->name('kriteria.index');
Route::post('/kriteria', [KriteriaController::class,'store'])->name('kriteria.store');
Route::get('/kriteria/update/{id}', [KriteriaController::class,'edit'])->name('kriteria.edit');
Route::post('/kriteria/update-kriteria/{id}', [KriteriaController::class,'update'])->name('kriteria.update');
Route::post('/kriteria/hapus/{id}', [KriteriaController::class,'destroy'])->name('kriteria.destroy');


//ROUTE GRUP KOMPETENSI
Route::get('/kompetensi', [KompetensiController::class,'index'])->name('kompetensi.index');
Route::post('/kompetensi', [KompetensiController::class,'store'])->name('kompetensi.store');
Route::get('/kompetensi/update/{id}', [KompetensiController::class,'edit'])->name('kompetensi.edit');
Route::post('/kompetensi/update-kompetensi/{id}', [KompetensiController::class,'update'])->name('kompetensi.update');
Route::post('/kompetensi/hapus/{id}', [KompetensiController::class,'destroy'])->name('kompetensi.destroy');

//ROUTE GRUP TAHUN AJARAN
Route::get('/tahun_ajaran', [TahunAjaranController::class,'index'])->name('tahun_ajaran.index');
Route::post('/tahun_ajaran', [TahunAjaranController::class,'store'])->name('tahun_ajaran.store');
Route::get('/tahun_ajaran/update/{id}', [TahunAjaranController::class,'edit'])->name('tahun_ajaran.edit');
Route::post('/tahun_ajaran/update-tahun_ajaran/{id}', [TahunAjaranController::class,'update'])->name('tahun_ajaran.update');
Route::post('/tahun_ajaran/hapus/{id}', [TahunAjaranController::class,'destroy'])->name('tahun_ajaran.destroy');

//ROUTE GRUP PENILAIN
Route::get('/penilain', [PenilaianController::class,'index'])->name('penilaian.index');