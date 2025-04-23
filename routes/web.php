<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UtamaController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login-proses', [AuthController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/index', [UtamaController::class, 'index'])->name('dashboard');



