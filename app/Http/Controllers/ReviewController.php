<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreHasilReviewRequest;
use App\Http\Requests\UpdateHasilReviewRequest;

class ReviewController extends Controller
{
    public function review() {
        // Ambil data pengajuan untuk dropdown
        $submission_title = Submission::all();
        return view("dashboard.submissions.review", compact('submission_title'));
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
    public function create(string $submission_code)
    {
        $pengajuan = Submission::with('referensi')->where('submission_code', $submission_code)->first();

        // Kembalikan view dengan variabel submission_title
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
            'submission_code' => 'required|exists:pengajuans,submission_code',
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
            Review::create([
                'submission_code' => $request->submission_code,
                'deskripsi_review' => $request->deskripsi_review,
            ]);

            // Update status di tabel pengajuan
            $pengajuan = Submission::where('submission_code', $request->submission_code)->first();
            
            // Update isVerified berdasarkan status
            switch($request->status) {
                case 'terverifikasi':
                    $pengajuan->isVerified = true;
                    break;
                case 'ditolak':
                    $pengajuan->isVerified = false;
                    break;
                case 'belum_diverifikasi':
                    $pengajuan->isVerified = null;
                    break;
            }
            
            $pengajuan->save();
            
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Review berhasil disimpan dan status pengajuan diperbarui!'
            ]);
                
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(Review $hasilReview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $hasilReview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReviewRequest $request, Review $hasilReview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $hasilReview)
    {
        //
    }
}
