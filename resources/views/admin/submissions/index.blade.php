<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengajuan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=visibility" />
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600&display=swap" rel="stylesheet">
</head>
<body class="bg-white">

<!-- Navbar -->
<nav class="bg-white no-shadow py-2">
    <div class="container mx-auto flex justify-between items-center">
        <div class="flex items-center space-x-8">
            <img src="{{ asset('images/Logo(2).png') }}" alt="Logo" class="h-20">
            <a href="#" class="text-black font-semibold">Dashboard</a>
            <div class="relative">
                <a href="#" class="text-black font-semibold">Pengajuan</a>
                <div class="absolute left-0 right-0 h-1" style="background-color: #ff7600; margin-top: 0.25rem;"></div>
            </div>
            <a href="#" class="text-black font-semibold">Mitra</a>
            <a href="#" class="text-black font-semibold">Admin</a>
        </div>
        <div class="flex items-center space-x-8">
            <img src="{{ asset('images/foto_profil.jpg') }}" alt="foto_profil" class="w-10 h-10 rounded-lg">
        </div>
    </div>
</nav>

<!-- Header -->
<div class="flex items-center mb-4 header-container" style="margin-top: 0;">
    <h1 class="text-3xl font-bold header-title" style="margin-top: 0; margin-left: 110px;">
        <span class="text-black">Data</span>
        <span style="color: #ff7600;">Pengajuan</span>
    </h1>

   <!-- Search bar  -->
<form action="{{ route('admin.submissions.index') }}" method="GET" class="relative" style="margin-right: 7rem; margin-top: -10px;">
    <input type="text" name="judul_pengajuan" id="table-search" class="block w-80 p-2 pr-12 text-sm border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search Here" value="{{ request('judul_pengajuan') }}">
    <button type="submit" class="absolute inset-y-0 right-0 flex items-center p-2 text-white bg-blue-600 rounded-r-lg hover:bg-blue-700">
        <span class="sr-only">Search</span>
        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5A7 7 0 1 1 5 7a7 7 0 0 1 12 0z" />
        </svg>
    </button>
</form>
</div>

<!-- Table -->
<div class="table-container mx-auto" style="max-width: 1300px; padding: 1rem;">
    <table class="w-full text-sm text-left text-black-700 border border-gray-400 border-collapse rounded-lg overflow-hidden shadow-lg">
    <thead class="text-xl text-black-900 bg-gray-50 border-b">
        <tr>
            <th scope="col" class="px-6 py-4 font-semibold">Judul Aplikasi</th>
            <th scope="col" class="px-5 py-4 font-semibold">Pengaju</th>
            <th scope="col" class="px-6 py-4 font-semibold">Tanggal Pengajuan</th>
            <th scope="col" class="px-6 py-4 text-center font-semibold">Status</th>
            <th scope="col" class="px-6 py-4 text-center font-semibold">Aksi</th>
        </tr>
    </thead>
    <tbody>
    @forelse($data_pengajuans as $pengajuan)
    <tr class="bg-white border-b hover:bg-gray-50">
        <td class="px-6 py-4">{{ $pengajuan->judul_pengajuan }}</td>
        <td class="px-6 py-4">{{ $pengajuan->user->name ?? 'Tidak diketahui' }}</td> 
        <td class="px-6 py-4">{{ $pengajuan->created_at->format('Y-m-d H:i:s') }}</td> 
        <td class="px-6 py-4 text-center">
            @if($pengajuan->isVerified)
                <span class="inline-block px-3 py-1 text-sm font-semibold text-white bg-green-500 rounded-full">Diverifikasi</span>
            @else
                <span class="inline-block px-3 py-1 text-sm font-semibold text-white bg-yellow-500 rounded-full">Belum Diverifikasi</span>
            @endif
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="4" class="px-6 py-4 text-center">Tidak ada pengajuan yang ditemukan.</td>
    </tr>
    @endforelse
    </tbody>
</table>
</div>

<!-- Pagination -->
<div class="flex justify-center mt-4">
    {{ $data_pengajuans->links() }}
</div>

</body>
<style>
    body {
        font-family: 'Manrope', sans-serif;
    }
    .no-shadow {
        box-shadow: none;
    }
    .header-container {
        justify-content: space-between;
    }
    th, td {
        text-align: center;
    }
</style>
</html>
