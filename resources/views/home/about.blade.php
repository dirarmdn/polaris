@extends('layouts.app')

@section('title', 'Tentang Polaris')

@section('content')
    <div class="w-screen">
        <div class="w-full h-[500px] flex flex-col items-center justify-center text-center text-white bg-cover bg-center"
            style="background-image: url('{{ asset('images/SignUp_BG.png') }}');">
            <h1 class="text-5xl font-bold text-white mb-8">ABOUT US</h1>
            <p class="text-lg max-w-2xl mt-4 mx-auto text-white">
                POLARIS merupakan platform terpusat untuk mengelola dan mendokumentasikan pengajuan pembuatan aplikasi dari
                berbagai organisasi di lingkungan Politeknik Negeri Bandung (Polban).
            </p>
        </div>

        <div class="w-full bg-primary-900 py-12">
            <div class="container mx-auto px-6 text-white">
                <section class="mb-12">
                    <h2 class="text-3xl font-semibold text-left mb-6 text-accent-600">Our Mission</h2>
                    <div class="grid md:grid-cols-2 gap-8 mx-4 text-left leading-relaxed">
                        <p>
                            Misi Polaris adalah menyederhanakan dan mempercepat proses pengajuan kebutuhan aplikasi internal
                            di lingkungan kampus. Polaris bertujuan menyediakan platform terpusat yang memudahkan pengajuan
                            dan pendataan kebutuhan aplikasi dari seluruh civitas akademika, serta memfasilitasi komunikasi
                            yang efektif antara pengaju dan pengembang. Setiap kebutuhan aplikasi dapat ditangani secara
                            tepat dan efisien dengan transparansi yang ditingkatkan melalui akses real-time untuk memantau
                            status pengajuan.
                        </p>
                        <p>
                            Polaris juga mendorong kolaborasi antara pengaju dan pengembang agar solusi teknologi dapat
                            diterapkan lebih cepat dan sesuai dengan kebutuhan. Dengan demikian, Polaris menjadi jembatan
                            yang menghubungkan kebutuhan teknologi kampus dengan solusi yang tepat, memperkuat inovasi dan
                            produktivitas di lingkungan akademis.
                        </p>
                    </div>
                </section>

                <section>
                    <h2 class="text-3xl font-semibold text-left mb-6 text-accent-600">Our Team</h2>
                    <div class="grid md:grid-cols-3 lg:grid-cols-5 gap-x-12 gap-y-8 mx-4">
                        @foreach ([
            ['name' => 'Alanna Tanisya Anwar', 'description' => 'Mahasiswa Teknik Informatika semester 3 yang tengah menjalani Proyek 3. Bertanggung jawab dalam pengembangan backend, termasuk pengelolaan database dan logika aplikasi. Berfokus pada integrasi fitur yang memudahkan pengelolaan data pengajuan.'],
            ['name' => 'Erina Dwi Yanti', 'description' => 'Mahasiswa Teknik Informatika semester 3 yang berperan sebagai pengembang frontend. Mengelola tampilan dan antarmuka pengguna Polaris, memastikan pengalaman pengguna yang intuitif dan responsif di platform web.'],
            ['name' => 'Dhira Ramadini', 'description' => 'Mahasiswa Teknik Informatika semester 3 dengan tanggung jawab pada aspek sistem keamanan dan validasi data. Mengimplementasikan mekanisme otentikasi dan perlindungan data pengguna di aplikasi.'],
            ['name' => 'Febi Shintawati', 'description' => 'Mahasiswa Teknik Informatika semester 3 yang berfokus pada integrasi fitur notifikasi dan status pengajuan. Menyediakan solusi untuk memudahkan pengguna dalam memantau perkembangan pengajuan mereka melalui email.'],
            ['name' => 'Firgianathyas Siti', 'description' => 'Mahasiswa Teknik Informatika semester 3 dengan peran sebagai pengembang dokumentasi dan testing. Memastikan setiap fitur Polaris berjalan dengan baik dan terdokumentasi dengan jelas agar mudah dipahami oleh pengguna dan pengembang lainnya.'],
        ] as $member)
                            <div class="text-left p-4 bg-primary-900">
                                <div class="w-24 h-24 mx-auto bg-gray-300 rounded-full mb-4"></div>
                                <h3 class="font-semibold text-lg text-accent-600 mb-2">{{ $member['name'] }}</h3>
                                <p class="text-sm mt-2 leading-relaxed">{{ $member['description'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
