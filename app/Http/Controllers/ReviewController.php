<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function review() {
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
        $pengajuan = Submission::with('reference')->where('submission_code', $submission_code)->first();

        return view('dashboard.submissions.review', compact('pengajuan')); // Sesuaikan nama view
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
    }



    /**
     * Display the specified resource.
     */
    public function show($hasilReview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($hasilReview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $user = auth()->user();
        $validator = Validator::make($request->all(), [
            'review_description' => 'required',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }
        
        try {
            $submission = Submission::findOrFail($id);
            $submission->fill($request->all());
            $submission->review_description = $request->review_description;
            $submission->status = $request->status;

            $submission->save();
        
            return redirect()->route('dashboard.submissions.index')->with('success', 'Anda berhasil mereview pengajuan!');
                
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($hasilReview)
    {
        //
    }
}
