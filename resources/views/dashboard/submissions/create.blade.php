@extends('layouts.dashboard')

@section('title', 'Tambah Data Pengajuan')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8">Form Pengajuan</h1>

    <form id="submissionForm" action="{{ route('dashboard.submissions.store') }}" method="POST" enctype="multipart/form-data" class="max-w-4xl mx-auto">
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
    
        <div class="relative mb-8 max-w-4xl mx-auto">
            <!-- Background Line -->
            <div class="absolute top-1/2 left-1/2 w-3/4 h-1 bg-gray-300 transform -translate-x-1/2 -translate-y-1/2 rounded-full z-20"></div>

            <!-- Progress Line -->
            <div id="stepperProgress" class="absolute top-1/2 left-1/2 w-3/4 h-1 bg-blue-500 transform -translate-x-1/2 -translate-y-1/2 rounded-full z-20" style="width: 0%;"></div>


            <!-- Stepper -->
            <div class="relative flex justify-between items-center space-x-8 bg-primary-900 rounded-xl px-20 py-7">
                @foreach(range(1, 4) as $step)
                    <div class="stepper-step flex flex-col items-center" data-step="{{ $step }}">
                        <!-- Label Stepper -->
                        <div class="stepper-label text-sm text-white font-medium transition-all duration-300 ease-in-out">
                            @switch($step)
                                @case(1)<span class="text-xl font-bold">01</span> Deskripsi @break
                                @case(2)<span class="text-xl font-bold">02</span> Kebutuhan Aplikasi @break
                                @case(3)<span class="text-xl font-bold">03</span> Detail Aplikasi @break
                                @case(4)<span class="text-xl font-bold">04</span> Referensi @break
                            @endswitch
                        </div>
                        <!-- Lingkaran Stepper -->
                        <div class="stepper-circle w-12 h-12 rounded-full border-4 border-gray-300 flex items-center justify-center text-gray-600 font-bold text-xl mb-2 transition-all duration-300 ease-in-out z-30">
                            {{ $step }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
       
        <!-- Step 1: Deskripsi -->
        <div class="bg-white rounded-xl overflow-hidden shadow-md w-full h-900 p-4 step-content hidden" data-step="1">
            <h2 class="text-2xl font-semibold mb-4 my-5">Deskripsi Pengajuan</h2>
            <p class="font-sans text-gray-400 text-xxs my-0">Isi form deskripsi pengajuan sesuai dengan apa yang diinginkan secara detail</p>
            <hr class="border-gray-950 border-t-1 w-full mx-auto my-5">
            <div class="mb-4">
                <label for="judul_pengajuan" class="block mb-2">Judul Pengajuan</label>
                <input type="text" id="judul_pengajuan" name="judul_pengajuan" class="w-full border border-gray-300 rounded px-3 py-2">
            </div>
            <div class="mb-4">
                <label for="deskripsi_masalah" class="block mb-2">Deskripsi Masalah</label>
                <textarea id="deskripsi_masalah" name="deskripsi_masalah" rows="4" class="w-full border border-gray-300 rounded px-3 py-2"></textarea>
            </div>
            <div class="mb-4">
                <label for="tujuan_aplikasi" class="block mb-2">Tujuan Aplikasi</label>
                <textarea id="tujuan_aplikasi" name="tujuan_aplikasi" rows="4" class="w-full border border-gray-300 rounded px-3 py-2"></textarea>
            </div>
        </div>

        <!-- Step 2: Kebutuhan Aplikasi -->
        <div class="bg-white rounded-xl overflow-hidden shadow-md w-full h-900 p-4 step-content hidden" data-step="2">
            <h2 class="text-2xl font-semibold mb-4 my-5">Kebutuhan Aplikasi</h2>
            <p class="font-sans text-gray-400 text-xxs my-0">Isi form kebutuhan aplikasi sesuai dengan apa yang diinginkan secara detail</p>
            <hr class="border-gray-950 border-t-1 w-full mx-auto my-5">
            <div class="mb-4">
                <label for="proses_bisnis" class="block mb-2">Proses Bisnis</label>
                <textarea id="proses_bisnis" name="proses_bisnis" rows="4" class="w-full border border-gray-300 rounded px-3 py-2"></textarea>
            </div>
            <div class="mb-4">
                <label for="aturan_bisnis" class="block mb-2">Aturan Bisnis</label>
                <textarea id="aturan_bisnis" name="aturan_bisnis" rows="4" class="w-full border border-gray-300 rounded px-3 py-2"></textarea>
            </div>
        </div>

        <!-- Step 3: Detail Aplikasi -->
        <div class="bg-white rounded-xl overflow-hidden shadow-md w-full h-900 p-4 step-content hidden" data-step="3">
            <h2 class="text-2xl font-semibold mb-4 my-5">Detail Aplikasi</h2>
            <p class="font-sans text-gray-400 text-xxs my-0">Isi form detail aplikasi sesuai dengan apa yang diinginkan secara detail</p>
            <hr class="border-gray-950 border-t-1 w-full mx-auto my-5">
            <div class="mb-4">
                <label for="stakeholder" class="block mb-2">Stakeholder</label>
                <textarea id="stakeholder" name="stakeholder" rows="4" class="w-full border border-gray-300 rounded px-3 py-2"></textarea>
            </div>
            <div class="mb-4">
                <label for="platform" class="block mb-2">Platform</label>
                <select id="platform" name="platform" class="w-full border border-gray-300 rounded px-3 py-2">
                    <option value="">Select Platform</option>
                    <option value="web">Web</option>
                    <option value="mobile">Mobile</option>
                    <option value="desktop">Desktop</option>
                    <option value="multi-platform">Multi-platform</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block mb-2">Jenis Proyek</label>
                <div class="flex items-center space-x-4">
                    <label class="inline-flex items-center">
                        <input type="radio" name="jenis_proyek" value="0" class="form-radio">
                        <span class="ml-2">Aplikasi Baru</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="jenis_proyek" value="1" class="form-radio">
                        <span class="ml-2">Aplikasi Sudah Ada</span>
                    </label>
                </div>
            </div>
        </div>

        <!-- Step 4: Referensi dan Upload File -->
        <div class="bg-white rounded-xl overflow-hidden shadow-md w-full h-900 p-4 step-content hidden" data-step="4">
            <h2 class="text-2xl font-semibold mb-4 my-5">Referensi dan Upload File</h2>
            <p class="font-sans text-gray-400 text-xxs my-0">Isi form referensi (opsional) yang relevan dengan aplikasi yang diinginkan</p>
            <hr class="border-gray-950 border-t-1 w-full mx-auto my-5">
            <div id="ref-input">
                <div class="ref-block mb-5 border-[1px] border-gray-200 p-5 rounded-xl">
                    <label for="referensi_link" class="block mb-2">Tipe Referensi</label>
                    <select id="tipe" name="tipe" class="w-full border border-gray-300 rounded px-3 py-2 mb-4">
                        <option value="">Select Tipe</option>
                        <option value="link">Link</option>
                        <option value="file">File</option>
                    </select>
                
                    <div class="link-input mb-4 hidden">
                        <label for="referensi_link" class="block mb-2">Referensi Link</label>
                        <input type="url" id="referensi_link" name="referensi_link" class="w-full border border-gray-300 rounded px-3 py-2" placeholder="https://example.com">
                    </div>
                
                    <div class="file-input mb-4 hidden">
                        <label for="referensi_file" class="block mb-2 font-semibold">Attach File (Optional)</label>
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer hover:border-gray-400 transition-colors duration-300">
                            <input type="file" id="referensi_file" name="referensi_file[]" class="hidden" multiple>
                            <p class="text-gray-500">Drag & drop a file to attach it, or</p>
                            <p class="text-gray-500">browse for a file...</p>
                        </div>
                    </div>
                </div>                
            </div>
            <button id="addmore" type="button" class="bg-secondary-800 text-white px-4 py-2 rounded mt-4 float-right">Tambahkan Referensi Baru</button>
        </div>

        <div class="flex justify-between mt-8">
            <button type="button" id="prevBtn" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hidden">Previous</button>
            <div class="flex-grow"></div>
            <button type="button" id="nextBtn" class="bg-accent-light-500 text-white px-4 py-2 rounded">Next</button>
            <button type="submit" id="submitBtn" class="bg-accent-light-500 text-white px-4 py-2 rounded hidden">Submit</button>
        </div>
    </form>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('submissionForm');
    const stepperSteps = document.querySelectorAll('.stepper-step');
    const stepperCircles = document.querySelectorAll('.stepper-circle');
    const stepperLabels = document.querySelectorAll('.stepper-label');
    const stepContents = document.querySelectorAll('.step-content');
    const dropArea = document.getElementById('file-drop-area');
    const fileInput = document.getElementById('referensi_file');
    const fileList = document.getElementById('file-list');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const submitBtn = document.getElementById('submitBtn');
    const stepperProgress = document.getElementById('stepperProgress');
    let currentStep = 1;

    function updateStep(step) {
        stepperSteps.forEach((s, index) => {
            const circle = s.querySelector('.stepper-circle');
            const label = s.querySelector('.stepper-label');
            if (index + 1 <= step) {
                circle.classList.remove('bg-white', 'border-gray-300', 'text-gray-600');
                circle.classList.add('bg-accent-light-500', 'border-accent-light-500', 'text-white');
                label.classList.remove('text-gray-600');
                label.classList.add('text-blue-600', 'font-semibold');
            } else {
                circle.classList.add('bg-white', 'border-gray-300', 'text-gray-600');
                circle.classList.remove('bg-blue-500', 'border-blue-500', 'text-white');
                label.classList.add('text-gray-600');
                label.classList.remove('text-blue-600', 'font-semibold');
            }
        });

        stepContents.forEach((content, index) => {
            if (index + 1 === step) {
                content.classList.remove('hidden');
            } else {
                content.classList.add('hidden');
            }
        });

        // Update progress bar
        const progressPercentage = ((step - 1) / (stepperSteps.length - 1)) * 100;
        stepperProgress.style.width = `${progressPercentage}%`;

        prevBtn.classList.toggle('hidden', step === 1);
        nextBtn.classList.toggle('hidden', step === 4);
        submitBtn.classList.toggle('hidden', step !== 4);

        currentStep = step;
    }

    function validateStep(step) {
        const currentStepContent = document.querySelector(`.step-content[data-step="${step}"]`);
        const requiredFields = currentStepContent.querySelectorAll('[required]');
        return Array.from(requiredFields).every(field => field.value.trim() !== '');
    }

    function updateStepperClickability() {
        stepperSteps.forEach((step, index) => {
            if (index < currentStep) {
                step.disabled = false;
            } else if (index >= currentStep) {
                step.disabled = !validateStep(currentStep);
            }
        });
    }

    prevBtn.addEventListener('click', () => {
        if (currentStep > 1) {
            updateStep(currentStep - 1);
            updateStepperClickability();
        }
    });

    nextBtn.addEventListener('click', () => {
        if (validateStep(currentStep)) {
            if (currentStep < 4) {
                updateStep(currentStep + 1);
                updateStepperClickability();
            }
        } else {
            alert('Please fill in all fields before proceeding.');
        }
    });

    stepperSteps.forEach((step, index) => {
        step.addEventListener('click', () => {
            if (!step.disabled && validateStep(currentStep)) {
                updateStep(index + 1);
                updateStepperClickability();
            } else if (step.disabled) {
                alert('Please complete the current step before proceeding.');
            }
        });
    });

    form.addEventListener('submit', function(e) {
    this.submit();  // Sementara hapus preventDefault
});


    // Initialize the form
    updateStep(currentStep);
    updateStepperClickability();

    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
        dropArea.addEventListener(eventName, highlight, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, unhighlight, false);
    });

    function highlight(e) {
        dropArea.classList.add('border-blue-500', 'bg-blue-50');
    }

    function unhighlight(e) {
        dropArea.classList.remove('border-blue-500', 'bg-blue-50');
    }

    dropArea.addEventListener('drop', handleDrop, false);

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        handleFiles(files);
    }

    fileInput.addEventListener('change', function() {
        handleFiles(this.files);
    });

    dropArea.addEventListener('click', () => fileInput.click());

    function handleFiles(files) {
        fileList.innerHTML = '';
        [...files].forEach(file => {
            const fileItem = document.createElement('div');
            fileItem.className = 'flex items-center justify-between bg-gray-100 p-2 rounded';
            fileItem.innerHTML = `
                <span class="text-sm">${file.name}</span>
                <button type="button" class="text-red-500 hover:text-red-700">Remove</button>
            `;
            fileList.appendChild(fileItem);

            fileItem.querySelector('button').addEventListener('click', () => {
                fileItem.remove();
                // Remove file from fileInput
                const dt = new DataTransfer();
                const { files } = fileInput;
                for (let i = 0; i < files.length; i++) {
                    const f = files[i];
                    if (f !== file) dt.items.add(f);
                }
                fileInput.files = dt.files;
            });
        });
    }
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let refCount = 0; // A counter to keep track of dynamically added references

    // Define the toggleInputs function
    function toggleInputs(tipeSelect) {
        const container = tipeSelect.closest('.ref-block'); // Look for the closest container with class 'ref-block'
        const selectedType = tipeSelect.value;
        const linkInput = container.querySelector('.link-input');
        const fileInput = container.querySelector('.file-input');
        
        if (linkInput) {
            linkInput.classList.toggle('hidden', selectedType !== 'link');
        }
        if (fileInput) {
            fileInput.classList.toggle('hidden', selectedType !== 'file');
        }
    }

    // Event delegation to handle dynamic elements
    document.body.addEventListener('change', function(event) {
        if (event.target.matches('select[name="tipe"]')) {
            toggleInputs(event.target);
        }
    });

    const firstSelect = document.querySelector('.ref-block select[name="tipe"]');
    if (firstSelect) {
        toggleInputs(firstSelect); // Ensure the first select input is processed
    }

    $("#addmore").click(function() {
        refCount++; // Increment the reference count for unique identification

        $("#ref-input").append(`
            <div class="ref-block border-[1px] border-gray-200 mb-5 p-5 rounded-xl" data-ref-id="${refCount}">
                <label for="referensi_tipe_${refCount}" class="block mb-2">Tipe Referensi</label>
                <select id="referensi_tipe_${refCount}" name="tipe" class="w-full border border-gray-300 rounded px-3 py-2 mb-4">
                    <option value="">Select Tipe</option>
                    <option value="link">Link</option>
                    <option value="file">File</option>
                </select>
                
                <div class="link-input mb-4 hidden">
                    <label for="referensi_link_${refCount}" class="block mb-2">Referensi Link</label>
                    <input type="url" id="referensi_link_${refCount}" name="referensi_link_${refCount}" class="w-full border border-gray-300 rounded px-3 py-2" placeholder="https://example.com">
                </div>
                
                <div class="file-input mb-4 hidden">
                    <label for="referensi_file_${refCount}" class="block mb-2 font-semibold">Attach File (Optional)</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer hover:border-gray-400 transition-colors duration-300">
                        <input type="file" id="referensi_file_${refCount}" name="referensi_file_${refCount}[]" class="hidden" multiple>
                        <p class="text-gray-500">Drag & drop a file to attach it, or</p>
                        <p class="text-gray-500">browse for a file...</p>
                    </div>
                </div>
            </div>
        `);
    });
});
</script>

<style>
    /* Lingkaran Stepper */
    .stepper-circle {
        transition: all 0.3s ease-in-out;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .stepper-circle.active {
        border-color: #FD851E;
        background-color: #FD851E;
        color: white;
    }

    /* Label Stepper */
    .stepper-label {
        transition: color 0.3s ease-in-out;
    }

    .stepper-label.active {
        color: #FD851E; /* Warna label aktif */
    }

    /* Garis Progres */
    #stepperProgress {
        height: 6px;
        background-color: #FD851E;
        border-radius: 9999px;
        transition: width 0.5s ease-in-out;
    }
</style>