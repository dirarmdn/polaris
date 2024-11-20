<?php

use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SubmissionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrganizationController;

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/about', [HomeController::class,'about'])->name('home.about');
Route::get('/faq', [HomeController::class,'faq'])->name('home.faq');
Route::get('/feedback', [HomeController::class,'feedback'])->name('home.feedback');
Route::post('/feedback', [HomeController::class, 'feedbackStore'])->name('feedback.store');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register/user', [AuthController::class, 'register'])->name('register.post');
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login/user', [AuthController::class, 'submitlogin'])->name('login.post');
    Route::get('/forgot-password', [ForgotPasswordController::class, 'showResetForm'])->middleware('guest')->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->middleware('guest')->name('password.email');
    Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showForm'])->middleware('guest')->name('password.reset');
    Route::post('/reset-password', [ForgotPasswordController::class, 'reset'])->middleware('guest')->name('password.update');
});

Route::get('/organization/search', [OrganizationController::class, 'search'])->name('organization.search');
Route::post('/organization/store', [OrganizationController::class, 'store'])->name('organization.store');

Route::get('/pengajuan', [SubmissionController::class, 'index'])->name('submissions.index');
Route::get('/pengajuan/detail/{submission_code}', [SubmissionController::class,'show'])->name('submissions.show');
Route::get('/search', [SubmissionController::class, 'search'])->name('submissions.search');

Route::group(['middleware' => 'auth'], function () {

    Route::prefix('dashboard')
    ->group(function () {
        Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard');
        Route::get('/pengajuan', [SubmissionController::class, 'showAllSubmissions'])->name('dashboard.submissions.index');
        Route::get('/pengajuan/detail/{submission_code}', [SubmissionController::class, 'showSubmission'])->name('dashboard.submissions.show');
        Route::get('/pengajuan/{submission_code}/edit', [SubmissionController::class, 'edit'])->name('submissions.edit');
        Route::put('/pengajuan/{submission}', [SubmissionController::class, 'update'])->name('submissions.update');
        Route::get('/pengajuan/create', [SubmissionController::class, 'create'])->name('submissions.create');
        Route::post('/pengajuan/store', [SubmissionController::class, 'store'])->name('submissions.store');
        Route::delete('/pengajuan/delete/{submission_code}', [SubmissionController::class, 'destroy'])->name('submission.destroy')->middleware('role:submitter');
        Route::resource('/admin', AdminController::class)->middleware('role:admin');
        Route::resource('/review', ReviewController::class)->middleware('role:reviewer');
        Route::resource('/organization', OrganizationController::class);
    });
    
    Route::resource('/user', UserController::class);
    Route::resource('/organization', OrganizationController::class);
    Route::post('/logout', [UserController::class, 'signOut'])->name('logout');
});