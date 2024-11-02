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
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'jabatan' => 'required|string|max:255',
            'nama_organisasi' => 'required|string|max:255',
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
            'jabatan' => $request-> jabatan,
            'kode_organisasi' => $organisasi -> kode_organisasi,
        ]);

        // Simpan data ke tabel pengajus
        Pengaju::create([
            'user_id' => $user->id,
            'kode_organisasi' => $organisasi->kode_organisasi,
            'jabatan' => $request->jabatan,
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