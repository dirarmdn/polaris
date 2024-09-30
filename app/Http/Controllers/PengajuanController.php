<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use App\Http\Requests\StorePengajuanRequest;
use App\Http\Requests\UpdatePengajuanRequest;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengajuan = Pengajuan::paginate(5);
        return view("submissions.index", ['pengajuan' => $pengajuan]);
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $search = $request->get('search');
            $sortBy = $request->get('sort_by', 'date'); // Default sorting by date

            $query = Pengajuan::where('judul_pengajuan', 'like', '%'.$search.'%')
                ->orWhere('deskripsi_masalah', 'like', '%'.$search.'%');

            // Sorting logic
            if ($sortBy === 'title') {
                $pengajuan = $query->orderBy('judul_pengajuan')->get();
            } else {
                $pengajuan = $query->orderBy('created_at', 'desc')->get(); // Default sort by date
            }

            $view = $request->get('view', 'list');
            $html = view($view === 'grid' ? 'components.grid_view' : 'components.list_view', compact('pengajuan'))->render();

            return response()->json([
                'html' => $html,
                'count' => $pengajuan->count()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("submissions.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePengajuanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengajuan $pengajuan)
    {
        return view('submissions.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengajuan $pengajuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePengajuanRequest $request, Pengajuan $pengajuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengajuan $pengajuan)
    {
        //
    }
    public function verification()
    {
        return view('submissions.verification'); // Pastikan ini mengarah ke view yang benar
    }

    public function sendVerificationCode(Request $request)
    {
        // Validasi input email
        $request->validate([
            'email' => 'required|email',
        ]);

        // Logika untuk mengirim kode verifikasi ke email
        // Contoh: Kirim kode verifikasi

        return redirect()->back()->with('success', 'Verification code has been sent!');
    }
}
