@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto my-10 p-6 bg-white shadow-lg rounded-xl font-manrope">
    <h1 class="text-3xl font-semibold mb-6 text-center">Aplikasi untuk HIMAKAPS Polban</h1>

    <div>
        <!-- Tabs -->
        <div class="border-b border-gray-200 relative">
            <ul class="flex justify-center space-x-10 text-center text-gray-500 relative text-xl" id="tabs">
                <li class="cursor-pointer pb-2 transition-all duration-300 hover:text-blue-500" data-target="deskripsi">DESKRIPSI</li>
                <li class="cursor-pointer pb-2 transition-all duration-300 hover:text-blue-500" data-target="kebutuhan">KEBUTUHAN APLIKASI</li>
                <li class="cursor-pointer pb-2 transition-all duration-300 hover:text-blue-500" data-target="detail">DETAIL APLIKASI</li>
                <li class="cursor-pointer pb-2 transition-all duration-300 hover:text-blue-500" data-target="referensi">REFERENSI</li>
            </ul>
            <!-- Blue underline animation -->
            <div id="underline" class="absolute bottom-0 left-0 h-0.5 bg-blue-500 transition-all duration-300"></div>
        </div>

        <!-- Tab Content -->
        <div id="tab-contents" class="mt-10">
            <!-- Deskripsi Tab Content -->
            <div id="deskripsi" class="tab-content transition-opacity duration-300 text-left">
                <div class="bg-gray-100 p-6 shadow-lg rounded-lg">
                    <h2 class="text-xl font-bold mb-6">Deskripsi</h2>
                    <p class="text-lg text-gray-600">Aplikasi ini dirancang untuk mendukung proses pemilihan Ketua Himpunan Mahasiswa Akuntansi Perbankan Syariah (HIMAKAPS) Politeknik Negeri Bandung (Polban). Aplikasi ini memungkinkan anggota HIMAKAPS untuk memilih kandidat ketua secara elektronik, memastikan proses yang lebih efisien, transparan, dan akuntabel.</p>
                </div>
            </div>

            <!-- Kebutuhan Aplikasi Tab Content -->
            <div id="kebutuhan" class="tab-content hidden transition-opacity duration-300 text-left">
                <div class="bg-gray-100 p-6 shadow-lg rounded-lg">
                    <h2 class="text-xl font-bold mb-6">Kebutuhan Aplikasi</h2>
                    <h3 class="text-lg font-semibold mb-2">Aksesibilitas Pengguna:</h3>
                    <p class="text-lg text-gray-600">Aplikasi harus mudah diakses oleh seluruh anggota HIMAKAPS. Dapat diakses melalui web atau aplikasi mobile.</p>

                    <h3 class="text-lg font-semibold mt-4 mb-2">Sistem Otentikasi:</h3>
                    <p class="text-lg text-gray-600">Sistem login yang aman untuk memastikan hanya anggota yang berhak dapat memberikan suara. Setiap anggota harus memiliki akun yang terkait dengan data mahasiswa.</p>

                    <h3 class="text-lg font-semibold mt-4 mb-2">Fitur Pemilihan:</h3>
                    <p class="text-lg text-gray-600">Tersedia daftar kandidat yang dapat dipilih. Proses pemilihan hanya bisa dilakukan satu kali oleh setiap pengguna.</p>

                    <h3 class="text-lg font-semibold mt-4 mb-2">Sistem Pemantauan Suara:</h3>
                    <p class="text-lg text-gray-600">Suara ditampilkan secara real-time tanpa memperlihatkan identitas pemilih untuk menjaga kerahasiaan. Rekapitulasi suara otomatis setelah periode pemilihan berakhir.</p>

                    <h3 class="text-lg font-semibold mt-4 mb-2">Notifikasi dan Pengumuman:</h3>
                    <p class="text-lg text-gray-600">Aplikasi harus bisa memberikan notifikasi kepada pengguna tentang jadwal pemilihan, update suara, dan pengumuman hasil.</p>

                    <h3 class="text-lg font-semibold mt-4 mb-2">Keamanan:</h3>
                    <p class="text-lg text-gray-600">Protokol keamanan yang kuat untuk melindungi data pemilih dan hasil pemilihan. Sistem enkripsi untuk melindungi data pribadi pengguna dan suara yang diberikan.</p>
                </div>
            </div>

            <!-- Detail Aplikasi Tab Content -->
            <div id="detail" class="tab-content hidden transition-opacity duration-300 text-left">
                <div class="bg-gray-100 p-6 shadow-lg rounded-lg">
                    <h2 class="text-xl font-bold mb-6">Detail Aplikasi</h2>
                    <h3 class="text-lg font-semibold mb-2">Teknologi yang Digunakan:</h3>
                    <p class="text-lg text-gray-600">Backend: Java atau Python untuk manajemen data dan logika aplikasi.</p>
                    <p class="text-lg text-gray-600">Database: MySQL atau PostgreSQL untuk menyimpan data pemilih, kandidat, dan hasil suara.</p>
                    <p class="text-lg text-gray-600">Frontend: React.js (untuk aplikasi web) atau Flutter (untuk aplikasi mobile) agar mudah digunakan oleh pengguna.</p>
                    <p class="text-lg text-gray-600">Autentikasi: Sistem login OAuth atau Firebase Authentication untuk keamanan.</p>

                    <h3 class="text-lg font-semibold mt-4 mb-2">Fitur Utama:</h3>
                    <p class="text-lg text-gray-600">Dashboard Pengguna: Menampilkan informasi pemilihan, status login, dan panduan memilih.</p>
                    <p class="text-lg text-gray-600">Halaman Kandidat: Profil kandidat lengkap dengan visi, misi, dan foto.</p>
                    <p class="text-lg text-gray-600">Fitur Pemilihan: Pemilih dapat memberikan suara dengan antarmuka yang sederhana.</p>
                    <p class="text-lg text-gray-600">Rekapitulasi Hasil Suara: Penghitungan otomatis dan real-time yang dapat diakses setelah pemilihan berakhir.</p>
                    <p class="text-lg text-gray-600">Laporan dan Statistik: Data pemilihan bisa diekspor ke Excel atau PDF untuk keperluan dokumentasi.</p>

                    <h3 class="text-lg font-semibold mt-4 mb-2">User Roles:</h3>
                    <p class="text-lg text-gray-600">Admin: Dapat mengelola data kandidat, mengontrol waktu pemilihan, dan memantau suara.</p>
                    <p class="text-lg text-gray-600">Pemilih: Mahasiswa HIMAKAPS yang berhak memberikan suara.</p>
                </div>
            </div>

            <!-- Referensi Tab Content -->
            <div id="referensi" class="tab-content hidden transition-opacity duration-300 text-left">
                <div class="bg-gray-100 p-6 shadow-lg rounded-lg">
                    <h2 class="text-xl font-bold mb-6">Referensi</h2>
                    <p class="text-lg text-gray-600">Sistem Pemilu Online: Sistem serupa dapat dilihat dari aplikasi pemilu di kampus atau organisasi mahasiswa lain yang sudah menggunakan e-voting.</p>
                    <p class="text-lg text-gray-600">Google Form untuk Voting: Sebagai referensi awal dalam hal kemudahan penggunaan, namun aplikasi ini perlu dikembangkan lebih lanjut untuk keamanan dan kompleksitas yang lebih tinggi.</p>
                    <p class="text-lg text-gray-600">Pemilu Umum Elektronik: Studi kasus dari pemilu elektronik di negara-negara yang telah mengadopsi sistem ini sebagai panduan untuk pengelolaan data pemilih dan hasil secara aman.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tabs = document.querySelectorAll('#tabs li');
        const contents = document.querySelectorAll('.tab-content');
        const underline = document.getElementById('underline');

        function setUnderlinePosition(target) {
            underline.style.left = target.offsetLeft + 'px';
            underline.style.width = target.offsetWidth + 'px';
        }

        tabs.forEach(tab => {
            tab.addEventListener('click', function () {
                // Remove active state from all tabs
                tabs.forEach(t => t.classList.remove('border-primary-500', 'text-primary-600'));
                contents.forEach(c => c.classList.add('hidden'));

                // Add active state to clicked tab
                this.classList.add('border-primary-500', 'text-primary-600');
                document.getElementById(this.getAttribute('data-target')).classList.remove('hidden');

                // Move underline
                setUnderlinePosition(this);
            });
        });

        // Set the first tab and content active by default
        tabs[0].classList.add('border-primary-500', 'text-primary-600');
        contents[0].classList.remove('hidden');
        setUnderlinePosition(tabs[0]);
    });
</script>
@endsection