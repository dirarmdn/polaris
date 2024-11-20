<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Models\Organization;
use App\Models\Reference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreSubmissionRequest;
use App\Http\Requests\UpdateSubmissionRequest;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 5);
        $submissions = Submission::where('status', 'terverifikasi')
            ->paginate($perPage)
            ->appends($request->query());

        $organizations = Organization::get();

        if ($request->ajax()) {
            return response()->json([
                'html' => view('components.list_view', compact('submissions'))->render(),
                'pagination' => $submissions->appends($request->query())->links('vendor.pagination.custom')->render(),
            ]);
        }

        return view('submissions.index', compact('submissions', 'organizations'));
    }

    public function print(Request $request)
    {
        // Ambil input pencarian dari form
        $submission_title = $request->input('submission_title');

        // Ambil user yang sedang login
        $user = auth()->user();

        // Query untuk mengambil semua data dengan pencarian tanpa pagination
        $data_pengajuans = Submission::with('submitter') // Mengambil relasi user
            ->when($submission_title, function ($query) use ($submission_title) {
                // Filter berdasarkan judul pengajuan jika ada pencarian
                return $query->where('submission_title', 'LIKE', '%' . $submission_title . '%');
            })
            ->get(); // Mengambil semua data tanpa pagination

        // Kirimkan data ke view dengan hasil pencarian
        return view('dashboard.submissions.print-submission', [
            'data_pengajuans' => $data_pengajuans,
            'submission_title' => $submission_title,
        ]);
    } 

    public function search(Request $request)
    {
        $query = $request->input('search');
        $sort_by = $request->input('sort_by', 'submission_title');
        $sort_direction = $request->input('sort_direction', 'desc');
        $platform_filter = $request->input('platform', []);
        $existing_app = $request->boolean('existing_app');
        $organization = $request->input('organization');
        $perPage = $request->input('perPage', 5);

        $submissions = Submission::query()
            ->when($query, function ($q) use ($query) {
                return $q->where('submission_title', 'like', "%{$query}%");
            })
            ->when($platform_filter, function ($q) use ($platform_filter) {
                return $q->whereIn('platform', $platform_filter);
            })
            ->when(!is_null($existing_app), function ($q) use ($existing_app) {
                return $existing_app
                    ? $q->where('project_type', true) // Aplikasi yang sudah ada
                    : $q->where('project_type', false); // Aplikasi baru
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
            ->paginate($perPage)
            ->appends($request->query()); 

        if ($request->ajax()) {
            return response()->json([
                'html' => view('components.list_view', ['submissions' => $submissions])->render(),
                'pagination' => $submissions->appends($request->query())->links('vendor.pagination.custom')->render(),
            ]);
        }

        return view('submissions.index', compact('submissions')); // Ensure 'submissions' is passed, not 'submission'
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

        // Debug: Tampilkan data referensi yang diterima
        \Log::info('Referensi data:', $request->input('referensi'));

        // Add additional data
        $data['submitter_id'] = Auth::user()->submitter->submitter_id;
        $data['submission_code'] = 'PGN-' . strtoupper(uniqid());
        $data['status'] = 'belum_direview';

        // Create the pengajuan record
        $submission = Submission::create($data);
        // Penanganan referensi
        $referensiData = $request->input('referensi', []);
        foreach ($data['referensi'] as $index => $ref) {
            
            $path = null;

            // Pastikan file tersedia jika tipe adalah 'file'
            if ($ref['tipe'] === 'file' && isset($ref['file_path'])) {
                $file = $ref['file_path']; // Ambil dari ref array
                if ($file instanceof \Illuminate\Http\UploadedFile) {
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $path = $file->storeAs('uploads', $fileName);
                }
            } elseif ($ref['tipe'] === 'link') {
                $path = $ref['link_path'] ?? null;
            }

            // Hanya buat entri jika path sudah di-set
            if ($path !== null) {
                $submission->reference()->create([
                    'description' => $ref['keterangan'] ?? null,
                    'type' => $ref['tipe'],
                    'path' => $path,
                ]);
            }
        }
        
        Alert::success('Berhasil', 'Anda berhasil mengirim pengajuan!');

        return redirect()->route('dashboard.submissions.index')->with('success', 'Submission berhasil dibuat!');
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
    public function edit($submission_code)
    {
        $submission = Submission::findOrFail($submission_code);
        return view('dashboard.submissions.edit', compact('submission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubmissionRequest $request, Submission $submission)
    {
        // Perbarui data utama pengajuan
        $submission->update(array_merge(
            $request->validated(),
            ['status' => 'belum_direview'] // Set status menjadi 'belum_direview'
        ));
    
        // Tangani referensi (file/link)
        if ($request->has('references')) {
            $references = collect($request->input('references'))->map(function ($reference) {
                if ($reference['type'] === 'file' && request()->hasFile("references.{$reference['index']}.file_path")) {
                    $file = request()->file("references.{$reference['index']}.file_path");
                    $reference['file_path'] = $file->store('references'); // Simpan file
                }
                return $reference;
            });
    
            $submission->references()->delete(); // Hapus referensi lama
            $submission->references()->createMany($references->toArray()); // Tambahkan referensi baru
        }
    
        // Tampilkan notifikasi
        Alert::success('Berhasil', 'Pengajuan berhasil diperbaharui!');
    
        return redirect()->route('dashboard.submissions.index');
    }
    
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $submission_code)
    {
        $submission = Submission::where('submission_code', $submission_code)->firstOrFail();

        $submission->delete();

        Alert::success('Berhasil', 'Pengajuan berhasil dihapus!');
        
        return redirect()->back();
    }

    // AFTER LOGIN
    public function showAllSubmissions(Request $request)
    {
        // Ambil input pencarian dari form
        $submission_title = $request->input('submission_title');

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
            $data_pengajuans = DB::table('submissions_need_review')
                // ->where('nip_reviewer', $user->reviewer->nip_reviewer)
                ->when($submission_title, function ($query) use ($submission_title) {
                    return $query->where('submission_title', 'LIKE', '%' . $submission_title . '%');
                })
                ->paginate(10);
        }

        $title = 'Hapus Pengajuan!';
        $text = "Apakah kamu yakin akan menghapus pengajuan?";
        confirmDelete($title, $text);

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
}