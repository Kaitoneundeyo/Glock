<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\HargaController;
use App\Http\Controllers\GambarProdukController;
use App\Http\Controllers\UtamaController;
use App\Models\Stok;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login-proses', [AuthController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/index', [UtamaController::class, 'index'])->name('index');
Route::get('/user/create', [UtamaController::class, 'create'])->name('user.create');
Route::post('/user/store', [UtamaController::class, 'store'])->name('user.store');
Route::put('/user/{id}/edit', [UtamaController::class, 'edit'])->name('user.edit');
Route::post('/user/{id}/update', [UtamaController::class, 'update'])->name('user.update');
Route::get('/user/{id}/destroy', [UtamaController::class, 'destroy'])->name('user.destroy');


Route::get('/kt', [CategoriesController::class, 'index'])->name('kategori.index');
Route::get('/kt/create', [CategoriesController::class, 'create'])->name('kategori.create');
Route::post('/kt/store', [CategoriesController::class, 'store'])->name('kategori.store');
Route::get('/kt/{id}/edit', [CategoriesController::class, 'edit'])->name('kategori.edit');
Route::put('/kt/{id}/update', [CategoriesController::class, 'update'])->name('kategori.update');
Route::get('/kt/{id}/destroy', [CategoriesController::class, 'destroy'])->name('kategori.destroy');



Route::get('/datatp', [ProdukController::class, 'index'])->name('produk.data');
Route::get('/datast', [StokController::class, 'index'])->name('stok.data');
Route::get('/datahg', [HargaController::class, 'index'])->name('harga.data');
Route::get('/datagp', [GambarProdukController::class, 'index'])->name('gp.data');
