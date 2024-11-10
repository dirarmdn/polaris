<?php

namespace App\Http\Controllers;

use App\Models\Organisasi;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrganisasiRequest;
use App\Http\Requests\UpdateOrganisasiRequest;

class OrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $organisasi = Organisasi::all();
        return view('dashboard.organizations.index', compact('organisasi'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $organisations = Organisasi::where('nama', 'LIKE', "%{$query}%")->get();
        return response()->json($organisations);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.organizations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrganisasiRequest $request)
    {
        $data = $request->validated();

        Organisasi::create($data);

        return response()->json(['success' => true, 'kode_organisasi' => $data->kode_organisasi]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Organisasi $organisasi)
    {
        //
        return view('dashboard.organizations.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organisasi $organisasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrganisasiRequest $request, Organisasi $organisasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organisasi $organisasi)
    {
        //
    }
}
