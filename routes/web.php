<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UtamaController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login-proses', [AuthController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/index', [UtamaController::class, 'index'])->name('dashboard');
Route::get('/create', [UtamaController::class,'create'])->name('user.create');
Route::post('/store', [UtamaController::class, 'store'])->name('user.store');
Route::get('/edit', [UtamaController::class, 'edit'])->name('user.edit');
Route::post('/update', [UtamaController::class, 'update'])->name('user.update');
Route::get('/destroy', [UtamaController::class, 'destroy'])->name('user.destroy');

Route::get('/datakt', [CategoriesController::class, 'index'])->name('kategori.data');
Route::get('/createkt', [CategoriesController::class, 'create'])->name('kategori.form');
Route::post('/storekt', [CategoriesController::class, 'store'])->name('kategori.store');
Route::get('/editkt', [CategoriesController::class, 'edit'])->name('kategori.edit');
Route::post('/updatekt', [CategoriesController::class, 'update'])->name('kategori.update');
Route::get('/destroykt', [CategoriesController::class,'destroy'])->name('kategori.destroy');
