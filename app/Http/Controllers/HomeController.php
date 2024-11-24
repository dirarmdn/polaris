<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification; 

class HomeController extends Controller
{
    public function index()
    {
        $count_pengajuan = Submission::count();
        $newest_pengajuan = Submission::latest('created_at')->first();

        Carbon::setLocale('id');

        $time_ago = $newest_pengajuan ? $newest_pengajuan->created_at->diffForHumans() : null;
        // Ambil notifikasi yang belum dibaca untuk pengguna yang sedang login
        return view('home.index', compact('count_pengajuan', 'newest_pengajuan', 'time_ago',));
    }

    public function about()
    {
        return view('home.about');
    }

    public function faq()
    {
        return view('home.faq');
    }

    public function dashboard()
    {
        $user = auth()->user();

        if ($user->role == 1) {
            $pengajuan = Submission::with('submitter') 
                ->when($user->role === 1, function ($query) use ($user) {
                    return $query->where('submitter_id', $user->submitter->submitter_id);
                })->get();
        } else if ($user->role == 1) {
            $pengajuan = Submission::latest()->where('status', 'belum_direview')->where('nip_reviewer', $user->nip_reviewer)->get();
        } else {
            $pengajuan = Submission::latest()->where('status', '!=', 'diarsipkan')->get();
        }
        
        $jumlah_terverifikasi = Submission::where('status', 'terverifikasi')->count();
        $jumlah_belum = Submission::where('status', 'belum_direview')->count();
        if (Auth::check()) {
            $userId = Auth::id();
            $notifications = Notification::where('user_id', $userId)
                ->where('isRead', false)
                ->latest()
                ->take(5)
                ->get();
        } else {
            $notifications = collect(); // Kosongkan koleksi jika belum login
        }
        return view('dashboard.index', compact(['pengajuan', 'jumlah_terverifikasi', 'jumlah_belum', 'user','notifications']));
    }
}
