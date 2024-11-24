<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreSubmissionRequest;
use App\Http\Requests\UpdateSubmissionRequest;
use App\Models\Notification;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 5);
        $submission = Submission::where('status', 'terverifikasi')->paginate($perPage);
        $organization = Organization::get();
    
        if ($request->ajax()) {
            return view('components.list_view', compact('submission'));
        }
    
        return view('submissions.index', compact('submission', 'organization'));
    }
    

    public function search(Request $request)
    {
        $query = $request->input('search');
        $sort_by = $request->input('sort_by', 'submission_title');
        $sort_direction = $request->input('sort_direction', 'desc');
        $platform_filter = $request->input('platform', []);
        $existing_app = $request->boolean('existing_app');
        $organization = $request->input('organization');
        $perPage = $request->input('perPage');

        // dd($perPage);
    
        $submission = Submission::query()
            ->when($query, function ($q) use ($query) {
                return $q->where('submission_title', 'like', "%{$query}%");
            })
            ->when($platform_filter, function ($q) use ($platform_filter) {
                return $q->whereIn('platform', $platform_filter);
            })
            ->when(!is_null($existing_app), function ($q) use ($existing_app) {
                return $existing_app
                    ? $q->where('project_type', true) // Hanya aplikasi yang sudah ada
                    : $q->where('project_type', false); // Hanya aplikasi baru
            })
            ->when($organization, function ($q) use ($organization) {
                if ($organization) {
                    return $q->whereHas('submitter.organization', function ($query) use ($organization) {
                        $query->where('organization_code', $organization);
                    });
                }
                return $q;
            })            
            ->where('status', 'terverifikasi')
            ->orderBy($sort_by, $sort_direction)
            ->paginate($perPage);
    
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
            // Membuat notifikasi berhasil mengirim pengajuan
        Notification::create([
            'user_id' => Auth::id(),
            'submission_code' => $submission->submission_code,
            'message' => "Pengajuan '{$submission->submission_title}' berhasil dikirim.",
            'notifiable_id' => $submission->submission_code,
            'notifiable_type' => Submission::class,
        ]);

        return redirect()->route('submissions.index')->with('success', 'Pengajuan berhasil dikirim!');
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
    public function update(UpdateSubmissionRequest $request, Submission $submission)
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
            $data_pengajuans = Submission::with('submitter')
                ->when($user->role === 1, function ($query) use ($user) {
                    return $query->where('submitter_id', $user->submitter->submitter_id);
                })
                ->when($submission_title, function ($query) use ($submission_title) {
                    return $query->where('submission_title', 'LIKE', '%' . $submission_title . '%');
                })
                ->paginate(10);
        } else if ($user->role == 2) {
            $data_pengajuans = Submission::with('submitter')
                ->where('status', '!=', 'diarsipkan')
                ->when($submission_title, function ($query) use ($submission_title) {
                    return $query->where('submission_title', 'LIKE', '%' . $submission_title . '%');
                })
                ->paginate(10);
        } else {
            $data_pengajuans = Submission::with('submitter')
                ->where('status', 'belum_direview')
                //->where('nip_reviewer', $user->reviewer->nip_reviewer)
                ->when($submission_title, function ($query) use ($submission_title) {
                    return $query->where('submission_title', 'LIKE', '%' . $submission_title . '%');
                })
                ->paginate(10);
        }

        return view('dashboard.submissions.index', [
            'data_pengajuans' => $data_pengajuans,
            'submission_title' => $submission_title,
        ]);
    }

    // Menampilkan detail pengajuan tertentu
    public function showSubmission(string $submission_code)
    {
        $submission = Submission::with('reference')->where('submission_code', $submission_code)->first();

        if (!$submission) {
            return redirect()->route('submissions.index')->with('error', 'Pengajuan tidak ditemukan!');
        }


        return view('dashboard.submissions.show', compact('submission'));
    }

    public function updateSubmissionStatus($submissionCode, $newStatus)
{
    $submission = Submission::where('submission_code', $submissionCode)->first();
    
    if (!$submission) {
        return redirect()->back()->withErrors('Submission tidak ditemukan.');
    }

    // Update status submission
    $submission->status = $newStatus;
    $submission->review_date = now(); // Jika perlu update tanggal review
    $submission->save();

    // Membuat pesan notifikasi berdasarkan status
    $message = match ($newStatus) {
        'terverifikasi' => "Submission '{$submission->submission_title}' Anda telah terverifikasi.",
        'ditolak' => "Submission '{$submission->submission_title}' Anda telah ditolak.",
        'diarsipkan' => "Submission '{$submission->submission_title}' telah diarsipkan.",
        default => "Submission '{$submission->submission_title}' belum direview.",
    };

    // Membuat notifikasi
    Notification::create([
        'user_id' => $submission->submitter_id,
        'submission_code' => $submission->submission_code,
        'message' => $message,
        'notifiable_id' => $submission->submission_code,
        'notifiable_type' => Submission::class,
    ]);

    return redirect()->route('dashboard.submissions.index')->with('success', 'Status submission berhasil diupdate.');
}

public function sendNotification($userId)
{
    $submissions = Submission::where('user_id', $userId)->get();
    return view('notification.notificationEmail', compact('submissions'));
}


}
