<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function create()
    {
        return view('admin.admins.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nip' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8',
            'role' => 'required|string'
        ]);

        return redirect()->route('admin.create')->with('success', 'Admin created successfully.');
    }
    public function edit()
    {
    return view('admin.admins.edit');
    }

    public function update(Request $request)
    {
    $validated = $request->validate([
        'nip' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'password' => 'nullable|string|min:8', 
        'role' => 'required|string'
    ]);

    $admin->save();

    return redirect()->route('admin.edit')->with('success', 'Admin updated successfully.');
    }


}
