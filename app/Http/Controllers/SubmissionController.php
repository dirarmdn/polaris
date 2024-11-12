<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Models\Referensi;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\VerificationEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreSubmissionRequest;
use App\Http\Requests\UpdatePengajuanRequest;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $submission = Submission::where('status', 'terverifikasi')->paginate(6);

        if ($request->ajax()) {
            return view('components.list_view', compact('submission'));
        }

        return view('submissions.index', compact('submission'));
    }

    public function search(Request $request)
    {
        $query = $request->input('search');
        $sort_by = $request->input('sort_by', 'submission_title');
        $sort_direction = $request->input('sort_direction', 'desc');

        $submission = Submission::query()
            ->when($query, function ($q) use ($query) {
                return $q->where('submission_title', 'like', "%{$query}%");
            })
            ->where('status', 'terverifikasi')
            ->orderBy($sort_by, $sort_direction)
            ->paginate(10);

        if ($request->ajax()) {
            return response()->json([
                'html' => view('components.list_view', ['submission' => $submission])->render(),
                'count' => $submission->total(),
            ]);
        }

        return view('submissions.index', compact('submission'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.submissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StoreSubmissionRequest $request)
    {
        $data = $request->validated();

        // Add additional data
        $data['submitter_id'] = Auth::user()->submitter->submitter_id;
        $data['submission_code'] = 'PGN-' . strtoupper(uniqid());
        $data['status'] = 'belum_direview';

        // Create the pengajuan record
        $submission = Submission::create($data);
        // Penanganan referensi
        $referensiData = $request->input('referensi', []);

        foreach ($referensiData as $index => $data) {
            if (!isset($data['tipe'])) {
                continue;
            }

            $path = null;

            // Pastikan file tersedia jika tipe adalah 'file'
            if ($data['tipe'] === 'file' && isset($data['file_path'])) {
                $file = $data['file_path']; // Ambil dari data array
                if ($file instanceof \Illuminate\Http\UploadedFile) {
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $path = $file->storeAs('uploads', $fileName);
                }
            } elseif ($data['tipe'] === 'link') {
                $path = $data['link_path'] ?? null;
            }

            // Hanya buat entri jika path sudah di-set
            if ($path !== null) {
                $submission->reference()->create([
                    'keterangan' => $data['keterangan'] ?? null,
                    'tipe' => $data['tipe'],
                    'path' => $path,
                ]);
            }
        }
        

        return redirect()->route('submissions.index')->with('success', 'Submission berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $submission_code)
    {
        $submission = Submission::with('reference')->where('submission_code', $submission_code)->first();

        if (!$submission) {
            return redirect()->route('submissions.index')->with('error', 'Pengajuan tidak ditemukan!');
        }

        return view('submissions.show', compact('submission'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Submission $submissions)
    {
        return view('submissions.edit', compact('submissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePengajuanRequest $request, Submission $submission)
    {
        $submission->update($request->validated()); // Perbarui data pengajuan
        return redirect()->route('submissions.index')->with('success', 'Pengajuan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Submission $submission)
    {
        $submission->delete();
        return redirect()->route('submissions.index')->with('success', 'PEngajuan berhasil dihapus!');
    }

    // AFTER LOGIN
    public function showAllSubmissions(Request $request)
    {
        // Ambil input pencarian dari form
        $submission_title = $request->input('submission_title');

        // Ambil user yang sedang login
        $user = auth()->user();

        // Query untuk mengambil data dengan pencarian dan paginasi
        if ($user->role == 1) {
            $data_pengajuans = Submission::with('submitter') // Mengambil relasi user
                ->when($user->role === 1, function ($query) use ($user) {
                    // Jika role adalah pengaju, filter berdasarkan user_id
                    return $query->where('submitter_id', $user->submitter->submitter_id);
                })
                ->when($submission_title, function ($query) use ($submission_title) {
                    return $query->where('submission_title', 'LIKE', '%' . $submission_title . '%');
                })
                ->paginate(10);
        } else {
            $data_pengajuans = Submission::with('user') // Mengambil relasi user
                ->when($submission_title, function ($query) use ($submission_title) {
                    return $query->where('submission_title', 'LIKE', '%' . $submission_title . '%');
                })
                ->paginate(10);
        }
        // Kirimkan data ke view dengan hasil pencarian
        return view('dashboard.submissions.index', [
            'data_pengajuans' => $data_pengajuans,
            'submission_title' => $submission_title,
        ]);
    }

    // Menampilkan detail pengajuan tertentu
    public function showSubmission(string $submission_code)
    {
        $submission = Submission::with('referensi')->where('submission_code', $submission_code)->first();

        if (!$submission) {
            return redirect()->route('submissions.index')->with('error', 'Pengajuan tidak ditemukan!');
        }

        return view('dashboard.submissions.show', compact('submission'));
    }
}
