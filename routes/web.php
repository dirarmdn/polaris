<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\HasilReviewController;
use App\Http\Controllers\DataPengajuanController;

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('user.register');
Route::post('/register/user', [AuthController::class, 'register'])->name('register.post');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login/submit', [LoginController::class, 'submitlogin'])->name('login.submit');

Route::get('/organisasi/search', [OrganisasiController::class, 'search'])->name('organisation.search');
Route::post('/organisasi/store', [OrganisasiController::class, 'store'])->name('organisation.store');

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/about', [HomeController::class,'about'])->name('home.about');
Route::get('/faq', [HomeController::class,'faq'])->name('home.faq');

Route::get('/pengajuan', [PengajuanController::class, 'index'])->name('submissions.index');
Route::get('/pengajuan/detail/{kode_pengajuan}', [PengajuanController::class,'show'])->name('submissions.show');
Route::get('/search', [PengajuanController::class, 'search'])->name('submissions.search');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/user/profil', [AuthController::class, 'viewProfile'])->name('user.profile');

    Route::prefix('admin')
    ->group(function () {
        Route::get('/index', [AdminController::class, 'index'])->name('admin');
        Route::get('/create', [AdminController::class, 'create'])->name('admin.create');
        Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
        Route::get('/detail/{id}', [AdminController::class, 'show'])->name('admin.admins.show');
        Route::get('/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
        Route::put('/{id}', [AdminController::class, 'update'])->name('admin.update');
        Route::get('/review', [HasilReviewController::class,'review'])->name('dashboard.submissions.review');
        Route::get('/review/create', [HasilReviewController::class, 'create'])->name('dashboard.submissions.review.create');
        Route::post('/review/store', [HasilReviewController::class, 'store'])->name('dashboard.submissions.review.store');
        Route::resource('/mitra', OrganisasiController::class);
    });

    Route::prefix('dashboard')
    ->group(function () {
        Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard');
        Route::get('/pengajuan', [DataPengajuanController::class, 'index'])->name('dashboard.submissions.index');
        Route::get('/pengajuan/detail/{kode_pengajuan}', [DataPengajuanController::class, 'show'])->name('dashboard.submissions.show');
        Route::get('/pengajuan/create', [PengajuanController::class, 'create'])->name('submissions.create');
        Route::post('/pengajuan/store', [PengajuanController::class, 'store'])->name('submissions.store');    
    });

    Route::post('/logout', [AuthController::class, 'signOut'])->name('logout');

Route::get('/admins', [AdminController::class, 'index'])->name('admins.index');
});

