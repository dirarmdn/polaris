<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrganizationRequest;
use App\Http\Requests\UpdateOrganizationRequest;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $organization = Organization::all();
        return view('dashboard.organizations.index', compact('organization'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $organisations = Organization::where('organization_name', 'LIKE', "%{$query}%")->get();
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
    public function store(StoreOrganizationRequest $request)
    {
        $data = $request->validated();

        Organization::create($data);

        return response()->json(['success' => true, 'organization_code' => $data->organization_code]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $organization=Organization::findOrFail($id);
        return view('dashboard.organizations.show', compact('organization'));
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organization $organization)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrganizationRequest $request, $id)
    {
        //
        $request->validated();
    
        $organization = Organization::findOrFail($id);
        $organization->fill($request->all());
    
        if($request->hasFile('logo')) {
            $path = $request->logo->store('organization', 'public');
            $organization->logo = $path;
        }
    
        $organization->save();
    
        return redirect()->back()
            ->with('success', 'Selamat, profil Anda berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organization $organization)
    {
        //
    }
}
