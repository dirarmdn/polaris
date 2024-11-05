@extends('layouts.dashboard')

@section('title', 'Dashboard POLARIS')

@section('content')
<div class="w-full h-[250px] flex flex-col items-center justify-center text-center text-white bg-cover bg-center"
            style="background-image: url('{{ asset('images/SignUp_BG.png') }}');">
    <div class="container mx-auto p-6">
        <div class="text-center py-10">
            <h1 class="text-4xl font-bold">Halo selamat datang <span class="text-accent-600">Pengaju</span>!</h1>
            <p class="text-lg text-dark-500 mt-2">Punya kebutuhan aplikasi lainnya?</p>
            <button class="mt-6 px-6 py-3 bg-accent-600 text-white rounded-lg hover:bg-accent-500 transition">
                Tambah Ajuan
            </button>
        </div>

        <!-- Content Section -->
        <div class="grid grid-cols-3 gap-6 mt-10">
            <!-- Submissions List -->
            <div class="col-span-2 bg-primary-900 p-6 rounded-lg">
                <h2 class="text-white text-lg font-semibold">Daftar Pengajuan Anda</h2>
                <div class="mt-4 space-y-4">
                    <!-- Submission Item -->
                    <div class="bg-primary-700 p-4 rounded-lg">
                        <h3 class="text-white font-bold">Judul Pengajuan Anda</h3>
                        <p class="text-sm text-primary-200 mt-1">
                            qwertyuiopasdfghjkl wertyuiosdfghjksdfghj qwertyuiopasdfghjkl asdfghjkqwertyuiop
                        </p>
                        <p class="text-accent-light-500 font-semibold mt-2">Tidak Terverifikasi</p>
                    </div>
                    
                    <!-- Repeat for more items -->
                    <div class="bg-primary-700 p-4 rounded-lg">
                        <h3 class="text-white font-bold">Pengajuan Anda</h3>
                        <p class="text-sm text-primary-200 mt-1">
                            qwertyuiopasdfghjkl wertyuiosdfghjksdfghj qwertyuiopasdfghjkl asdfghjkqwertyuiop
                        </p>
                        <p class="text-light-blue-400 font-semibold mt-2">Terverifikasi</p>
                    </div>
                    
                    <div class="bg-primary-700 p-4 rounded-lg">
                        <h3 class="text-white font-bold">Pengajuan Anda</h3>
                        <p class="text-sm text-primary-200 mt-1">
                            qwertyuiopasdfghjkl wertyuiosdfghjksdfghj qwertyuiopasdfghjkl asdfghjkqwertyuiop
                        </p>
                        <p class="text-accent-light-500 font-semibold mt-2">Belum Terverifikasi</p>
                    </div>
                </div>
            </div>

            <!-- FAQ and Other Submissions -->
            <div class="space-y-6">
                <div class="bg-light-blue-200 p-6 rounded-lg text-center">
                    <h3 class="text-xl font-bold text-dark-900">?</h3>
                    <p class="mt-2 font-semibold text-dark-700">Frequently Asked Question</p>
                </div>
                <div class="bg-light-blue-200 p-6 rounded-lg text-center">
                    <h3 class="text-xl font-bold text-dark-900">📁</h3>
                    <p class="mt-2 font-semibold text-dark-700">Daftar Ajuan Lainnya</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
