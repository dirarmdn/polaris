<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $userId = Auth::id();

        // Validasi input request
        $validated = $request->validate([
            'status' => 'in:all,unread,read',
            'urut' => 'in:asc,desc'
        ]);

        $status = $validated['status'] ?? 'all';
        $sort = $validated['urut'] ?? 'desc';

        // Query notifikasi dengan filter dan pagination
        $notifications = Notification::where('user_id', $userId)
            ->when($status === 'unread', fn($q) => $q->where('isRead', false))
            ->when($status === 'read', fn($q) => $q->where('isRead', true))
            ->orderBy('created_at', $sort)
            ->paginate(6);

        return view('notification.index', compact('notifications'));
    }

    /**
     * Get latest unread notifications for navbar.
     */
    public function getLatestNotifications()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $latestNotifications = Notification::where('user_id', $userId)
                ->where('isRead', false)
                ->orderBy('created_at', 'desc')
                ->take(5)
                ->get();

            return $latestNotifications;
        }

        return collect(); // Return empty collection if not logged in
    }

    /**
     * Mark all notifications as read.
     */
    public function markAllRead()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            Notification::where('user_id', $userId)->update(['isRead' => true]);
            return back()->with('success', 'Semua notifikasi telah ditandai sebagai terbaca.');
        }

        return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
    }

    /**
     * Count unread notifications.
     */
    public function countUnreadNotifications()
    {
        if (Auth::check()) {
            $unreadCount = Notification::where('user_id', Auth::id())
                ->where('isRead', false)
                ->count();
        
            return response()->json(['unread_count' => $unreadCount]);
        }        
    }

    /**
     * Get unread notifications for navbar.
     */
    public function getUnreadNotifications()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $unreadNotifications = Notification::where('user_id', $userId)
                ->where('isRead', false)
                ->orderBy('created_at', 'desc')
                ->take(5)
                ->get();

            return $unreadNotifications;
        }

        return collect(); // Return empty collection if not logged in
    }

    /**
     * Show the navbar with notifications.
     */
    public function showNavbar()
    {
        $latestUnreadNotifications = $this->getUnreadNotifications();
        return view('navbar_dashboard', compact('latestUnreadNotifications'));
    }

    /**
     * Update the submission status and create notification.
     */
    public function updateSubmissionStatus($submissionId, $status)
    {
        $submission = Submission::find($submissionId);

        if (!$submission) {
            return redirect()->back()->withErrors('Submission not found');
        }

        // Update submission status
        $submission->status = $status;
        $submission->save();

        // Create notification for the user
        Notification::create([
            'user_id' => $submission->user_id,
            'message' => "Submission Anda telah diupdate menjadi: $status",
            'notifiable_id' => $submission->id,
            'notifiable_type' => Submission::class,
        ]);

        return redirect()->route('navbar_dashboard')->with('success', 'Submission status updated');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNotificationRequest $request)
    {
        // Implement store logic if needed
    }

    /**
     * Display the specified resource.
     */
    public function show(Notification $notification)
    {
        // Implement show logic if needed
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notification $notification)
    {
        // Implement edit logic if needed
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNotificationRequest $request, Notification $notification)
    {
        // Implement update logic if needed
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notification $notification)
    {
        // Implement destroy logic if needed
    }
}
