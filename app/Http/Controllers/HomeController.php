<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $count_pengajuan = Pengajuan::count();
        $newest_pengajuan = Pengajuan::latest('created_at')->first();
        
        Carbon::setLocale('id');

        $time_ago = $newest_pengajuan ? $newest_pengajuan->created_at->diffForHumans() : null;

        return view("home.index", compact('count_pengajuan', 'newest_pengajuan', 'time_ago'));
    }

    public function about() {
        return view("home.about");
    }

    public function faq() {
        return view("home.faq");
    }
}
