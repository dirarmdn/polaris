@extends('layouts.clear')

@section('content')
<div class="flex items-center justify-center min-h-screen w-screen bg-cover bg-center" style="background-image: url('{{ asset('images/SignUp_BG.png') }}')">
    <div class="w-full max-w-xl px-12 py-4 bg-white shadow-md rounded-xl">
        <div class="flex justify-center mb-6 mt-8">
            <img src="{{ asset('images/Logo.png') }}" alt="Logo" class="h-20">
        </div>
        <h2 class="mb-8 text-md font-bold text-center">Bergabung bersama kami</h2>
        <form method="POST" action="{{ route('user.register') }}">
            @csrf
            <!-- Nama Lengkap -->
            <div class="mb-4">
                <input type="text" id="nama" name="nama" placeholder="Nama Lengkap" class="w-full px-6 py-3 text-md border rounded-lg focus:outline-none focus:ring focus:ring-primary-300" value="{{ old('nama') }}">
                @error('nama')
                    <span class="text-xs text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <input type="email" id="email" name="email" placeholder="Email" class="w-full px-6 py-3 text-md border rounded-lg focus:outline-none focus:ring focus:ring-primary-300" value="{{ old('email') }}">
                @error('email')
                    <span class="text-xs text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <!-- Jabatan -->
            <div class="mb-4">
                <input type="text" id="jabatan" name="jabatan" placeholder="Jabatan dalam Organisasi" class="w-full px-6 py-3 text-md border rounded-lg focus:outline-none focus:ring focus:ring-primary-300" value="{{ old('jabatan') }}">
                @error('jabatan')
                    <span class="text-xs text-red-600">{{ $message }}</span>
                @enderror
            </div>
            
            <!-- Organisasi -->
            <div class="mb-4">
                <input type="text" id="nama_organisasi" name="nama_organisasi" placeholder="Nama organisasi" class="w-full px-6 py-3 text-md border rounded-lg focus:outline-none focus:ring focus:ring-primary-300" value="{{ old('nama_organisasi') }}">
                @error('nama_organisasi')
                    <span class="text-xs text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4 relative">
                <input type="password" id="password" name="password" placeholder="Password" class="w-full px-6 py-3 text-md border rounded-lg focus:outline-none focus:ring focus:ring-primary-300">
                <span class="absolute right-3 top-3 cursor-pointer" onclick="togglePasswordVisibility('password')">
                    <i class="material-icons" id="password-icon">visibility</i>
                </span>
                @error('password')
                    <span class="text-xs text-red-600">{{ $message }}</span>
                @enderror
                <p class="text-xs text-gray-500">Minimal 8 karakter. Contoh: password123!</p>
            </div>

            <!-- Konfirmasi Password -->
            <div class="mb-4 relative">
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password" class="w-full px-6 py-3 text-md border rounded-lg focus:outline-none focus:ring focus:ring-primary-300">
                <span class="absolute right-3 top-3 cursor-pointer" onclick="togglePasswordVisibility('password_confirmation')">
                    <i class="material-icons" id="password-confirmation-icon">visibility</i>
                </span>
            </div>

            <!-- Persyaratan -->
            <div class="flex items-center mb-4">
                <input type="checkbox" id="terms" name="terms" class="w-4 h-4 text-primary-900 focus:ring-primary-500 focus:outline-none">
                <label for="terms" class="ml-2 text-md font-medium text-gray-700">Saya setuju dengan syarat dan ketentuan</label>
            </div>

            <!-- Button Sign Up -->
            <div class="flex justify-center">
                <button type="submit" class="w-full px-4 py-4 text-md font-bold text-white bg-primary-900 rounded-lg hover:bg-primary-700">Sign Up</button>
            </div>
        </form>

        <!-- Login -->
        <p class="mt-6 mb-8 text-lg text-center text-gray-500">Sudah punya akun? <a href="" class="text-accent-600 hover:underline">Login sekarang</a></p>
    </div>
</div>

<script>
    function togglePasswordVisibility(inputId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(inputId === 'password' ? 'password-icon' : 'password-confirmation-icon');
        
        if (input.type === "password") {
            input.type = "text";
            icon.textContent = 'visibility_off'; // Change icon to 'visibility_off'
        } else {
            input.type = "password";
            icon.textContent = 'visibility'; // Change icon back to 'visibility'
        }
    }
</script>
@endsection
