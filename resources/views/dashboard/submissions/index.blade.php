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
    <div class="flex items-center mb-4 header-container" style="margin-top: 0;">
        <h1 class="text-2xl font-bold header-title" style="margin-top: 0; margin-left: 110px;">
            <span class="text-black">Data</span>
            <span style="color: #ff7600;">Pengajuan</span>
        </h1>

        <!-- Search bar  -->
        <form action="{{ route('dashboard.submissions.index') }}" method="GET" class="relative"
            style="margin-right: 7rem; margin-top: -10px;">
            <input type="text" name="submission_title" id="table-search"
                class="block w-80 p-2 pr-12 text-sm border border-gray-300 rounded-lg bg-gray-50 focus:ring-secondary-600 focus:border-primary-900"
                placeholder="Search Here" value="{{ request('submission_title') }}">
            <button type="submit"
                class="absolute inset-y-0 right-0 flex items-center p-2 text-white bg-primary-900 rounded-r-lg hover:bg-primary-950">
                <span class="sr-only">Search</span>
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5A7 7 0 1 1 5 7a7 7 0 0 1 12 0z" />
                </svg>
            </button>
        </form>
    </div>

    <!-- Table -->
    <div class="table-container mx-auto" style="max-width: 1300px; padding: 1rem;">
        <table
            class="w-full text-sm text-left text-black-700 border border-gray-400 border-collapse rounded-lg overflow-hidden shadow-lg">
            <thead class="text-lg text-nowrap text-black-900 bg-gray-50 border-b">
                <tr>
                    <th scope="col" class="px-6 py-4 font-semibold">Judul Aplikasi</th>
                    <th scope="col" class="px-5 py-4 font-semibold">Pengaju</th>
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
                        <td class="px-6 py-4">{{ $pengajuan->user->name ?? 'Tidak diketahui' }}</td>
                        <td class="px-6 py-4">
                            {{ $pengajuan->created_at ? $pengajuan->created_at->format('Y-m-d H:i:s') : 'Tanggal tidak tersedia' }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            @if ($pengajuan->status == 'terverifikasi')
                                <span
                                    class="inline-block px-3 py-1 text-sm font-semibold text-white bg-green-500 rounded-full">Diverifikasi</span>
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
                                <a href="{{ route('dashboard.submissions.review.create', ['submission_code' => $pengajuan->submission_code]) }}"
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
                            <td class="px-6 py-4">
                                <a href="{{ route('submissions.show', ['submission_code' => $pengajuan->submission_code]) }}"
                                    class="flex items-center text-nowrap text-black-600">
                                    <span class="material-symbols-outlined mr-1 text-lg">visibility</span> Lihat Detail
                                </a>
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
