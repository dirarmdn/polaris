@extends('layouts.dashboard')

@section('title', 'Detail Admin')

@section('content')
<div class="container mx-auto my-8 px-10">
    <h2 class="text-2xl font-bold text-black-800 mb-6">Detail <span class="text-accent-600">Admin</span></h2>

    <div class="bg-white rounded-lg shadow-lg p-6">

        <div class="bg-primary-900 text-white rounded-lg p-6 flex items-center">
            <!-- Profile Image -->
            <div class="w-24 h-24 bg-primary-800 rounded-full flex justify-center items-center">
                <img src="{{ asset('images/profile.png') }}" alt="Profile Picture" class="rounded-full w-full h-full object-cover" />
            </div>
            <div class="ml-4">
                <h3 class="text-2xl font-semibold">{{ $admin->name }}</h3>
                <p class="text-lg text-accent-500">{{ $admin->email }} <span class="text-lg text-white"> - 
                    @if ($admin->role == 2)
                        Admin
                    @else
                        Reviewer
                    @endif    
                </span></p>
            </div>
        </div>

        <div 
        class="bg-white mt-6 p-6 rounded-lg shadow-md">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p class="text-black-600 font-bold">Nama Lengkap</p>
                    <p class="text-black-800">{{ $admin->name }}</p>
                </div>
                <div>
                    <p class="text-black-600 font-bold">Email</p>
                    <p class="text-black-800">{{ $admin->email }}</p>
                </div>
                <div>
                    <p class="text-black-600 font-bold">Dibuat pada</p>
                    <p class="text-black-800">{{ \Carbon\Carbon::parse($admin->created_at)->translatedFormat('d F Y') }}</p>
                </div>
            </div>
        </div>

        <div class="mt-6 flex space-x-4">
            <a href="{{ route('admin.edit', ['id' => $admin->user_id]) }}" class="bg-primary-700 text-white px-4 py-2 rounded-lg hover:bg-primary-600">
                Ubah
            </a>
            {{-- <button class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-500">
                Suspend
            </button> --}}
        </div>
    </div>
</div>
@endsection
