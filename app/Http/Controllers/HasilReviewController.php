<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\HasilReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    public function create(string $kode_pengajuan)
    {
        $pengajuan = Pengajuan::with('referensi')->where('kode_pengajuan', $kode_pengajuan)->first();

        // Kembalikan view dengan variabel judul_pengajuan
        return view('dashboard.submissions.review', compact('pengajuan')); // Sesuaikan nama view
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        // Validasi input
        $validator = Validator::make($request->all(), [
            'kode_pengajuan' => 'required|exists:pengajuans,kode_pengajuan',
            'deskripsi_review' => 'required',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        // Mulai transaksi database
        DB::beginTransaction();
        
        try {
            // Simpan hasil review
            HasilReview::create([
                'kode_pengajuan' => $request->kode_pengajuan,
                'deskripsi_review' => $request->deskripsi_review,
                'user_id' => $user->id,
                'isVerified' => $request->status,
            ]);

            // Update status di tabel pengajuan
            $pengajuan = Pengajuan::where('kode_pengajuan', $request->kode_pengajuan)->first();
            
            // Update isVerified berdasarkan status
            switch($request->status) {
                case 1:
                    $pengajuan->status = 'terverifikasi';
                    break;
                case 0:
                    $pengajuan->status = 'ditolak';
                    break;
            }
            
            $pengajuan->save();
            
            DB::commit();

            return redirect()->route('dashboard.submissions.index')->with(
                'success',
                'Berhasil menyimpan review');
                
        } catch (\Exception $e) {
            return redirect()->route('dashboard.submissions.index')->with(
                'error',
                'Gagal menyimpan review');
        }
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
