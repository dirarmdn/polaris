<?php

namespace App\Http\Controllers;

use App\Models\Submitter;
use view;
use App\Models\User;
use App\Models\Pengaju;
use App\Models\Organization;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.signup');
    }

    public function register(Request $request)
    {
        // Daftar domain umum yang tidak diizinkan
        $blockedDomains = ['gmail.com', 'yahoo.com', 'outlook.com', 'hotmail.com'];
    
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:150',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users',
                function ($attribute, $value, $fail) use ($blockedDomains) {
                    // Ambil domain dari email
                    $emailDomain = substr(strrchr($value, "@"), 1);
    
                    // Cek apakah domain ada di daftar domain yang diblokir
                    if (in_array($emailDomain, $blockedDomains)) {
                        $fail('Email tidak valid. Gunakan email corporate yang sesuai.');
                    }
                },
            ],
            'position' => 'required|string|max:255',
            'organization_name' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
            'terms' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Generate kode organisasi
        $organization_code = strtoupper(substr($request->organization_name, 0, 3) . rand(100, 999));
    
        // Cek apakah organisasi sudah ada atau belum
        $organization = Organization::firstOrCreate(
            ['organization_name' => $request->organization_name],
            ['organization_code' => $organization_code]
        );
    
        // Buat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $submitter = Submitter::create([
            'user_id' => $user->user_id,
            'position_in_organization' => $request->position,
            'organization_code' => $organization->organization_code,
        ]);
    
        auth()->login($user);
    
        return redirect()->route('home');
    }

    public function showLoginForm()
    {
        return view('auth.signin'); 
    }

    public function submitlogin(Request $request)
    {
        // Validate 
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Attempt to log the user in
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('dashboard')->with('success', 'Login successful!');
        }

         // If authentication fails
        return back()->withErrors(['email' => 'Invalid email or password'])->onlyInput('email');
    }

}