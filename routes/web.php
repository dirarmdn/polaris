<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/about', [HomeController::class,'about'])->name('home.about');
Route::get('/pengajuan', [PengajuanController::class, 'index'])->name('pengajuan');
Route::get('/pengajuan/detail', [PengajuanController::class,'show'])->name('pengajuan.detail');
Route::get('/pengajuan/create', [PengajuanController::class, 'create'])->name('pengajuan.create');
Route::get('/search', [PengajuanController::class, 'search'])->name('pengajuan.search');
