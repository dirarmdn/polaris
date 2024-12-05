@extends('layouts.app')

@section('title', 'Detail Data Pengajuan')

@section('content')
    <div class="max-w-6xl mx-auto my-10 p-6 bg-white shadow-lg rounded-xl font-manrope">
        <h1 class="text-3xl font-semibold mb-6 text-center">{{ $submission->submission_title }}</h1>

        <div>
            <!-- Tabs -->
            <div class="border-b border-gray-200 relative">
                <ul class="flex justify-center space-x-10 text-center text-gray-500 relative text-xl" id="tabs">
                    <li class="cursor-pointer pb-2 transition-all duration-300 hover:text-primary-900"
                        data-target="deskripsi">DESKRIPSI</li>
                    <li class="cursor-pointer pb-2 transition-all duration-300 hover:text-primary-900"
                        data-target="kebutuhan">KEBUTUHAN APLIKASI</li>
                    <li class="cursor-pointer pb-2 transition-all duration-300 hover:text-primary-900" data-target="detail">
                        DETAIL APLIKASI</li>
                    <li class="cursor-pointer pb-2 transition-all duration-300 hover:text-primary-900"
                        data-target="referensi">REFERENSI</li>
                    @if (auth()->user()->user_id == $submission->submitter->user_id)
                        <li class="cursor-pointer pb-2 transition-all duration-300 hover:text-primary-900"
                        data-target="hasil-review">HASIL REVIEW</li>
                    @endif
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
                        <p class="text-lg text-gray-600">{{ $submission->problem_description }}</p>
                        <h2 class="text-xl font-bold mb-6">Tujuan Aplikasi</h2>
                        <p class="text-lg text-gray-600">{{ $submission->application_purpose }}</p>
                    </div>
                </div>

                <!-- Kebutuhan Aplikasi Tab Content -->
                <div id="kebutuhan" class="tab-content hidden transition-opacity duration-300 text-left">
                    <div class="bg-gray-100 p-6 shadow-lg rounded-lg">
                        <h2 class="text-xl font-bold mb-6">Kebutuhan Aplikasi</h2>
                        <h3 class="text-lg font-semibold mb-2">Proses Bisnis:</h3>
                        <p class="text-lg text-gray-600">{{ $submission->business_process }}</p>

                        <h3 class="text-lg font-semibold mt-4 mb-2">Aturan Bisnis:</h3>
                        <p class="text-lg text-gray-600">{{ $submission->business_rules }}</p>
                    </div>
                </div>

                <!-- Detail Aplikasi Tab Content -->
                <div id="detail" class="tab-content hidden transition-opacity duration-300 text-left">
                    <div class="bg-gray-100 p-6 shadow-lg rounded-lg">
                        <h2 class="text-xl font-bold mb-6">Detail Aplikasi</h2>

                        <h3 class="text-lg font-semibold mt-4 mb-2">Stakeholder:</h3>
                        <p class="text-lg text-gray-600">{{ $submission->stakeholders }}</p>

                        <h3 class="text-lg font-semibold mt-4 mb-2">Jenis Proyek:</h3>
                        <p class="text-lg text-gray-600">
                            {{ $submission->project_type ? 'Proyek yang sudah ada' : 'Proyek Baru' }}
                        </p>

                        <h3 class="text-lg font-semibold mt-4 mb-2">Platform:</h3>
                        <p class="text-lg text-gray-600">{{ $submission->platform }}</p>
                    </div>
                </div>

                <!-- Referensi Tab Content -->
                <div id="referensi" class="tab-content hidden transition-opacity duration-300 text-left">
                    <div class="bg-gray-100 p-6 shadow-lg rounded-lg">
                        <h2 class="text-xl font-bold mb-6">Referensi</h2>
                        @foreach ($submission->reference as $ref)
                            <p class="text-lg text-gray-600 mb-2">{{ $ref->description }}</p>
                            @if ($ref->type == 'file')
                                @php
                                    $filePath = storage_path('app/public/' . $ref->path);
                                    $fileExtension = pathinfo($ref->path, PATHINFO_EXTENSION);
                                @endphp
                                @if (in_array(strtolower($fileExtension), ['jpg', 'jpeg', 'png', 'gif']))
                                    <img src="{{ asset('storage/' . $ref->path) }}" alt="Referensi Image" class="mb-2"
                                        style="width: 100%; max-width: 300px;">
                                @elseif (strtolower($fileExtension) == 'pdf')
                                    <embed src="{{ asset('storage/' . $ref->path) }}" type="application/pdf" class="mb-2"
                                        width="100%" height="600px">
                                @endif
                            @else
                                <a href="{{ $ref->path }}" class="text-lg text-gray-600 mb-2">{{ $ref->path }}</a>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- Hasil Review Tab Content -->
                <div id="hasil-review" class="tab-content transition-opacity duration-300 text-left">
                    <div class="bg-gray-100 p-6 shadow-lg rounded-lg">
                        <h2 class="text-xl font-bold mb-6">Deskripsi Review</h2>
                        <p class="text-lg text-gray-600">{{ $submission->review_description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('#tabs li');
            const contents = document.querySelectorAll('.tab-content');
            const underline = document.getElementById('underline');

            function setUnderlinePosition(target) {
                underline.style.left = target.offsetLeft + 'px';
                underline.style.width = target.offsetWidth + 'px';
            }

            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    // Remove active state from all tabs
                    tabs.forEach(t => t.classList.remove('border-primary-500', 'text-primary-600'));
                    contents.forEach(c => c.classList.add('hidden'));

                    // Add active state to clicked tab
                    this.classList.add('border-primary-500', 'text-primary-600');
                    document.getElementById(this.getAttribute('data-target')).classList.remove(
                        'hidden');

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
