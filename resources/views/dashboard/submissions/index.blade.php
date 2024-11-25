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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
@endpush

@section('content')
    <!-- Header -->
    <div class="container mx-auto pl-32 pt-10">
        <!-- Title -->
        <h1 class="text-2xl font-bold mb-6">
            <span class="text-black">Data</span>
            <span class="text-[#ff7600]">Pengajuan</span>
        </h1>
    </div>

    <!-- Table -->
    <div class="table-container datatable-dark data-tables mx-auto" style="max-width: 1300px; padding: 1rem;">
        <table id="mauexport"
            class="w-full text-sm text-left text-black-700 border border-gray-400 border-collapse rounded-xl overflow-hidden shadow-lg">
            <thead class="text-md text-nowrap text-black-900 bg-gray-50 border-b">
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
            <tbody class="text-md">
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
        $('#mauexport').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>
@endpush