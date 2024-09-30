<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Http\Requests\StorePengajuanRequest;
use App\Http\Requests\UpdatePengajuanRequest;
use Illuminate\Http\Request;

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

        return view('index', compact('pengajuan'));
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
}
