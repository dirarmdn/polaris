<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $count_pengajuan = Pengajuan::count();
        $newest_pengajuan = Pengajuan::latest('created_at')->first();

        Carbon::setLocale('id');

        $time_ago = $newest_pengajuan ? $newest_pengajuan->created_at->diffForHumans() : null;

        return view('home.index', compact('count_pengajuan', 'newest_pengajuan', 'time_ago'));
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
            $pengajuan = Pengajuan::with('user') // Mengambil relasi user
                ->when($user->role === 1, function ($query) use ($user) {
                    return $query->where('user_id', $user->id);
                })->get();
        } else {
            $pengajuan = Pengajuan::latest()->get();
        }
        $jumlah_terverifikasi = Pengajuan::where('status', 'terverifikasi')->count();
        $jumlah_belum = Pengajuan::where('status', 'belum_direview')->count();
        return view('dashboard.index', compact(['pengajuan', 'jumlah_terverifikasi', 'jumlah_belum', 'user']));
    }
}
