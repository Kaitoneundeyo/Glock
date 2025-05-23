<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\HargaController;
use App\Http\Controllers\GambarProdukController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UtamaController;
use App\Models\Stok;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login-proses', [AuthController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/home', [HomeController::class, 'index'])->name('home.index');

Route::get('/user', [UtamaController::class, 'index'])->name('user.index');
Route::get('/user/create', [UtamaController::class, 'create'])->name('user.create');
Route::post('/user/store', [UtamaController::class, 'store'])->name('user.store');
Route::get('/user/{id}/edit', [UtamaController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}/update', [UtamaController::class, 'update'])->name('user.update');
Route::delete('/user/{id}', [UtamaController::class, 'destroy'])->name('user.destroy');


Route::get('/kt', [CategoriesController::class, 'index'])->name('kategori.index');
Route::get('/kt/create', [CategoriesController::class, 'create'])->name('kategori.create');
Route::post('/kt/store', [CategoriesController::class, 'store'])->name('kategori.store');
Route::get('/kt/{id}/edit', [CategoriesController::class, 'edit'])->name('kategori.edit');
Route::put('/kt/{id}/update', [CategoriesController::class, 'update'])->name('kategori.update');
Route::delete('/kt/{id}/destroy', [CategoriesController::class, 'destroy'])->name('kategori.destroy');


Route::get('/pd', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/st', [StokController::class, 'index'])->name('stok.index');
Route::get('/hg', [HargaController::class, 'index'])->name('harga.index');
Route::get('/gp', [GambarProdukController::class, 'index'])->name('gp.index');
