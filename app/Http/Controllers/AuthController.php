<?php

namespace App\Http\Controllers;

use view;
use App\Models\User;
use App\Models\Pengaju;
use App\Models\Organisasi;
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
            'nama' => 'required|string|max:255',
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
            'jabatan' => 'required|string|max:255',
            'nama_organisasi' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
            'terms' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Generate kode organisasi
        $kode_organisasi = strtoupper(substr($request->nama_organisasi, 0, 3) . rand(100, 999));
    
        // Cek apakah organisasi sudah ada atau belum
        $organisasi = Organisasi::firstOrCreate(
            ['nama' => $request->nama_organisasi],
            ['kode_organisasi' => $kode_organisasi]
        );
    
        // Buat user baru
        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'jabatan' => $request->jabatan,
            'kode_organisasi' => $organisasi->kode_organisasi,
        ])-> sendEmailVerificationNotification();
    
        // Login user setelah registrasi
        auth()->login($user);
    
        return redirect()->route('home');
    }
    

    public function viewProfile() {
        $user = Auth::user()->load('organisasi');
        return view('auth.profile', compact('user'));
    }

    public function signOut(Request $request)
    {
        Auth::logout(); // Logout user dari session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Anda telah berhasil logout.');
    }
}