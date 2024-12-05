@extends('layouts.dashboard')

@section('title', 'Data Mitra')

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
            padding: 15px!important;
            border-bottom: 2px solid #ffffff6f!important;
        }
        
        table {
            border-color: #ffffffc7!important;
        }

        .dataTables_length { 
            margin-bottom: 10px!important;
        }

        .dataTables_length select {
            border-radius: 10px;
        }

        .dataTables_filter input {
            border-radius: 10px;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
@endpush

@section('content')
    <h1 class="text-2xl font-bold mb-6 pl-32 pt-10">
        Data
        <span class="text-accent-600">Mitra</span>
    </h1>

    <!-- Table -->
    <div class="table-container datatable-dark data-tables mx-auto" style="max-width: 1300px; padding: 1rem;">
        <table id="mitra-table"
            class="w-full text-sm text-left text-black-700 border border-gray-400 border-collapse rounded-xl overflow-hidden shadow-lg">
            <thead class="text-md text-nowrap text-black-900 bg-gray-50 border-b">
                <tr>
                    <th scope="col" class="px-6 py-4 font-semibold">Nama Mitra</th>
                    <th scope="col" class="px-5 py-4 font-semibold">Bidang Usaha</th>
                    <th scope="col" class="px-5 py-4 font-semibold">Website</th>
                    <th scope="col" class="px-6 py-4 font-semibold">Dibuat</th>
                    <th scope="col" class="px-6 py-4 text-center font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-md">
                @forelse($organization as $o)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $o->organization_name }}</td>
                        <td class="px-6 py-4">{{ $o->business_field }}</td>
                        <td class="px-6 py-4">{{ $o->website }}</td>
                        <td class="px-6 py-4">{{ $o->created_at }}</td>
                        <td class="px-6 py-4 flex items-center justify-center gap-2">
                            <a href="{{ route('organization.show', ['organization' => $o]) }}"
                                class="flex items-center text-nowrap text-black-600 text-secondary-800">
                                <span class="material-symbols-outlined mr-1 text-lg">visibility</span>
                            </a>
                            <a href="{{ route('organization.edit', ['organization' => $o]) }}"
                                class="flex items-center text-nowrap text-black-600 text-accent-light-500">
                                <span class="material-symbols-outlined mr-1 text-lg">edit</span>
                            </a>
                            <form method="POST"
                                action="{{ route('organization.destroy', ['organization' => $o]) }}"
                                class="flex items-center text-nowrap text-black-600 text-red-500">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <span class="material-symbols-outlined mr-1 text-lg">delete</span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center">Tidak ada pengajuan yang ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection


@push('scripts')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#mitra-table').DataTable();
        });
    </script>
@endpush
