<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\Submission;
use App\Observers\SubmissionObserver;
use Illuminate\Support\Facades\Request;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Use the Tailwind pagination template
        Paginator::defaultView('vendor.pagination.tailwind');

<<<<<<< HEAD
        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
                ->subject('Verify Email Address')
                ->view('mail.email-verification-message', [ 'url' => $url ]);
        });
=======
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $userId = Auth::id();
        
                // Ambil parameter sorting dari query string, default ke 'desc'
                $sort = Request::query('urut', 'desc');
        
                // Validasi nilai sorting (hanya terima 'asc' atau 'desc')
                if (!in_array($sort, ['asc', 'desc'])) {
                    $sort = 'desc'; // Fallback ke default
                }
        
                // Ambil semua notifikasi dengan sorting berdasarkan input
                $allNotifications = Notification::where('user_id', $userId)
                    ->orderBy('created_at', $sort)
                    ->get();
        
                // Hitung jumlah notifikasi yang belum dibaca
                $unreadCount = $allNotifications->where('isRead', false)->count();
                // Bagikan data ke semua view
                $view->with([
                    'notifications' => $allNotifications,
                    'unreadCount' => $unreadCount,
                ]);                
            }
        });
        

        // Share specific notifications for 'navbar_dashboard'
        View::composer('component.navbar_dashboard', function ($view) {
            if (Auth::check()) {
                $userId = Auth::id();

                // Get only the latest 5 notifications for 'navbar_dashboard'
                $latestNotifications = Notification::where('user_id', $userId)
                    ->orderBy('created_at', 'desc')
                    ->take(5)
                    ->get();

                // Share data with 'navbar_dashboard' view
                $view->with('notifications', $latestNotifications);
            }
        });
        Submission::observe(SubmissionObserver::class);
>>>>>>> dbacd54686153429706fd07149183ac747d55e14
    }

}
