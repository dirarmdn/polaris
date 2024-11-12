@extends('layouts.dashboard')

@section('title', 'Review Pengajuan')

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

<!-- Alert Container - Hidden by default -->
<div id="alertMessage" class="fixed top-4 right-4 z-50 transform transition-transform duration-300 translate-x-full">
    <!-- Success Message -->
    <div id="successAlert" class="hidden bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative w-80" role="alert">
        <strong class="font-bold">Berhasil!</strong>
        <span id="successText" class="block sm:inline"></span>
        <button onclick="closeAlert('successAlert')" class="absolute top-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <title>Close</title>
                <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
            </svg>
        </button>
    </div>
    
    <div id="errorAlert" class="hidden bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative w-80" role="alert">
        <strong class="font-bold">Error!</strong>
        <span id="errorText" class="block sm:inline"></span>
        <button onclick="closeAlert('errorAlert')" class="absolute top-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <title>Close</title>
                <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
            </svg>
        </button>
    </div>
</div>

<!-- Loading Spinner -->
<div id="loadingSpinner" class="hidden fixed top-0 left-0 w-full h-full bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
    <div class="animate-spin rounded-full h-16 w-16 border-t-2 border-b-2 border-accent-light-500"></div>
</div>

<!-- Confirmation Modal -->
<div id="confirmModal" class="hidden fixed top-0 left-0 w-full h-full bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg p-6 w-96">
        <h3 class="text-lg font-bold mb-4">Konfirmasi</h3>
        <p class="mb-4">Apakah Anda yakin ingin menyimpan review ini?</p>
        <div class="flex justify-end space-x-4">
            <button onclick="closeConfirmModal()" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                Batal
            </button>
            <button onclick="submitForm()" class="px-4 py-2 bg-accent-light-500 text-white rounded hover:bg-accent-light-600">
                Ya, Simpan
            </button>
        </div>
    </div>
</div>

<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8">Form Review Pengajuan</h1>

    <form id="submissionForm" method="POST" action="{{ route('dashboard.submissions.review.store') }}" class="max-w-4xl mx-auto">
        @csrf
        @if($errors->any())
            <div class="bg-red-500 text-white p-4 mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <input type="text" class="hidden" name="kode_pengajuan" value="{{ $pengajuan->kode_pengajuan }}" id="">
        <div class="bg-white rounded-xl overflow-hidden shadow-md w-full h-900 p-4">
            <h2 class="text-2xl font-semibold mb-4">Review Pengajuan</h2>
            <p class="font-sans text-gray-400 text-xxs">Isi form review pengajuan dengan detail dan lengkap</p>
            <hr class="border-gray-950 border-t-1 w-full mx-auto my-5">

            <div class="mb-4">
                <label for="deskripsi_review" class="block mb-2">Review Pengajuan</label>
                <textarea id="deskripsi_review" name="deskripsi_review" rows="4" class="w-full border border-gray-300 rounded px-3 py-2" required></textarea>
            </div>

            <div class="mb-4">
                <label for="status" class="block mb-2">Status</label>
                <select id="status" name="status" class="w-full border border-gray-300 rounded px-3 py-2" required>
                    <option value="">Pilih Status</option>
                    <option value="ditolak">Ditolak</option>
                    <option value="terverifikasi">Terverifikasi</option>
                    <option value="belum_diverifikasi">Belum Diverifikasi</option>
                </select>
            </div>
        </div>

        <div class="flex justify-between mt-8">
            <button type="submit" class="bg-accent-light-500 text-white px-4 py-2 rounded hover:bg-accent-light-600">
                Submit
            </button>
        </div>
    </form>
</div>

@push('scripts')
<script>
// document.addEventListener('DOMContentLoaded', function() {
//     const form = document.getElementById('submissionForm');
    
//     form.addEventListener('submit', function(e) {
//         e.preventDefault();
        
//         // Get form data
//         const formData = new FormData(form);
        
//         // Send AJAX request
//         fetch(form.action, {
//             method: 'POST',
//             body: formData,
//             headers: {
//                 'X-CSRF-TOKEN': '{{ csrf_token() }}'
//             }
//         })
//         .then(response => response.json())
//         .then(data => {
//             if (data.success) {
//                 showAlert('success', data.message);
//                 form.reset();
//             } else {
//                 const errorMessages = data.errors
//                     ? Object.values(data.errors).flat().join(', ')
//                     : data.message || 'Terjadi kesalahan';
//                 showAlert('error', errorMessages);
//             }
//         })
//     });
// });

