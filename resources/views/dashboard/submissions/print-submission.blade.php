<?php
// import koneksi ke database
?>
<html>
<head>
  <title>Daftar Data Pengajuan</title>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
  
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
      background-color: #f4f4f4;
    }
    
    .container {
      width: 80%;
      margin: 0 auto;
      background-color: white;
      padding: 20px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      border-radius: 5px;
    }

    h2 {
      text-align: center;
      color: #333;
    }

    h4 {
      text-align: center;
      color: #777;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      padding: 12px;
      border: 1px solid #ddd;
      text-align: left;
    }

    th {
      background-color: #f8f8f8;
    }

    .data-tables {
      margin-top: 20px;
    }
  </style>
</head>

<body>
<div class="container">
  <h2>Daftar Data Pengajuan</h2>
  <div class="data-tables datatable-dark">
    
    <!-- Masukkan table-nya di sini, dimulai dari tag TABLE -->
    <table id="mauexport" class="w-full text-sm text-left text-black-700 border border-gray-400 border-collapse rounded-lg overflow-hidden shadow-lg">
        <thead class="text-lg text-nowrap text-black-900 bg-gray-50 border-b">
            <tr>
                <th scope="col" class="px-6 py-4 font-semibold">Judul Aplikasi</th>
                <th scope="col" class="px-5 py-4 font-semibold">Pengaju</th>
                <th scope="col" class="px-6 py-4 font-semibold">Tanggal Pengajuan</th>
                <th scope="col" class="px-6 py-4 font-semibold">Deskripsi Masalah</th>
                <th scope="col" class="px-6 py-4 font-semibold">Tujuan Aplikasi</th>
                <th scope="col" class="px-6 py-4 font-semibold">Platform</th>
                <th scope="col" class="px-6 py-4 text-center font-semibold">Status</th>
                <!--<th scope="col" class="px-6 py-4 text-center font-semibold">Aksi</th>-->
            </tr>
        </thead>

        <tbody>
            @forelse($data_pengajuans as $pengajuan)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $pengajuan->submission_title }}</td>
                    <td class="px-6 py-4">{{ $pengajuan->submitter->name ?? 'Tidak diketahui' }}</td>
                    <td class="px-6 py-4">
                        {{ $pengajuan->created_at ? $pengajuan->created_at->format('Y-m-d H:i:s') : 'Tanggal tidak tersedia' }}
                    </td>
                    <td class="px-6 py-4">{{ $pengajuan->problem_description ?? 'Tidak ada deskripsi' }}</td>
                    <td class="px-6 py-4">{{ $pengajuan->application_purpose ?? 'Tidak ada tujuan' }}</td>
                    <td class="px-6 py-4">{{ $pengajuan->platform ?? 'Tidak ada platform' }}</td>
                    <td class="px-6 py-4 text-center">
                        @if ($pengajuan->status == 'terverifikasi')
                            <span class="inline-block px-3 py-1 text-sm font-semibold text-white bg-green-500 rounded-full">Diverifikasi</span>
                        @elseif ($pengajuan->status == 'belum_direview')
                            <span class="inline-block min-w-40 px-3 py-1 text-sm font-semibold text-white bg-gray-400 rounded-full">Belum Diverifikasi</span>
                        @elseif ($pengajuan->status == 'ditolak')
                            <span class="inline-block min-w-40 px-3 py-1 text-sm font-semibold text-white bg-red-500 rounded-full">Ditolak</span>
                        @elseif ($pengajuan->status == 'diarsipkan')
                            <span class="inline-block min-w-40 px-3 py-1 text-sm font-semibold text-white bg-gray-300 rounded-full">Diarsipkan</span>
                        @else
                            <span class="inline-block px-3 py-1 text-sm font-semibold text-white bg-yellow-500 rounded-full">Status Tidak Diketahui</span>
                        @endif
                    </td>

                    @if (auth()->user()->role == 3)
                        <td class="px-6 py-4">
                            <a href="{{ route('dashboard.submissions.review.create', ['submission_code' => $pengajuan->submission_code]) }}"
                            class="flex items-center text-black-600 mx-auto">
                                <span class="inline-flex items-center px-4 py-1 text-sm font-semibold text-white bg-blue-500 rounded-full">
                                    <span class="material-symbols-outlined">
                                        rate_review
                                    </span>
                                    <span class="ml-1">Review</span>
                                </span>
                            </a>
                        </td>
                    @endif
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="px-6 py-4 text-center">Tidak ada pengajuan yang ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
  </div>
</div>
  
<!-- Load JavaScript in the correct order -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
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
</script

</body>
</html>