<?php

namespace App\Http\Controllers;

use App\Models\HasilReview;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreHasilReviewRequest;
use App\Http\Requests\UpdateHasilReviewRequest;

class HasilReviewController extends Controller
{
    public function review() {
        // Ambil data pengajuan untuk dropdown
        $judul_pengajuan = Pengajuan::all();
        return view("dashboard.submissions.review", compact('judul_pengajuan'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil semua judul pengajuan dari database
        $judul_pengajuan = Pengajuan::all(); // Pastikan model dan tabel sudah benar

        // Kembalikan view dengan variabel judul_pengajuan
        return view('submission.review', compact('judul_pengajuan')); // Sesuaikan nama view
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'kode_pengajuan' => 'required|exists:pengajuans,kode_pengajuan',
            'deskripsi_review' => 'required',
            'status' => 'required|in:ditolak,terverifikasi,belum_diverifikasi'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        // Konversi status ke boolean untuk isVerified
        $isVerified = null;
        switch($request->status) {
            case 'terverifikasi':
                $isVerified = true;
                break;
            case 'ditolak':
                $isVerified = false;
                break;
            case 'belum_diverifikasi':
                $isVerified = null;
                break;
        }

        // Simpan hasil review
        HasilReview::create([
            'kode_pengajuan' => $request->kode_pengajuan,
            'user_id' => Auth::id(),
            'deskripsi_review' => $request->deskripsi_review,
            'isVerified' => $isVerified
        ]);

        // Update status di tabel pengajuan
        $pengajuan = Pengajuan::where('kode_pengajuan', $request->kode_pengajuan)->first();
        if ($pengajuan) {
            $pengajuan->status = $request->status;
            $pengajuan->save();
        }

        return redirect()->route('dashboard.submissions.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(HasilReview $hasilReview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HasilReview $hasilReview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHasilReviewRequest $request, HasilReview $hasilReview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HasilReview $hasilReview)
    {
        //
    }
}
