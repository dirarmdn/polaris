@extends('layouts.dashboard')

@section('title', 'Dashboard POLARIS')

@section('content')
    <div class="w-full h-50 flex flex-col items-center justify-center bg-cover bg-no-repeat text-center text-white bg-bottom"
        style="background-image: url('{{ asset('images/SignUp_BG.png') }}');">
        <div class="w-full p-6 bg-full">
            <div class="text-center pt-16 flex flex-col">
                <h1 class="text-3xl font-bold">Halo selamat datang <span class="text-accent-600">
                        {{ auth()->user()->name }}
                    </span></h1>
                @if (auth()->user()->role == 1)
                    <p class="text-lg text-white-500 mt-2">Punya kebutuhan aplikasi lainnya?</p>
                    <a href="{{ route('submissions.create') }}" class="mt-6 mx-auto px-6 py-3 bg-accent-600 text-white rounded-lg hover:bg-accent-500">
                        Tambah Ajuan
                    </a>
                @endif
            </div>
        </div>

        <!-- Content Section -->
        <div class="grid grid-cols-3 gap-6 mt-10 bg-white w-full py-10 px-36">
            <!-- Submissions List -->
            <div class="col-span-2 bg-primary-50 rounded-xl ml-30">
                <div class="flex justify-between items-center bg-primary-900 px-4 py-5 rounded-xl">
                    <h2 class="text-white text-lg font-semibold">Daftar Pengajuan @if(auth()->user()->role == 1) Anda @endif</h2>
                    <a href="{{ route('dashboard.submissions.index') }}"
                        class="text-white text-sm flex justify-between items-center transform transition-transform duration-300 hover:scale-105 hover:text-light-blue-200">
                        Lihat Selengkapnya
                        <span
                            class="material-symbols-outlined text-lg transform transition-transform duration-300 hover:translate-x-1 hover:scale-110">
                            arrow_outward
                        </span>
                    </a>
                </div>
                <div class="mt-4 space-y-4 px-10 py-4 text-left">
                    <!-- Submission Item -->
                    @forelse ($pengajuan as $p)
                    <div class="bg-white py-4 px-6 rounded-xl">
                        <h3 class="text-black text-lg font-bold">{{ $p->submission_title }}</h3>
                        <p class="text-sm text-gray-500 mt-1">
                            {{ \Illuminate\Support\Str::limit($p->problem_description, 100, '...') }}
                        </p>
                        <p class="text-accent-light-500 font-semibold mt-2">
                            @if ($p->status == 'belum_direview')
                                Belum Direview
                            @elseif ($p->status == 'terverifikasi')
                                Terverifikasi
                            @elseif ($p->status == 'ditolak')
                                Ditolak
                            @endif
                        </p>
                    </div>
                    @empty
                        <p class="text-white">
                            Belum ada pengajuan
                        </p>
                    @endforelse
                </div>
            </div>

            <!-- FAQ and Other Submissions -->
            <div class="space-y-10 bg-light-blue-300 my-auto mx-auto p-7 rounded-xl justify-center items-center flex flex-col">
                @if (auth()->user()->role == 1)
                <a href="{{ route('home.help') }}" class="bg-light-blue-500 p-6 w-full rounded-lg text-center">
                    <h3 class="text-white text-7xl">
                        <span class="material-symbols-outlined">
                            help
                        </span></h3>
                    <p class="mt-1 text-xl font-bold text-white">Frequently Asked Question</p>
                </a>
                <a href="{{ route('submissions.index') }}" class="bg-light-blue-500 p-6 w-full rounded-lg text-center">
                    <h3 class="text-white text-7xl"><span class="material-symbols-outlined">
                            inventory_2
                        </span></h3>
                    <p class="mt-1 text-xl font-bold text-white">Daftar Ajuan Lainnya</p>
                </a>
                @else
                <div class="bg-light-blue-500 flex justify-between items-center text-left p-6 w-full rounded-lg">
                    <div class="flex flex-col">
                        <p class="mt-1 text-lg font-bold text-white">Belum Direview</p>
                        <p class="mt-1 text-6xl text-left font-bold text-white">{{ $jumlah_belum }}</p>
                    </div>
                    <h3 class="text-white text-7xl">
                        <span class="material-symbols-outlined">
                            description
                        </span>
                    </h3>
                </div>
                <div class="bg-light-blue-500 flex justify-between items-center text-left p-6 w-full rounded-lg">
                    <div class="flex flex-col">
                        <p class="mt-1 text-lg font-bold text-white">Sudah Terverifikasi</p>
                        <p class="mt-1 text-6xl text-left font-bold text-white">{{ $jumlah_terverifikasi }}</p>
                    </div>
                    <h3 class="text-white text-7xl">
                        <span class="material-symbols-outlined">
                            description
                        </span>
                    </h3>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
