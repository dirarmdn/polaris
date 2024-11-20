<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Mail\FeedbackMail;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function index()
    {
        $count_pengajuan = Submission::count();
        $newest_pengajuan = DB::table('submissions')
            ->select('submission_code', 'submission_title', 'created_at')
            ->orderBy('created_at', 'desc')
            ->first();

        Carbon::setLocale('id');

        $time_ago = $newest_pengajuan 
        ? Carbon::parse($newest_pengajuan->created_at)->diffForHumans() 
        : null;

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

    public function feedback()
    {
        return view('home.feedback');
    }

    public function feedbackStore(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
        ]);

        $feedback = $request->only(['email', 'subject', 'message']);
        Mail::to('contactsims11@gmail.com')->send(new FeedbackMail($feedback));

        Alert::success('Berhasil', 'Terima kasih atas feedback Anda, pesan Anda sudah terkirim.');

        return redirect()->back();
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
        return view('dashboard.index', compact(['pengajuan', 'jumlah_terverifikasi', 'jumlah_belum', 'user']));
    }
}
