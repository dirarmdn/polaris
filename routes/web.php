<?php

use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SubmissionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrganizationController;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/about', [HomeController::class,'about'])->name('home.about');
Route::get('/faq', [HomeController::class,'faq'])->name('home.faq');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register/user', [AuthController::class, 'register'])->name('register.post');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login/user', [AuthController::class, 'submitlogin'])->name('login.post');

Route::get('/organization/search', [OrganizationController::class, 'search'])->name('organization.search');
Route::post('/organization/store', [OrganizationController::class, 'store'])->name('organization.store');

Route::get('/pengajuan', [SubmissionController::class, 'index'])->name('submissions.index');
Route::get('/pengajuan/detail/{submission_code}', [SubmissionController::class,'show'])->name('submissions.show');
Route::get('/search', [SubmissionController::class, 'search'])->name('submissions.search');

// Routes that require authentication
Route::group(['middleware' => 'auth'], function () {

    Route::prefix('admin')->group(function () {
        Route::get('/index', [AdminController::class, 'index'])->name('admin');
        Route::get('/create', [AdminController::class, 'create'])->name('admin.create');
        Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
        Route::get('/detail/{id}', [AdminController::class, 'show'])->name('admin.admins.show');
        Route::get('/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
        Route::put('/{id}', [AdminController::class, 'update'])->name('admin.update');
        Route::get('/review/create/{submission_code}', [ReviewController::class, 'create'])->name('dashboard.submissions.review.create');
        Route::post('/review/store', [ReviewController::class, 'store'])->name('dashboard.submissions.review.store');
        Route::resource('/organization', OrganizationController::class);
    });

    Route::prefix('dashboard')->group(function () {
        Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard');
        Route::get('/pengajuan', [SubmissionController::class, 'showAllSubmissions'])->name('dashboard.submissions.index');
        Route::get('/pengajuan/detail/{submission_code}', [SubmissionController::class, 'showSubmission'])->name('dashboard.submissions.show');
        Route::get('/pengajuan/create', [SubmissionController::class, 'create'])->name('submissions.create');
        Route::post('/pengajuan/store', [SubmissionController::class, 'store'])->name('submissions.store');
        Route::get('/pengajuan/print', [SubmissionController::class, 'print'])->name('dashboard.submissions.print');    
    });
    
    Route::resource('/user', UserController::class);
    Route::post('/logout', [UserController::class, 'signOut'])->name('logout');

    // Email Verification Notice
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->middleware('auth')->name('verification.notice');

    // Email Verification Handler
    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect()->route('home');
    })->middleware(['auth', 'signed'])->name('verification.verify');

    // Resending the Verification Email
    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    })->middleware(['auth', 'throttle:6,1'])->name('verification.send');

});

// Open Routes
Route::get('/admins', [AdminController::class, 'index'])->name('admins.index');
