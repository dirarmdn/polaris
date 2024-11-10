<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\Referensi;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\VerificationEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePengajuanRequest;
use App\Http\Requests\UpdatePengajuanRequest;

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
                'count' => $pengajuan->total(),
            ]);
        }

        return view('submissions.index', compact('pengajuan'));
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

    public function store(StorePengajuanRequest $request)
    {
        // try {
             // Validate and get the main submission data
            $data = $request->validated();
            
             // Add additional data
            $data['user_id'] = Auth::user()->id;
            $data['kode_pengajuan'] = 'PGN-' . strtoupper(uniqid());
            $data['isVerified'] = false;
            
             // Create the pengajuan record
            $pengajuan = Pengajuan::create($data);

             // Handle references if they exist
            if ($request->has('tipe')) {
                $tipes = is_array($request->tipe) ? $request->tipe : [$request->tipe];
                
                foreach ($tipes as $index => $tipe) {
                    $referensi = new Referensi();
                    $referensi->kode_pengajuan = $pengajuan->kode_pengajuan;
                    $referensi->tipe = $tipe;
                    
                     // Handle link type reference
                    if ($tipe === 'link') {
                        $linkFieldName = "referensi_link_" . $index;
                        $keteranganFieldName = "keterangan_referensi_" . $index;
                        
                        $referensi->link = $request->$linkFieldName;
                        $referensi->keterangan = $request->$keteranganFieldName;
                    }
                     // Handle file type reference
                    elseif ($tipe === 'file' && $request->hasFile("referensi_file_" . $index)) {
                        $files = $request->file("referensi_file_" . $index);
                        foreach ($files as $file) {
                            $path = $file->store('referensi_files', 'public');
                            
                            $fileReferensi = new Referensi();
                            $fileReferensi->kode_pengajuan = $pengajuan->kode_pengajuan;
                            $fileReferensi->tipe = 'file';
                            $fileReferensi->file_path = $path;
                            $fileReferensi->keterangan = $request->{"keterangan_referensi_" . $index} ?? null;
                            $fileReferensi->save();
                        }
                         continue; // Skip the current iteration after handling files
                    }
                    
                    $referensi->save();
                }
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
