@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8">Form Pengajuan</h1>

    <form id="submissionForm" action="{{ route('pengajuan.store') }}" method="POST" enctype="multipart/form-data" class="max-w-4xl mx-auto">
        @csrf

        <!-- Stepper -->
        <div class="flex justify-between mb-8">
            @foreach(range(1, 5) as $step)
                <button type="button" class="stepper-step w-1/5 text-center py-2 border-b-4 transition-colors duration-300 {{ $step == 1 ? 'border-blue-500 text-blue-500' : 'border-gray-300 text-gray-500' }}" data-step="{{ $step }}" {{ $step == 1 ? '' : 'disabled' }}>
                    Step {{ $step }}
                </button>
            @endforeach
        </div>

        <!-- Step 1: Data Pengaju -->
        <div class="step-content" data-step="1">
            <h2 class="text-2xl font-semibold mb-4">Data Pengaju</h2>
            <div class="mb-4">
                <label for="nama_pengaju" class="block mb-2">Nama Lengkap</label>
                <input type="text" id="nama_pengaju" name="nama_pengaju" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label for="email_pengaju" class="block mb-2">Email</label>
                <input type="email" id="email_pengaju" name="email_pengaju" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label for="no_telp" class="block mb-2">No Telepon</label>
                <input type="tel" id="no_telp" name="no_telp" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label for="jabatan" class="block mb-2">Jabatan</label>
                <input type="text" id="jabatan" name="jabatan" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label for="kode_organisasi" class="block mb-2">Kode Organisasi</label>
                <input type="text" id="kode_organisasi" name="kode_organisasi" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>
        </div>

        <!-- Step 2: Deskripsi -->
        <div class="step-content hidden" data-step="2">
            <h2 class="text-2xl font-semibold mb-4">Deskripsi Pengajuan</h2>
            <div class="mb-4">
                <label for="judul_pengajuan" class="block mb-2">Judul Pengajuan</label>
                <input type="text" id="judul_pengajuan" name="judul_pengajuan" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label for="deskripsi_masalah" class="block mb-2">Deskripsi Masalah</label>
                <textarea id="deskripsi_masalah" name="deskripsi_masalah" rows="4" class="w-full border border-gray-300 rounded px-3 py-2" required></textarea>
            </div>
            <div class="mb-4">
                <label for="tujuan_aplikasi" class="block mb-2">Tujuan Aplikasi</label>
                <textarea id="tujuan_aplikasi" name="tujuan_aplikasi" rows="4" class="w-full border border-gray-300 rounded px-3 py-2" required></textarea>
            </div>
        </div>

        <!-- Step 3: Kebutuhan Aplikasi -->
        <div class="step-content hidden" data-step="3">
            <h2 class="text-2xl font-semibold mb-4">Kebutuhan Aplikasi</h2>
            <div class="mb-4">
                <label for="proses_bisnis" class="block mb-2">Proses Bisnis</label>
                <textarea id="proses_bisnis" name="proses_bisnis" rows="4" class="w-full border border-gray-300 rounded px-3 py-2" required></textarea>
            </div>
            <div class="mb-4">
                <label for="aturan_bisnis" class="block mb-2">Aturan Bisnis</label>
                <textarea id="aturan_bisnis" name="aturan_bisnis" rows="4" class="w-full border border-gray-300 rounded px-3 py-2" required></textarea>
            </div>
        </div>

        <!-- Step 4: Detail Aplikasi -->
        <div class="step-content hidden" data-step="4">
            <h2 class="text-2xl font-semibold mb-4">Detail Aplikasi</h2>
            <div class="mb-4">
                <label for="stakeholder" class="block mb-2">Stakeholder</label>
                <textarea id="stakeholder" name="stakeholder" rows="4" class="w-full border border-gray-300 rounded px-3 py-2" required></textarea>
            </div>
            <div class="mb-4">
                <label for="platform" class="block mb-2">Platform</label>
                <select id="platform" name="platform" class="w-full border border-gray-300 rounded px-3 py-2" required>
                    <option value="">Select Platform</option>
                    <option value="web">Web</option>
                    <option value="mobile">Mobile</option>
                    <option value="desktop">Desktop</option>
                    <option value="multiplatform">Multiplatform</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block mb-2">Jenis Proyek</label>
                <div class="flex items-center space-x-4">
                    <label class="inline-flex items-center">
                        <input type="radio" name="jenis_proyek" value="Aplikasi Baru" class="form-radio" required>
                        <span class="ml-2">Aplikasi Baru</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="jenis_proyek" value="Aplikasi Sudah Ada" class="form-radio" required>
                        <span class="ml-2">Aplikasi Sudah Ada</span>
                    </label>
                </div>
            </div>
        </div>

        <!-- Step 5: Konfirmasi -->
        <div class="step-content hidden" data-step="5">
            <h2 class="text-2xl font-semibold mb-4">Konfirmasi Pengajuan</h2>
            <p>Silakan periksa kembali data yang telah Anda masukkan sebelum mengirim pengajuan.</p>
            <div id="summary" class="mt-4">
                <!-- Summary will be populated dynamically -->
            </div>
        </div>

        <div class="flex justify-between mt-8">
            <button type="button" id="prevBtn" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hidden">Previous</button>
            <button type="button" id="nextBtn" class="bg-blue-500 text-white px-4 py-2 rounded">Next</button>
            <button type="submit" id="submitBtn" class="bg-green-500 text-white px-4 py-2 rounded hidden">Submit</button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    // ... (previous JavaScript code remains the same) ...

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        if (validateStep(5)) {
            // Here you would typically send the form data to the server
            this.submit();
        } else {
            alert('Please fill in all required fields.');
        }
    });

    function updateSummary() {
        const summary = document.getElementById('summary');
        summary.innerHTML = ''; // Clear previous content

        const fields = [
            'nama_pengaju', 'email_pengaju', 'no_telp', 'jabatan', 'kode_organisasi',
            'judul_pengajuan', 'deskripsi_masalah', 'tujuan_aplikasi',
            'proses_bisnis', 'aturan_bisnis',
            'stakeholder', 'platform'
        ];

        fields.forEach(field => {
            const element = document.getElementById(field);
            if (element) {
                const value = element.value;
                if (value) {
                    const fieldName = element.previousElementSibling.textContent;
                    summary.innerHTML += `<p><strong>${fieldName}</strong>: ${value}</p>`;
                }
            }
        });

        // Add Jenis Proyek to summary
        const jenisProyek = document.querySelector('input[name="jenis_proyek"]:checked');
        if (jenisProyek) {
            summary.innerHTML += `<p><strong>Jenis Proyek</strong>: ${jenisProyek.value}</p>`;
        }
    }

    // Call updateSummary when entering Step 5
    stepperSteps[4].addEventListener('click', updateSummary);
    nextBtn.addEventListener('click', function() {
        if (currentStep === 4 && validateStep(4)) {
            updateSummary();
        }
    });

    // Initialize the form
    updateStep(currentStep);
</script>
@endpush