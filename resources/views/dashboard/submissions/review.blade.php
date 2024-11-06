@extends('layouts.dashboard')

@section('title', 'Review Pengajuan')

@section('content')
<!-- Alert Container
<div id="alertMessage" class="fixed top-4 right-4 z-50 transform transition-transform duration-300 translate-x-full">
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
</div> -->

<!-- Form Content -->
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8">Form Review Pengajuan</h1>

    <form id="submissionForm" method="POST" action="{{ route('dashboard.submissions.review.store') }}" class="max-w-4xl mx-auto">
        @csrf
        <div class="bg-white rounded-xl overflow-hidden shadow-md w-full h-900 p-4">
            <h2 class="text-2xl font-semibold mb-4">Review Pengajuan</h2>
            <p class="font-sans text-gray-400 text-xxs">Isi form review pengajuan dengan detail dan lengkap</p>
            <hr class="border-gray-950 border-t-1 w-full mx-auto my-5">

            <div class="mb-4">
                <label for="kode_pengajuan" class="block mb-2">Judul Pengajuan</label>
                <select id="kode_pengajuan" name="kode_pengajuan" class="w-full border border-gray-300 rounded px-3 py-2" required>
                    <option value="">Pilih Judul Pengajuan</option>
                    @foreach($judul_pengajuan as $pengajuan)
                        <option value="{{ $pengajuan->kode_pengajuan }}">{{ $pengajuan->judul_pengajuan }}</option>
                    @endforeach
                </select>
            </div>

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
                    <!-- <option value="belum_diverifikasi">Belum Diverifikasi</option> -->
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

// Form validation
function validateForm() {
    const kodePengajuan = document.getElementById('kode_pengajuan');
    const deskripsiReview = document.getElementById('deskripsi_review');
    const status = document.getElementById('status');
    
    let isValid = true;
    
    if (!kodePengajuan.value) {
        kodePengajuan.classList.add('border-red-500');
        isValid = false;
    }
    
    if (!deskripsiReview.value.trim()) {
        deskripsiReview.classList.add('border-red-500');
        isValid = false;
    }
    
    if (!status.value) {
        status.classList.add('border-red-500');
        isValid = false;
    }
    
    return isValid;
}

// Remove error styling on input
document.querySelectorAll('select, textarea').forEach(element => {
    element.addEventListener('input', function() {
        this.classList.remove('border-red-500');
    });
});
</script>

<style>
.border-red-500 {
    border-color: #ef4444;
}
</style>
@endpush

@endsection