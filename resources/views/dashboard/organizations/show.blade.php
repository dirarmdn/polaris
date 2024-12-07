@extends('layouts.app')

@section('title', 'Detail Mitra')

@section('content')
<div class="max-w-6xl mx-auto my-12 bg-white shadow-md rounded-lg overflow-hidden">

    <!-- Bagian Header -->
    <div class="bg-primary-900 text-white p-6 flex justify-between items-center rounded-t-lg">
        <div class="flex items-center">
            <!-- Logo -->
            <div class="bg-white text-primary-900 rounded-full w-16 h-16 flex items-center justify-center mr-4 overflow-hidden">
                @if ($organization->logo)
                    <img src="{{ asset('storage/' . $organization->logo) }}" alt="Logo" class="w-full h-full object-cover">
                @else
                    <img src="{{ asset('images/profile.png') }}" alt="Default Logo" class="w-full h-full object-cover">
                @endif
            </div>

            <div>
                <h1 class="text-3xl font-bold font-manrope">{{ $organization->organization_name }}</h1>
                <p class="text-lg font-manrope">Bidang Usaha: <span class="font-semibold">{{ $organization->business_field }}</span></p>
            </div>
        </div>
        <div class="text-sm text-accent-light-500">
            Dibuat pada: {{ \Carbon\Carbon::parse($organization->created_at)->format('d F Y') }}
        </div>
    </div>

    <!-- Konten Utama -->
    <div class="bg-white p-6 grid grid-cols-1 md:grid-cols-2 gap-6 border-t border-gray-200">

        <!-- Informasi Mitra -->
        <div class="space-y-6 my-6">
            <!-- Alamat -->
            <div class="grid grid-cols-3 gap-4 items-start">
                <h2 class="text-lg font-semibold text-dark-700 col-span-1 font-manrope">Alamat</h2>
                <p class="text-md text-dark-500 col-span-2">{{ $organization->address }}</p>
            </div>

            <!-- Website -->
            <div class="grid grid-cols-3 gap-4 items-start">
                <h2 class="text-lg font-semibold text-dark-700 col-span-1 font-manrope">Website</h2>
                <p class="text-md text-primary-600 col-span-2">
                    <a href="{{ $organization->website }}" target="_blank" class="hover:underline">{{ $organization->website }}</a>
                </p>
            </div>

            <!-- Tentang Mitra -->
            <div class="grid grid-cols-3 gap-4 items-start">
                <h2 class="text-lg font-semibold text-dark-700 col-span-1 font-manrope">Tentang Mitra</h2>
                <p class="text-md text-dark-500 col-span-2">{{ $organization->company_description }}</p>
            </div>
        </div>

        <!-- Anggota -->
        <div class="border-l border-gray-300 pl-6">
            <h2 class="text-lg font-semibold mb-4 text-center text-dark-700 font-manrope">Anggota</h2>

            @if ($organization->submitter->isEmpty())
                <p class="text-gray-500 italic text-center">Tidak ditemukan anggota.</p>
            @else
                <div class="max-h-64 overflow-y-auto pr-2">
                    <ul class="space-y-4">
                        @foreach ($organization->submitter as $submitter)
                            <li class="bg-light-blue-100 p-4 rounded-md shadow-md hover:shadow-lg transition-shadow">
                                <p class="text-dark-800 font-semibold">{{ $submitter->user->email }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection