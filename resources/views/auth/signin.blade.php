@extends('layouts.clear')

@section('content')
<div class="flex items-center justify-center min-h-screen w-screen bg-cover bg-center" style="background-image: url('{{ asset('images/SignUp_BG.png') }}')">
    <div class="w-full max-w-md px-8 py-4 bg-white shadow-md rounded-xl">
        <a href="{{ route('home') }}" class="flex justify-center mb-6 mt-8">
            <img src="{{ asset('images/Logo.png') }}" alt="Logo" class="h-20">
        </a>
        <form method="POST" action="{{ route('login.submit') }}">
            @csrf 
            
            <!-- Email -->
            <div class="mb-4">
                <input type="email" id="email" name="email" placeholder="Masukkan email terdaftar Anda" class="w-full max-w-md px-4 py-3 text-md border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-primary-300" value="{{ old('email') }}">
                <span class="text-xs text-red-600">{{ $errors->first('email') }}</span> 
            </div>

            <!-- Password -->
            <div class="mb-4 relative">
                <input type="password" id="password" name="password" placeholder="Password" class="w-full max-w-md px-4 py-3 text-md border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-primary-300">
                <span class="text-xs text-red-600">{{ $errors->first('password') }}</span> 
                <button type="button" class="absolute inset-y-0 right-4 flex items-center text-black-600 transition-transform duration-300" id="toggle-password">
                <span class="material-icons" id="eye-icon">visibility</span>
                </button>
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between mb-4">
                <a href="" class="text-md text-dark-400 hover:underline">Lupa Password?</a>
            </div>

            <!-- Button Login -->
            <div class="flex justify-center">
                <button type="submit" class="w-full px-3 py-4 text-md font-bold text-white bg-primary-900 rounded-lg hover:bg-primary-700">Sign in</button>
            </div>
        </form>
        
        @if($errors->any())
            <div class="mt-4">
                <div class="alert alert-danger">
                    <ul class="list-disc list-inside text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <!-- Sign Up -->
        <p class="mt-6 mb-8 text-lg text-center text-dark-400">Tidak punya akun? <a href="{{ route('user.register') }}" class="text-dark-400 hover:underline font-bold">Daftar sekarang</a></p>
    </div>
</div>
            <script>
            document.getElementById('toggle-password').addEventListener('click', function () {
            const passwordField = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.textContent = 'visibility_off'; 
            } else {
                passwordField.type = 'password';
                eyeIcon.textContent = 'visibility'; 
            }
        });

            </script>

@endsection
