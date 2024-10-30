@extends('layouts.clear')

@section('content')
<div class="flex items-center justify-center min-h-screen w-screen bg-cover bg-center" style="background-image: url('{{ asset('images/SignUp_BG.png') }}')">
    <div class="w-full max-w-md px-8 py-4 bg-white shadow-md rounded-xl">
        <div class="flex justify-center mb-6 mt-8">
            <img src="{{ asset('images/Logo.png') }}" alt="Logo" class="h-20">
        </div>
        <form method="POST" action="{{ route('login.show') }}">
           <!-- Email -->
<div class="mb-4">
    <input type="email" id="email" name="email" placeholder="Masukkan email terdaftar Anda" class="w-full max-w-md px-4 py-3 text-md border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-primary-300" value="{{ old('email') }}">
    <span class="text-xs text-red-600">{{ $errors->first('email') }}</span> <!-- Menampilkan pesan error jika ada -->
</div>

<!-- Password -->
<div class="mb-4">
    <input type="password" id="password" name="password" placeholder="Password" class="w-full max-w-md px-4 py-3 text-md border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-primary-300">
    <span class="text-xs text-red-600">{{ $errors->first('password') }}</span> <!-- Menampilkan pesan error jika ada -->
</div>


            <!-- Remember Me -->
            <div class="flex items-center justify-between mb-4">
                <!-- Forgot Password -->
                <a href="" class="text-md text-dark-400 hover:underline">Lupa Password?</a>
            </div>

            <!-- Button Login -->
            <div class="flex justify-center">
                <button type="submit" class="w-full px-3 py-4 text-md font-bold text-white bg-primary-900 rounded-lg hover:bg-primary-700">Sign in</button>
            </div>
        </form>

        <!-- Sign Up -->
        <p class="mt-6 mb-8 text-lg text-center text-dark-400">Tidak punya akun? <a href="{{ route('user.register') }}" class="text-dark-400 hover:underline font-bold">Daftar sekarang</a></p>
    </div>
</div>
@endsection
