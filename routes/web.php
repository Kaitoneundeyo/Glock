<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UtamaController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login-proses', [AuthController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [UtamaController::class, 'show'])->name('dashboard');

Route::get('/datakt', [CategoriesController::class, 'index'])->name('kategori.data');
Route::get('/createkt', [CategoriesController::class, 'create'])->name('kategori.form');
Route::post('/storekt', [CategoriesController::class, 'store'])->name('kategori.store');
Route::get('/editkt', [CategoriesController::class, 'edit'])->name('kategori.edit');
Route::post('/updatekt', [CategoriesController::class, 'update'])->name('kategori.update');
Route::get('/destroykt', [CategoriesController::class,'destroy'])->name('kategori.destroy');
