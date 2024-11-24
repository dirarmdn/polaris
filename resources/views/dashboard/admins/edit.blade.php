@extends('layouts.dashboard')

@section('title', 'Update Admin')

@section('content')
    <!-- Header -->
    <div class="flex items-center mb-0 header-container">
        <h1 class="text-3xl font-bold header-title" style="margin-top: 0; margin-left: 170px;">
            <span class="text-black">Update</span>
            <span style="color: #ff7600;">Admin</span>
        </h1>
    </div>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="container mx-auto p-6">
        <div class="bg-white rounded-lg shadow-lg mx-auto p-5 mt-0" style="max-width: 72rem;">
            <form action="{{ route('admin.update', ['id' => $admin->user_id]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-8 flex items-center">
                    <label for="name" class="w-1/4 text-black-700 font-semibold">Nama Lengkap:</label>
                    <input type="text" name="nama" id="name" value="{{ old('name', $admin->nama) }}" required class="w-1/2 max-w-[400px] custom-input py-4 text-xs">
                </div>

                <div class="mb-8 flex items-center">
                    <label for="email" class="w-1/4 text-black-700 font-semibold">Email:</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $admin->email) }}" required class="w-1/2 max-w-[400px] custom-input py-7 text-xs">
                </div>

                <div class="mb-8 flex items-center">
                    <label for="no_telp" class="w-1/4 text-black-700 font-semibold">No Telepon:</label>
                    <input type="text" name="no_telp" id="no_telp" value="{{ old('nip', $admin->no_telp) }}" required class="w-1/2 max-w-[400px] custom-input py-7 text-xs">
                </div>
{{-- 
                <div class="mb-8 flex items-center">
                <label for="password" class="w-1/4 text-black-700 font-semibold">Password:</label>
                <div class="relative w-full max-w-[300px]">
                    <input type="password" name="password" id="password" class="w-full custom-input py-2 pl-3 pr-10 text-xs">
                    <button type="button" class="absolute inset-y-0 right-2 flex items-center text-black-600" id="toggle-password" tabindex="-1">
                        <span class="material-icons cursor-pointer" id="eye-icon">visibility</span>
                    </button>
                </div>
            </div> --}}


                <div class="mb-8 flex items-center">
                    <label for="role" class="w-1/4 text-black-700 font-semibold">Role:</label>
                    <select name="role" id="role" class="w-1/4 max-w-[300px] custom-input py-13 text-xs">
                        <option value="admin" {{ $admin->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="reviewer" {{ $admin->role == 'reviewer' ? 'selected' : '' }}>Reviewer</option>
    
                    </select>
                </div>

                <div class="text-right">
                    <button type="submit" class="bg-secondary-900 text-white font-semibold py-2 px-4 rounded-lg">
                        Simpan
                    </button>
                </div>

            </form>
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

    <style>
        .custom-input {
            border: 2px solid #ccc;
            padding: 0.75rem;
            border-radius: 8px;
            transition: border-color 0.3s;
        }
        .custom-input:focus {
            border-color: #4A90E2;
            outline: none;
        }
        .required-asterisk {
            color: red;
        }
    </style>
@endsection
