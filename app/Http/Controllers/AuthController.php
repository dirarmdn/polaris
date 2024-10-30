<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengaju;
use App\Models\Organisasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'position' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'terms' => 'required',
        ]);
        // dd($validator);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Cek apakah organisasi sudah ada atau belum
        $organisasi = Organisasi::firstOrCreate(
            ['nama' => $request->organization],
            ['kode_organisasi' => strtoupper(substr($request->organization, 0, 3) . rand(100, 999))]
        );

        // Buat user baru
        $user = User::create([
            ['idP' => strtoupper(substr($request->organization, 0, 3) . rand(100, 999))],
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Simpan data ke tabel pengajus
        Pengaju::create([
            'user_id' => $user->id,
            'kode_organisasi' => $organisasi->kode_organisasi,
            'jabatan' => $request->position,
        ]);

        // Login user setelah registrasi
        auth()->login($user);

        return redirect()->route('home');
    }

    public function viewProfile() {
        $user = User::with('organisasi')->findOrFail("0668dc9c-c3e4-3e54-b512-793ede97fd80");
        // dd($user);
        return view('auth.profile', compact('user'));
    }
}