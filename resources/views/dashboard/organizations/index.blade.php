@extends('layouts.dashboard')

@section('title', 'Data Mitra')

@section('content')
<div class="mx-auto container px-20">
    <h1 class="text-3xl font-bold header-title mb-5">
        Data
        <span class="text-accent-light-500">Mitra</span>
    </h1>
    <table id="mitra-table">
        <thead>
            <tr>
                <th>
                    <span class="flex items-center">
                        Nama
                    </span>
                </th>
                <th>
                    <span class="flex items-center">
                        Bidang Usaha
                    </span>
                </th>
                <th>
                    <span class="flex items-center">
                        Website
                    </span>
                </th>
                <th>
                    <span class="flex items-center">
                        Dibuat pada
                    </span>
                </th>
                <th>
                    <span class="flex items-center">
                        Aksi
                    </span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($organization as $o)
            <tr>
                <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $o->organization_name }}</td>
                <td>{{ $o->business_field }}</td>
                <td>{{ $o->website }}</td>
                <td>{{ \Carbon\Carbon::parse($o->created_at)->translatedFormat('d F Y') }}</td>
                <td class="px-6 py-4">
                    <a href="{{ route('organization.show', ['organization' => $o]) }}"
                        class="flex items-center text-nowrap text-black-600">
                        <span class="material-symbols-outlined mr-1 text-lg">visibility</span> Lihat Detail
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

