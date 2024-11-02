<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataPengajuanController;
use App\Http\Controllers\LoginController;

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register/user', [AuthController::class, 'register'])->name('user.register');
Route::get('/about', [HomeController::class,'about'])->name('home.about');
Route::get('/faq', [HomeController::class,'faq'])->name('home.faq');

Route::get('/pengajuan', [PengajuanController::class, 'index'])->name('submissions.index');
Route::get('/pengajuan/detail/{kode_pengajuan}', [PengajuanController::class,'show'])->name('submissions.show');
Route::get('/pengajuan/create', [PengajuanController::class, 'create'])->name('submissions.create');
Route::post('/pengajuan/store', [PengajuanController::class, 'store'])->name('submissions.store');
Route::get('/search', [PengajuanController::class, 'search'])->name('submissions.search');

Route::get('/pengajuan/verification', [PengajuanController::class, 'verification'])->name('submissions.verification');
Route::post('/send-verification-code', [PengajuanController::class, 'sendVerificationCode'])->name('send.verification.code');
Route::get('/admin/pengajuan', [DataPengajuanController::class, 'index'])->name('dashboard.submissions.index');

Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');

Route::get('/admin/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
Route::put('/admin/{id}', [AdminController::class, 'update'])->name('admin.update');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.show');
Route::post('/login/submit', [LoginController::class, 'submitlogin'])->name('login.submit');


