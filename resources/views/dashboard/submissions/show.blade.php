@extends('layouts.dashboard')

@section('title', 'Detail Data Pengajuan')

@section('content')
<div class="max-w-6xl mx-auto my-10 p-6 bg-white shadow-lg rounded-xl font-manrope">
    <h1 class="text-3xl font-semibold mb-6 text-center">{{ $pengajuan->judul_pengajuan }}</h1>

    <div>
        <!-- Tabs -->
        <div class="border-b border-gray-200 relative">
            <ul class="flex justify-center space-x-10 text-center text-gray-500 relative text-xl" id="tabs">
                <li class="cursor-pointer pb-2 transition-all duration-300 hover:text-primary-900" data-target="deskripsi">DESKRIPSI</li>
                <li class="cursor-pointer pb-2 transition-all duration-300 hover:text-primary-900" data-target="kebutuhan">KEBUTUHAN APLIKASI</li>
                <li class="cursor-pointer pb-2 transition-all duration-300 hover:text-primary-900" data-target="detail">DETAIL APLIKASI</li>
                <li class="cursor-pointer pb-2 transition-all duration-300 hover:text-primary-900" data-target="referensi">REFERENSI</li>
            </ul>
            <!-- Blue underline animation -->
            <div id="underline" class="absolute bottom-0 left-0 h-0.5 bg-primary-900 transition-all duration-300"></div>
        </div>

        <!-- Tab Content -->
        <div id="tab-contents" class="mt-10">
            <!-- Deskripsi Tab Content -->
            <div id="deskripsi" class="tab-content transition-opacity duration-300 text-left">
                <div class="bg-gray-100 p-6 shadow-lg rounded-lg">
                    <h2 class="text-xl font-bold mb-6">Deskripsi Masalah</h2>
                    <p class="text-lg text-gray-600">{{ $pengajuan->deskripsi_masalah }}</p>
                    <h2 class="text-xl font-bold mb-6">Tujuan Aplikasi</h2>
                    <p class="text-lg text-gray-600">{{ $pengajuan->tujuan_aplikasi }}</p>
                </div>
            </div>

            <!-- Kebutuhan Aplikasi Tab Content -->
            <div id="kebutuhan" class="tab-content hidden transition-opacity duration-300 text-left">
                <div class="bg-gray-100 p-6 shadow-lg rounded-lg">
                    <h2 class="text-xl font-bold mb-6">Kebutuhan Aplikasi</h2>
                    <h3 class="text-lg font-semibold mb-2">Proses Bisnis:</h3>
                    <p class="text-lg text-gray-600">{{ $pengajuan->proses_bisnis }}</p>

                    <h3 class="text-lg font-semibold mt-4 mb-2">Aturan Bisnis:</h3>
                    <p class="text-lg text-gray-600">{{ $pengajuan->aturan_bisnis }}</p>
                </div>
            </div>

            <!-- Detail Aplikasi Tab Content -->
            <div id="detail" class="tab-content hidden transition-opacity duration-300 text-left">
                <div class="bg-gray-100 p-6 shadow-lg rounded-lg">
                    <h2 class="text-xl font-bold mb-6">Detail Aplikasi</h2>

                    <h3 class="text-lg font-semibold mt-4 mb-2">Stakeholder:</h3>
                    <p class="text-lg text-gray-600">{{ $pengajuan->stakeholder }}</p>

                    <h3 class="text-lg font-semibold mt-4 mb-2">Jenis Proyek:</h3>
                    <p class="text-lg text-gray-600">
                        {{ $pengajuan->jenis_proyek ? 'Proyek yang sudah ada' : 'Proyek Baru' }}
                    </p>
                    

                    <h3 class="text-lg font-semibold mt-4 mb-2">Platform:</h3>
                    <p class="text-lg text-gray-600">{{ $pengajuan->platform }}</p>
                </div>
            </div>

            <!-- Referensi Tab Content -->
            <div id="referensi" class="tab-content hidden transition-opacity duration-300 text-left">
                <div class="bg-gray-100 p-6 shadow-lg rounded-lg">
                    <h2 class="text-xl font-bold mb-6">Referensi</h2>
                    @foreach ($pengajuan->referensi as $ref)
                        <p class="text-lg text-gray-600">{{ $ref->keterangan }}</p>
                        @if($ref->tipe == 'image') 
                            <img src="{{ $ref->path }}" alt="Referensi Image"> 
                        @endif
                    @endforeach
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