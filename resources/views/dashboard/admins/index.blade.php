@extends('layouts.dashboard')
@section('content')
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=add_2" />
    <!-- Header -->
    <div class="flex items-center mb-0 header-container">
        <h1 class="text-3xl font-bold header-title" style="margin-top: 0; margin-left: 170px;">
            <span class="text-black">Data</span>
            <span style="color: #ff7600;">Admin</span>
        </h1>
    </div>
    <div class="mt-4 flex justify-center">
        <div class="py-16 w-5/6 rounded-lg bg-primary-900 px-20"> <!-- Blue container -->
            <!-- Container untuk Tombol Tambah Admin dan Form Pencarian -->
            <div class="flex items-center justify-between mb-5 px-10">
                <!-- Tombol Tambah Admin dengan teks di tengah -->
                <a href="{{ route('admin.create') }}"
                    class="flex items-center justify-center btn btn-primary bg-orange-500 text-white py-2 px-6 rounded-lg hover:bg-orange-600">
                    <span class="material-symbols-outlined mr-2">add_2</span>
                    <!-- Memberi jarak sedikit antara ikon dan teks -->
                    Tambah Admin
                </a>
                <!-- Form Pencarian -->
                <form action="{{ route('admins.index') }}" method="GET" class="relative">
                    <input type="text" name="nama" id="table-search"
                        class="block w-80 p-2 pr-11 text-sm border border-gray-300 rounded-lg bg-gray-50 focus:ring-secondary-600 focus:border-primary-900"
                        placeholder="Search Here" value="{{ request('nama') }}">
                    <button type="submit"
                        class="absolute inset-y-0 right-0 flex items-center p-2 text-white bg-gray-900 rounded-r-lg hover:bg-primary-950">
                        <span class="sr-only">Search</span>
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5A7 7 0 1 1 5 7a7 7 0 0 1 12 0z" />
                        </svg>
                    </button>
                </form>
            </div>
            <div class="table-container mx-auto">
                <table class="table table-hover text-black w-full rounded-lg">
                    <thead class="text-lg text-nowrap text-black-900 bg-gray-50 border-b">
                        <tr>
                            <th scope="col" class="px-4 py-4 font-semibold">Nama</th>
                            <th scope="col" class="px-6 py-4 font-semibold">Email</th>
                            <th scope="col" class="px-6 py-4 font-semibold">Role</th>
                            <th scope="col" class="px-6 py-4 text-center font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $admin)
                            <tr>
                                <td class="px-6 py-4">{{ $admin->nama }}</td>
                                <td class="px-6 py-4">{{ $admin->email }}</td>
                                <td class="px-6 py-4 text-center">{{ $admin->role == 2 ? 'Admin' : 'Reviewer' }}</td>
                                <td class="px-6 py-4 text-center items-center flex justify-center">
                                    <a href="{{ route('admin.admins.show', ['id' => $admin->id]) }}"
                                        class="flex items-center text-black-600 mx-auto">
                                        <span
                                            class="inline-flex items-center px-4 py-1 text-sm font-semibold text-white bg-blue-500 rounded-full">
                                            <span class="material-symbols-outlined text-base">visibility</span>
                                            <span class="ml-1">Lihat</span>
                                        </span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="flex justify-center my-10">
        {{ $admins->links() }}
    </div>
    <style>
        .card {
            border-radius: 15px;
        }

        .table {
            border-radius: 12px;
            overflow: hidden;
            background-color: white;
        }

        .table thead th {
            color: #000;
        }

        .table tbody tr {
            background-color: white;
            border-bottom: 1px solid #dee2e6;
        }

        .badge {
            padding: 5px 10px;
            border-radius: 10px;
            font-size: 0.9rem;
        }

        .btn-info {
            color: #fff;
            background-color: #17a2b8;
            border-color: #17a2b8;
        }

        .btn-warning {
            color: #1d3b6c;
        }

        .table-custom {
            margin-left: 20px;
        }

        th,
        td {
            text-align: center;
        }

        .header-container {
            justify-content: space-between;
        }
    </style>
@endsection
