@extends('layouts.dashboard')

@section('title', 'Profil Pengguna')

@section('content')
<div class="mx-10">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-2xl font-bold text-black-800 mb-6">Profil <span class="text-accent-600">Saya</span></h2>

        <div class="bg-primary-900 text-white rounded-lg p-10 flex justify-between items-end">
            <!-- Profile Image -->
            <div class="flex items-center justify-center gap-7">
                <div class="w-28 h-28 bg-primary-800 rounded-full flex justify-center items-center">
                    <img src="{{ asset('images/profile.png') }}" alt="Profile Picture" class="rounded-full w-full h-full object-cover" />
                </div>
                <div>
                    <h3 class="text-2xl font-semibold">{{ $user->nama }}</h3>
                    <p class="text-lg text-accent-500">{{ $user->email }} <span class="text-lg text-white"> - {{ $user->role }}</span></p>
                </div>
            </div>
            <div class="flex flex-col text-sm font-light justify-end">
                <button class="bg-primary-700 text-white px-4 py-2 rounded-lg hover:bg-primary-600 ml-auto mb-2">
                    <span class="material-symbols-outlined mr-2">
                        edit</span>Ubah
                </button>
                <h1 class="ml-auto">Diedit pada: {{ \Carbon\Carbon::parse($user->updated_at)->translatedFormat('d F Y') }}</h1>
                <h1>Dibuat pada: {{ \Carbon\Carbon::parse($user->created_at)->translatedFormat('d F Y') }}</h1>
            </div>
        </div>

        <div 
        class="bg-white mt-6 p-6 rounded-lg shadow-md">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p class="text-black-600 font-bold">Nama Lengkap</p>
                    <p class="text-black-800">{{ $user->nama }}</p>
                </div>
                <div>
                    <p class="text-black-600 font-bold">Email</p>
                    <p class="text-black-800">{{ $user->email }}</p>
                </div>
                <div>
                    <p class="text-black-600 font-bold">Jabatan</p>
                    <p class="text-black-800">{{ $user->jabatan }}</p>
                </div>
                <div>
                    <p class="text-black-600 font-bold">Organisasi</p>
                    <p class="text-black-800">{{ $user->organisasi->nama }}</p>
                </div>
                <div>
                    <p class="text-black-600 font-bold">Dibuat pada</p>
                    <p class="text-black-800">{{ \Carbon\Carbon::parse($user->created_at)->translatedFormat('d F Y') }}</p>
                </div>
            </div>
        </div>

        <div class="mt-6 flex space-x-4">
        </div>
    </div>
</div>
@endsection