// Alert functions
function showAlert(type, message) {
    const alertContainer = document.getElementById('alertMessage');
    const successAlert = document.getElementById('successAlert');
    const errorAlert = document.getElementById('errorAlert');
    const successText = document.getElementById('successText');
    const errorText = document.getElementById('errorText');

    // Hide both alerts
    successAlert.classList.add('hidden');
    errorAlert.classList.add('hidden');

    // Show appropriate alert
    if (type === 'success') {
        successText.textContent = message;
        successAlert.classList.remove('hidden');
    } else {
        errorText.textContent = message;
        errorAlert.classList.remove('hidden');
    }

    // Show container
    alertContainer.classList.remove('translate-x-full');

    // Auto hide success message
    if (type === 'success') {
        setTimeout(() => {
            closeAlert(type + 'Alert');
        }, 3000);
    }
}

function closeAlert(alertId) {
    const alert = document.getElementById(alertId);
    const container = document.getElementById('alertMessage');
    container.classList.add('translate-x-full');
    setTimeout(() => {
        alert.classList.add('hidden');
    }, 300);
}

// Show/hide loading spinner
function toggleLoading(show) {
    const spinner = document.getElementById('loadingSpinner');
    spinner.classList.toggle('hidden', !show);
}

// Show confirmation modal
function showConfirmModal() {
    document.getElementById('confirmModal').classList.remove('hidden');
}

// Close confirmation modal
function closeConfirmModal() {
    document.getElementById('confirmModal').classList.add('hidden');
}

// Submit form
function submitForm() {
    closeConfirmModal();
    toggleLoading(true);
    
    const form = document.getElementById('submissionForm');
    
    // Submit form using fetch
    fetch(form.action, {
        method: 'POST',
        body: new FormData(form),
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(response => response.json())
    .then(data => {
        toggleLoading(false);
        if (data.success) {
            showAlert('success', data.message);
            form.reset();
        } else {
            showAlert('error', data.message || 'Terjadi kesalahan');
        }
    })
    .catch(error => {
        toggleLoading(false);
        showAlert('error', 'Terjadi kesalahan saat menyimpan data');
    });
}

// Show alerts from session if any
@if(session('success'))
    showAlert('success', "{{ session('success') }}");
@endif

@if(session('error'))
    showAlert('error', "{{ session('error') }}");
@endif

// function validateForm() {
//     // Get all form elements
//     const kodePengajuan = document.getElementById('kode_pengajuan');
//     const deskripsiReview = document.getElementById('deskripsi_review');
//     const status = document.getElementById('status');
    
    // Reset any existing error styles
    resetErrorStyles();
    
    let isValid = true;
    const errors = [];

//     // Validate kode_pengajuan
//     if (!kodePengajuan.value || kodePengajuan.value === "") {
//         isValid = false;
//         errors.push("Silakan pilih judul pengajuan");
//         addErrorStyle(kodePengajuan);
//     }

    // Validate deskripsi_review
    if (!deskripsiReview.value.trim()) {
        isValid = false;
        errors.push("Review pengajuan tidak boleh kosong");
        addErrorStyle(deskripsiReview);
    }

    // Validate status
    if (!status.value || status.value === "") {
        isValid = false;
        errors.push("Silakan pilih status");
        addErrorStyle(status);
    }

    // Show error message if validation fails
    if (!isValid) {
        showAlert('error', errors.join('\n'));
        return false;
    }

    return true;
}

// Add error style to invalid fields
function addErrorStyle(element) {
    element.classList.add('border-red-500');
    element.classList.add('bg-red-50');
}

// Reset error styles
function resetErrorStyles() {
    const elements = [
        document.getElementById('kode_pengajuan'),
        document.getElementById('deskripsi_review'),
        document.getElementById('status')
    ];

    elements.forEach(element => {
        element.classList.remove('border-red-500', 'bg-red-50');
    });
}

// Update the showConfirmModal function to include validation
function showConfirmModal() {
    if (validateForm()) {
        document.getElementById('confirmModal').classList.remove('hidden');
    }
}

// Add input event listeners to remove error styling when user starts typing/selecting
document.addEventListener('DOMContentLoaded', function() {
    const elements = [
        document.getElementById('kode_pengajuan'),
        document.getElementById('deskripsi_review'),
        document.getElementById('status')
    ];

    elements.forEach(element => {
        element.addEventListener('input', function() {
            this.classList.remove('border-red-500', 'bg-red-50');
        });
        element.addEventListener('change', function() {
            this.classList.remove('border-red-500', 'bg-red-50');
        });
    });
});
</script>


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

<style>
.border-red-500 {
    border-color: #ef4444;
}
</style>
@endpush

@endsection