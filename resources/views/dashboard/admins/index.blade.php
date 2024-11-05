@extends('layouts.dashboard')

@section('content')
   <!-- Header -->
   <div class="flex items-center mb-0 header-container">
    <h1 class="text-3xl font-bold header-title" style="margin-top: 0; margin-left: 170px;">
        <span class="text-black">Data</span>
        <span style="color: #ff7600;">Admin</span>
    </h1>
</div>

<!-- Tambah Admin button and Search Form -->
<div class="flex items-center mb-10" style="margin-left: 170px;">
    <a href="{{ route('admin.create') }}" class="btn btn-primary bg-orange-500 text-white py-2 px-4 rounded-lg hover:bg-orange-600" style="margin-right: 20px;"> 
        Tambah Admin
    </a>
    <form action="{{ route('admins.index') }}" method="GET" class="relative">
        <input type="text" name="nama" id="table-search"
               class="block w-80 p-2 pr-12 text-sm border border-gray-300 rounded-lg bg-gray-50 focus:ring-secondary-600 focus:border-primary-900 ml-10"
               placeholder="Search Here" value="{{ request('nama') }}">
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


   <div class="mt-4 flex justify-center">
        <table class="table table-hover text-black w-3/4 rounded-lg">
            <thead>
                <tr>
                    <th scope="col" class="px-6 py-4 font-semibold">ID Admin</th>
                    <th scope="col" class="px-6 py-4 font-semibold">Nama</th>
                    <th scope="col" class="px-6 py-4 text-center font-semibold">Role</th>
                    <th scope="col" class="px-6 py-4 text-center font-semibold">Admin</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $admin)
                    <tr>
                        <td class="px-6 py-4">{{ $admin->id }}</td>
                        <td class="px-6 py-4">{{ $admin->nama }}</td>
                        <td class="px-6 py-4 text-center">{{ $admin->role == 1 ? 'Admin' : 'Reviewer' }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('admin.admins.show', ['id' => $admin->id]) }}" class="flex items-center text-nowrap text-black-600">
                                <span class="material-symbols-outlined mr-1 text-lg">visibility</span> Lihat
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
   </style>
@endsection
