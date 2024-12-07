@extends('layouts.dashboard')

@section('title', 'Tambah Admin')

@push('styles')
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
@endpush

@section('content')
    <!-- Header -->
    <div class="flex items-center mb-0 header-container">
        <h1 class="text-3xl font-bold header-title" style="margin-top: 0; margin-left: 170px;">
            <span class="text-black">Tambah</span>
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
            <form action="{{ route('admin.store') }}" method="POST">
                @csrf
                <div class="mb-8 flex items-center">
                    <label for="nip" class="w-1/4 text-black-700 font-semibold">
                        NIP<span class="required-asterisk"> *</span>
                    </label>
                    <input type="text" name="nip" id="nip" class="w-1/2 max-w-[400px] custom-input py-4 text-xs" required> 
                </div>

                <div class="mb-8 flex items-center">
                    <label for="name" class="w-1/4 text-black-700 font-semibold">
                        Nama Lengkap<span class="required-asterisk"> *</span>
                    </label>
                    <input type="text" name="name" id="name" class="w-1/2 max-w-[400px] custom-input py-4 text-xs" required> 
                </div>

                <div class="mb-8 flex items-center">
                    <label for="email" class="w-1/4 text-black-700 font-semibold">
                        Email<span class="required-asterisk"> *</span>
                    </label>
                    <input type="email" name="email" id="email" class="w-1/2 max-w-[400px] custom-input py-7 text-xs" required> 
                </div>
                
                <div class="mb-8 flex items-center">
                    <label for="phone_number" class="w-1/4 text-black-700 font-semibold">
                        Nomor Telepon
                    </label>
                    <input type="text" name="phone_number" id="phone_number" class="w-1/2 max-w-[400px] custom-input py-7 text-xs" required> 
                </div>

            <div class="mb-8 flex items-center">
            <label for="role" class="w-1/4 text-black-700 font-semibold">
                Role<span class="required-asterisk">*</span>
            </label>
            <select name="role" id="role" class="w-1/4 max-w-[300px] custom-input py-13 text-xs " required> 
                <option value="2">Admin</option>
                <option value="3">Reviewer</option>
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
@endsection