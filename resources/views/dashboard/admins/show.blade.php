@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-2xl font-bold text-black-800 mb-6">Detail <span class="text-accent-600">Admin</span></h2>

        <div class="bg-primary-900 text-white rounded-lg p-6 flex items-center">
            <!-- Profile Image -->
            <div class="w-24 h-24 bg-primary-800 rounded-full flex justify-center items-center">
                <img src="{{ asset('images/profile.png') }}" alt="Profile Picture" class="rounded-full w-full h-full object-cover" />
            </div>
            <div class="ml-4">
                <h3 class="text-2xl font-semibold">{{ $user->name }}</h3>
                <p class="text-lg text-accent-500">{{ $user->email }} <span class="text-lg text-white"> - {{ $user->role }}</span></p>
            </div>
        </div>

        <div 
        class="bg-white mt-6 p-6 rounded-lg shadow-md">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p class="text-black-600 font-bold">Nama Lengkap</p>
                    <p class="text-black-800">{{ $user->name }}</p>
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
                    <p class="text-black-600 font-bold">Dibuat pada</p>
                    <p class="text-black-800">{{ \Carbon\Carbon::parse($user->created_at)->translatedFormat('d F Y') }}</p>
                </div>
            </div>
        </div>

        <div class="mt-6 flex space-x-4">
            <button class="bg-primary-700 text-white px-4 py-2 rounded-lg hover:bg-primary-600">
                Ubah
            </button>
            <button class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-500">
                Suspend
            </button>
        </div>
    </div>
</div>
@endsection
