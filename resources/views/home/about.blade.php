@extends('layouts.app')

@section('title', 'Tentang Polaris')

@section('content')
<div class="container mx-auto px-16 mt-16">
    <!-- Apa itu Polaris -->
    <div class="container mx-auto px-16 mt-16 flex flex-col lg:flex-row items-center gap-8 lg:gap-16">
        <!-- Teks -->
        <div class="lg:w-3/4">
            <h1 class="text-4xl font-bold text-primary-900 mb-4">Apa itu POLARIS?</h1>
            <p class="text-lg text-dark-700 mb-6 leading-relaxed">
                POLARIS merupakan platform terpusat untuk mengelola dan mendokumentasikan pengajuan pembuatan aplikasi dari berbagai organisasi di lingkungan Politeknik Negeri Bandung (Polban).
            </p>
        </div>
        <!-- Gambar -->
        <div class="lg:w-1/4 items-left">
            <img src="{{ asset('images/about.png') }}" alt="Apa itu Polaris" class="w-full max-w-sm mx-auto lg:max-w-md">
        </div>
    </div>

    <!-- Our Mission -->
    <div class="container mx-auto px-16 mt-16 text-dark-700">
        <section class="mb-12">
            <h2 class="text-3xl font-semibold text-left mb-6 text-primary-900">Our Mission</h2>
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
    </div>            

    <!-- Our Team -->
    <div class="container mx-auto px-16 mt-16">
        <h2 class="text-3xl font-bold text-primary-900 mb-10">Our Team</h2>
        <div class="flex flex-wrap justify-between gap-5">
            <!-- Member -->
            @foreach ([
                ['name' => 'Alanna Tanisya', 'image' => 'profile_alanna.png', 'instagram' => 'https://www.instagram.com/alannatnsy/', 'linkedin' => 'https://www.linkedin.com/in/alanna-tanisya-b13056205/', 'youtube' => 'https://www.youtube.com/@01alannatanisyaanwar96'],
                ['name' => 'Erina Dwi Yanti', 'image' => 'profile_erina.png', 'instagram' => 'https://www.instagram.com/erinadwy_/', 'linkedin' => 'https://www.linkedin.com/in/erinadwy/', 'youtube' => 'https://www.youtube.com/@ERINADWIYANTI-jy7qt'],
                ['name' => 'Dhira Ramadini', 'image' => 'profile_dhira.png', 'instagram' => 'https://www.instagram.com/dirarmdn/ ', 'linkedin' => 'https://www.linkedin.com/in/dhiraramadini/', 'youtube' => 'https://www.youtube.com/@dirarmdn'],
                ['name' => 'Febi Shintawati', 'image' => 'profile_febi.png', 'instagram' => 'https://www.instagram.com/febi.shintawati1/', 'linkedin' => 'https://www.linkedin.com/in/febi-shintawati-b83a75340/', 'youtube' => 'https://youtube.com/@febishintaa?si=jS1uZ6SS1Cy0jIC2'],
                ['name' => 'Firgianathyas Siti', 'image' => 'profile_gia.png', 'instagram' => 'https://www.instagram.com/f_giaaa/', 'linkedin' => 'https://linkedin.com/in/gia', 'youtube' => 'https://youtube.com/gia']
            ] as $member)
            <div class="text-center w-40">
                <img src="{{ asset('images/' . $member['image']) }}" alt="{{ $member['name'] }}" class="w-32 h-32 rounded-full mx-auto mb-4">
                <h3 class="font-semibold text-lg text-primary-900">{{ $member['name'] }}</h3>
                <div class="flex justify-center mt-2 space-x-2">
                    @if (!empty($member['instagram']))
                        <a href="{{ $member['instagram'] }}" target="_blank" class="text-dark-500 hover:text-primary-500">
                            <img src="{{ asset('images/instagram.png') }}" alt="Instagram" class="w-6 h-6">
                        </a>
                    @endif
                    @if (!empty($member['linkedin']))
                        <a href="{{ $member['linkedin'] }}" target="_blank" class="text-dark-500 hover:text-primary-500">
                            <img src="{{ asset('images/linkedin.png') }}" alt="LinkedIn" class="w-6 h-6">
                        </a>
                    @endif
                    @if (!empty($member['youtube']))
                        <a href="{{ $member['youtube'] }}" target="_blank" class="text-dark-500 hover:text-primary-500">
                            <img src="{{ asset('images/youtube.png') }}" alt="YouTube" class="w-6 h-6">
                        </a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
