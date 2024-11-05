<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\Referensi;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\VerificationEmail;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StorePengajuanRequest;
use App\Http\Requests\UpdatePengajuanRequest;
use Illuminate\Support\Facades\Storage;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pengajuan = Pengajuan::paginate(6);

        if ($request->ajax()) {
            return view('components.list_view', compact('pengajuan'));
        }

        return view('submissions.index', compact('pengajuan'));
    }

    public function search(Request $request)
    {
        $query = $request->input('search');
        $sort_by = $request->input('sort_by', 'judul_pengajuan'); // Cek apakah 'judul_pengajuan' ada di database.

        $pengajuan = Pengajuan::query()
            ->when($query, function ($q) use ($query) {
                return $q->where('judul_pengajuan', 'like', "%{$query}%");
            })
            ->orderBy($sort_by)
            ->paginate(10);

        if ($request->ajax()) {
            return response()->json([
                'html' => view('components.list_view', ['pengajuan' => $pengajuan])->render(),
                'count' => $pengajuan->total()
            ]);
        }

        return view('submissions.index', compact('pengajuan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashboard.submissions.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePengajuanRequest $request)
    {
        dd($request);

        // try {
             // Validate and get the main submission data
            $data = $request->validated();
            
             // Add additional data
            $data['user_id'] = Auth::user()->id;
            $data['kode_pengajuan'] = 'PGN-' . strtoupper(uniqid());
            $data['status'] = 'belum_direview';
            
             // Create the pengajuan record
            $pengajuan = Pengajuan::create($data);

            $referensiData = $request->input('referensi');


            foreach ($referensiData as $data) {
                $data->referensi()->create([
                    'keterangan' => $data['keterangan'],
                    'tipe' => $data['tipe'],
                    'path' => $data['path'] ?? null,
                ]);
            }

            return redirect()->route('submissions.index')
                ->with('success', 'Pengajuan berhasil dibuat!');
        //  } catch (\Exception $e) {
        //      return redirect()->back()
        //          ->withInput()
        //          ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        //  }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $kode_pengajuan)
    {
        $pengajuan = Pengajuan::with('referensi')->where('kode_pengajuan', $kode_pengajuan)->first();
    
        if (!$pengajuan) {
            return redirect()->route('submissions.index')->with('error', 'Pengajuan tidak ditemukan!');
        }
    
        return view('submissions.show', compact('pengajuan'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengajuan $pengajuan)
    {
        return view('submissions.edit', compact('pengajuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePengajuanRequest $request, Pengajuan $pengajuan)
    {
        $pengajuan->update($request->validated()); // Perbarui data pengajuan
        return redirect()->route('submissions.index')->with('success', 'Pengajuan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengajuan $pengajuan)
    {
        $pengajuan->delete();
        return redirect()->route('submissions.index')->with('success', 'Pengajuan berhasil dihapus!');
    }    
}
