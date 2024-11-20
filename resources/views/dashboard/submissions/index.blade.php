@extends('layouts.dashboard')

@section('title', 'Daftar Pengajuan')

@push('styles')
    <style>
        .no-shadow {
            box-shadow: none;
        }

        .header-container {
            justify-content: space-between;
        }

        th,
        td {
            text-align: center;
        }
    </style>
@endpush

@section('content')
    <!-- Header -->
    <div class="container mx-auto px-4">
        <!-- Title -->
        <h1 class="text-2xl font-bold mb-6">
            <span class="text-black">Data</span>
            <span class="text-[#ff7600]">Pengajuan</span>
        </h1>
        
        <!-- Controls Container -->
        <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
            <!-- Export Button -->
            <a href="{{ dashboard.submission.print-submission }}" class="flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors" style="margin-left: 120px"> 
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                    <polyline points="7 10 12 15 17 10"/>
                    <line x1="12" y1="15" x2="12" y2="3"/>
                </svg>
                Export Data
            </a>



            <!-- Search Form -->
            <form action="{{ route('dashboard.submissions.index') }}" method="GET" class="relative flex-1 max-w-md" style="margin-right: 120px">
                <input 
                    type="text" 
                    name="submission_title" 
                    id="table-search"
                    class="w-full p-2 pr-12 text-sm border border-gray-300 rounded-lg bg-gray-50 focus:ring-2 focus:ring-primary-600 focus:border-primary-600" 
                    placeholder="Search Here"
                    value="{{ request('submission_title') }}"
                >
                <button 
                    type="submit"
                    class="absolute right-0 top-0 h-full px-4 text-white bg-primary-900 rounded-r-lg hover:bg-primary-950 transition-colors"
                >
                    <span class="sr-only">Search</span>
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5A7 7 0 1 1 5 7a7 7 0 0 1 12 0z" />
                    </svg>
                </button>
            </form>
        </div>
    </div>

    <!-- Table -->
    <div class="table-container mx-auto" style="max-width: 1300px; padding: 1rem;">
        <table
            class="w-full text-sm text-left text-black-700 border border-gray-400 border-collapse rounded-lg overflow-hidden shadow-lg">
            <thead class="text-lg text-nowrap text-black-900 bg-gray-50 border-b">
                <tr>
                    <th scope="col" class="px-6 py-4 font-semibold">Judul Aplikasi</th>
                    @if (auth()->user()->role != 1)
                        <th scope="col" class="px-5 py-4 font-semibold">Pengaju</th>
                        <th scope="col" class="px-5 py-4 font-semibold">Asal Organisasi</th>
                    @else
                        <th scope="col" class="px-5 py-4 font-semibold">Hasil Review</th>
                        <th scope="col" class="px-5 py-4 font-semibold">Tanggal Review</th>
                    @endif
                    <th scope="col" class="px-6 py-4 font-semibold">Tanggal Pengajuan</th>
                    <th scope="col" class="px-6 py-4 text-center font-semibold">Status</th>
                    <th scope="col" class="px-6 py-4 text-center font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <tbody>
                @forelse($data_pengajuans as $pengajuan)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $pengajuan->submission_title }}</td>
                        @if (auth()->user()->role != 1)
                            <td class="px-6 py-4">
                                {{ auth()->user()->role == 3
                                    ? $pengajuan->submitter_name ?? 'Tidak diketahui'
                                    : $pengajuan->submitter->user->name ?? 'Tidak diketahui' }}
                            </td>
                            <td class="px-6 py-4">
                                {{ auth()->user()->role == 3
                                    ? $pengajuan->organization_name ?? 'Tidak diketahui'
                                    : $pengajuan->submitter->organization->organization_name ?? 'Tidak diketahui' }}
                            </td>
                        @else
                        <td class="px-6 py-4">
                        {{ $pengajuan->review_description ?? 'Belum di-review' }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $pengajuan->review_date ?? 'Belum di-review' }}
                            </td>
                        @endif
                        <td class="px-6 py-4">
                            {{ $pengajuan->created_at ? $pengajuan->created_at : 'Tanggal tidak tersedia' }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            @if ($pengajuan->status == 'terverifikasi')
                                <span
                                    class="inline-block min-w-40 px-3 py-1 text-sm font-semibold text-white bg-green-500 rounded-full">Diverifikasi</span>
                            @elseif ($pengajuan->status == 'belum_direview')
                                <span
                                    class="inline-block min-w-40 px-3 py-1 text-sm font-semibold text-white bg-gray-400 rounded-full">Belum
                                    Diverifikasi</span>
                            @elseif ($pengajuan->status == 'ditolak')
                                <span
                                    class="inline-block min-w-40 px-3 py-1 text-sm font-semibold text-white bg-red-500 rounded-full">
                                    Ditolak</span>
                            @elseif ($pengajuan->status == 'diarsipkan')
                                <span
                                    class="inline-block min-w-40 px-3 py-1 text-sm font-semibold text-white bg-gray-300 rounded-full">
                                    Diarsipkan</span>
                            @endif
                        </td>
                        @if (auth()->user()->role == 3)
                            <td class="px-6 py-4">
                                <a href="{{ route('review.edit', ['review' => $pengajuan->submission_code]) }}"
                                    class="flex items-center text-black-600 mx-auto">
                                    <span
                                        class="inline-flex items-center px-4 py-1 text-sm font-semibold text-white bg-blue-500 rounded-full">
                                        <span class="material-symbols-outlined">
                                            rate_review
                                        </span>
                                        <span class="ml-1">Review</span>
                                    </span>
                                </a>
                            </td>
                        @else
                            <td class="px-6 py-4 flex items-center justify-center gap-2">
                                <a href="{{ route('submissions.show', ['submission_code' => $pengajuan->submission_code]) }}"
                                    class="flex items-center text-nowrap text-black-600 text-secondary-800">
                                    <span class="material-symbols-outlined mr-1 text-lg">visibility</span>
                                </a>
                                @if ($pengajuan->status != 'terverifikasi')
                                    <a href="{{ route('submissions.edit', ['submission_code' => $pengajuan->submission_code]) }}"
                                        class="flex items-center text-nowrap text-black-600 text-accent-light-500">
                                        <span class="material-symbols-outlined mr-1 text-lg">edit</span>
                                    </a>
                                    <form method="POST"
                                        action="{{ route('submission.destroy', ['submission_code' => $pengajuan->submission_code]) }}"
                                        class="flex items-center text-nowrap text-black-600 text-red-500">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            <span class="material-symbols-outlined mr-1 text-lg">delete</span>
                                        </button>
                                    </form>
                                @endif
                            </td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center">Tidak ada pengajuan yang ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="flex justify-center my-10">
        {{ $data_pengajuans->links() }}
    </div>
@endsection
