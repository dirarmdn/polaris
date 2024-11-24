<?php

use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SubmissionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\emailNotificationsController;


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

Route::group(['middleware' => 'auth'], function () {

    Route::prefix('admin')
    ->group(function () {
        Route::get('/index', [AdminController::class, 'index'])->name('admin');
        Route::get('/create', [AdminController::class, 'create'])->name('admin.create');
        Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
        Route::get('/detail/{id}', [AdminController::class, 'show'])->name('admin.admins.show');
        Route::get('/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
        Route::put('/{id}', [AdminController::class, 'update'])->name('admin.update');
        Route::get('/review/create/{submission_code}', [ReviewController::class, 'create'])->name('dashboard.submissions.review.create');
        Route::put('/review/update/{submission_code}', [ReviewController::class, 'update'])->name('dashboard.submissions.review.update');
        Route::resource('/organization', OrganizationController::class);
    });

    Route::prefix('dashboard')
    ->group(function () {
        Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard');
        Route::get('/pengajuan', [SubmissionController::class, 'showAllSubmissions'])->name('dashboard.submissions.index');
        Route::get('/pengajuan/detail/{submission_code}', [SubmissionController::class, 'showSubmission'])->name('dashboard.submissions.show');
        Route::get('/pengajuan/create', [SubmissionController::class, 'create'])->name('submissions.create');
        Route::post('/pengajuan/store', [SubmissionController::class, 'store'])->name('submissions.store');    
    });
    
    Route::resource('/user', UserController::class);
    Route::resource('/organization', OrganizationController::class);
    Route::post('/logout', [UserController::class, 'signOut'])->name('logout');
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');
    Route::post('/notifications/mark-all-read', [NotificationController::class, 'markAllRead'])->name('notifications.markAllRead');
       // Untuk menampilkan notifikasi di navbar
       Route::get('/navbar-notifications', [NotificationController::class, 'index'])->name('notifications.index');

       // Untuk menampilkan halaman semua notifikasi
       Route::get('/all-notifications', [NotificationController::class, 'show'])->name('notifications.show');

       // Route untuk menghitung jumlah notifikasi yang belum terbaca
       Route::get('/notifications/unread-count', [NotificationController::class, 'countUnreadNotifications']);
});
    Route::get('/admins', [AdminController::class, 'index'])->name('admins.index');
    Route::get('/send-notification', [emailNotificationsController::class, 'sendNotification']);
    // Route::get('/test-email', function () {
    //     \Illuminate\Support\Facades\Mail::raw('This is a test email!', function ($message) {
    //         $message->to('febi.shintawati.tif23@polban.ac.id')
    //                 ->subject('Test Email');
    //     });
    
    //     return 'Test email sent!';
    // });
    