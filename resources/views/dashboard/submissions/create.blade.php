@extends('layouts.dashboard')

@section('title', 'Tambah Data Pengajuan')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8">Form Pengajuan</h1>

    <form id="submissionForm" action="{{ route('submissions.store') }}" method="POST" enctype="multipart/form-data" class="max-w-4xl mx-auto">
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
                    <select id="tipe" name="referensi[0][tipe]" class="w-full border border-gray-300 rounded px-3 py-2 mb-4">
                        <option value="">Select Tipe</option>
                        <option value="link">Link</option>
                        <option value="file">File</option>
                    </select>
                
                    <div class="link-input mb-4 hidden">
                        <label for="referensi_link" class="block mb-2">Referensi Link</label>
                        <input type="url" id="referensi_link" name="referensi[0][link_path]" class="w-full border border-gray-300 rounded px-3 py-2" placeholder="https://example.com">
                    </div>
                
                    <div class="file-input mb-4 hidden">
                        <label for="referensi_file" class="block mb-2 font-semibold">Attach File (Optional)</label>
                        <div id="file-drop-area" class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer hover:border-gray-400 transition-colors duration-300">
                        <input type="file" id="referensi_file" name="referensi[0][file_path]" class="
                        " multiple>
                            <p class="text-gray-500">Drag & drop a file to attach it, or</p>
                            <p class="text-gray-500">browse for a file...</p>
                        </div>
                    </div>

                    <div class="text-input mb-4 hidden">
                        <label for="keterangan_referensi" class="block mb-2">Keterangaan</label>
                        <input type="text" id="keterangan_referensi" name="referensi[0][keterangan]" class="w-full border border-gray-300 rounded px-3 py-2">
                    </div>

                </div>                
            </div>
            <button id="addmore" type="button" class="bg-primary-900 text-white px-4 py-2 rounded mt-4 float-right">Tambah Referensi Baru</button>
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
    const fileList = document.createElement('ul');
    dropArea.appendChild(fileList);
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const submitBtn = document.getElementById('submitBtn');
    const stepperProgress = document.getElementById('stepperProgress');
    let currentStep = 1;
    let completedSteps = new Set();

        const requiredFieldsByStep = {
            1: ['judul_pengajuan', 'deskripsi_masalah', 'tujuan_aplikasi'],
            2: ['proses_bisnis', 'aturan_bisnis'],
            3: ['stakeholder', 'platform'],
            4: [] // Step 4 is optional
        };

        function isStepComplete(step) {
            const fields = requiredFieldsByStep[step];
            if (!fields || fields.length === 0) return true;

            const allFilled = fields.every(fieldId => {
                const field = document.getElementById(fieldId);
                if (!field) return false;

                // Handle radio buttons separately
                if (fieldId === 'jenis_proyek') {
                    const radioGroup = document.getElementsByName('jenis_proyek');
                    return Array.from(radioGroup).some(radio => radio.checked);
                }

                if (field.tagName === 'SELECT') {
                    return field.value !== '';
                }

                return field.value.trim() !== '';
            });

            // Special handling for step 3's radio buttons
            if (step === 3) {
                const jenisProyekRadios = document.getElementsByName('jenis_proyek');
                const isRadioSelected = Array.from(jenisProyekRadios).some(radio => radio.checked);
                return allFilled && isRadioSelected;
            }

            return allFilled;
        }


        function canAccessStep(targetStep) {
            // Can always go back
            if (targetStep <= currentStep) return true;
            
            // Check if all previous steps are complete
            for (let step = 1; step < targetStep; step++) {
                if (!isStepComplete(step)) return false;
            }
            
            return true;
        }

        function updateNextButtonState() {
            const canProceed = isStepComplete(currentStep);
            nextBtn.disabled = !canProceed;
            
            // Add visual feedback
            if (canProceed) {
                nextBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                nextBtn.classList.add('hover:bg-blue-600');
            } else {
                nextBtn.classList.add('opacity-50', 'cursor-not-allowed');
                nextBtn.classList.remove('hover:bg-blue-600');
            }
        }

        // Add event listeners for radio buttons
        const radioButtons = document.getElementsByName('jenis_proyek');
        radioButtons.forEach(radio => {
            radio.addEventListener('change', updateNextButtonState);
        });

        function updateStep(step) {
            if (step < 1 || step > stepperSteps.length) return;

            // Check if we can access the requested step
            if (!canAccessStep(step)) {
                alert('Silakan lengkapi step sebelumnya terlebih dahulu.');
                return;
            }

            stepperSteps.forEach((s, index) => {
                const circle = s.querySelector('.stepper-circle');
                const label = s.querySelector('.stepper-label');
                
                if (index + 1 <= step) {
                    // Current and completed steps
                    circle.classList.remove('bg-white', 'border-gray-300', 'text-gray-600');
                    circle.classList.add('bg-accent-light-500', 'border-accent-light-500', 'text-white');
                    label.classList.remove('text-gray-600');
                    label.classList.add('text-blue-600', 'font-semibold');
                } else {
                    // Future steps
                    circle.classList.add('bg-white', 'border-gray-300', 'text-gray-600');
                    circle.classList.remove('bg-accent-light-500', 'border-accent-light-500', 'text-white');
                    label.classList.add('text-gray-600');
                    label.classList.remove('text-blue-600', 'font-semibold');
                }
            });

            // Show/hide step contents
            stepContents.forEach((content, index) => {
                content.classList.toggle('hidden', index + 1 !== step);
            });

            // Update progress bar
            const progressPercentage = ((step - 1) / (stepperSteps.length - 1)) * 100;
            stepperProgress.style.width = `${progressPercentage}%`;

            // Update button visibility
            prevBtn.classList.toggle('hidden', step === 1);
            nextBtn.classList.toggle('hidden', step === 4);
            submitBtn.classList.toggle('hidden', step !== 4);

            currentStep = step;
            updateNextButtonState();
        }

        // Add input listeners to all required fields
        Object.values(requiredFieldsByStep).flat().forEach(fieldId => {
            const field = document.getElementById(fieldId);
            if (field) {
                const updateHandler = () => {
                    if (field.type === 'radio') {
                        const radioGroup = document.getElementsByName(field.name);
                        radioGroup.forEach(radio => {
                            radio.addEventListener('change', updateNextButtonState);
                        });
                    } else {
                        field.addEventListener('input', updateNextButtonState);
                    }
                };
                updateHandler();
            }
        });

        // Stepper click handlers
        stepperSteps.forEach((step, index) => {
            step.addEventListener('click', () => {
                const targetStep = index + 1;
                if (canAccessStep(targetStep)) {
                    updateStep(targetStep);
                }
            });
        });

        // Navigation button handlers
        prevBtn.addEventListener('click', () => {
            if (currentStep > 1) updateStep(currentStep - 1);
        });

        nextBtn.addEventListener('click', () => {
            console.log('Next button clicked');
            if (isStepComplete(currentStep)) {
                updateStep(currentStep + 1);
            } else {
                alert('Silakan isi semua field yang diperlukan sebelum melanjutkan.');
            }
        });

        
        // Form submission handler
        form.addEventListener('submit', function(e) {
            console.log('Form submitted');
            for (let step = 1; step <= 3; step++) {
                if (!isStepComplete(step)) {
                    e.preventDefault();
                    alert('Silakan lengkapi semua field yang diperlukan di semua step.');
                    return;
                }
            }
        });


        // Initialize form
        updateStep(1);

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

        function highlight() {
            dropArea.classList.add('border-blue-500', 'bg-blue-50');
        }

        function unhighlight() {
            dropArea.classList.remove('border-blue-500', 'bg-blue-50');
        }

        dropArea.addEventListener('drop', handleDrop, false);
        dropArea.addEventListener('click', () => fileInput.click());

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            addFiles(files);
        }

        fileInput.addEventListener('change', () => addFiles(fileInput.files));

        function addFiles(files) {
            const dt = new DataTransfer();

            Array.from(files).forEach(file => {
                const fileItem = document.createElement('li');
                fileItem.className = 'flex items-center justify-between bg-gray-100 p-2 rounded';
                fileItem.innerHTML = `
                    <span class="text-sm">${file.name}</span>
                    <button type="button" class="text-red-500 hover:text-red-700">Remove</button>
                `;
                fileList.appendChild(fileItem);
                dt.items.add(file);

                fileItem.querySelector('button').addEventListener('click', () => {
                    fileItem.remove();
                    dt.items.remove(Array.from(dt.files).indexOf(file));
                    fileInput.files = dt.files;
                });
            });

            fileInput.files = dt.files;
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let refCount = 0;

        // Function to initialize drag and drop functionality for a container
        function initializeDragAndDrop(container) {
            const dropArea = container.querySelector('.file-input');
            const fileInput = dropArea.querySelector('input[type="file"]');
            const fileList = document.createElement('ul');
            fileList.className = 'mt-4 space-y-2';
            dropArea.appendChild(fileList);

            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }

            function highlight(e) {
                dropArea.classList.add('border-blue-500', 'bg-blue-50');
            }

            function unhighlight(e) {
            dropArea.classList.remove('border-blue-500', 'bg-blue-50');
            }

            function handleDrop(e) {
                unhighlight(e);
                const dt = e.dataTransfer;
                const files = dt.files;
                handleFiles(files);
            }

            function handleFiles(files) {
                const dt = new DataTransfer();
                
                // Hapus pesan "Drag & drop..." saat ada file
                const defaultText = dropArea.querySelector('p');
                if (defaultText) {
                    defaultText.style.display = 'none';
                }

                Array.from(files).forEach(file => {
                    const fileItem = document.createElement('li');
                    fileItem.className = 'flex items-center justify-between bg-gray-100 p-2 rounded mt-2';
                    fileItem.innerHTML = `
                        <span class="text-sm truncate max-w-xs">${file.name}</span>
                        <button type="button" class="text-red-500 hover:text-red-700 ml-2">×</button>
                    `;
                    fileList.appendChild(fileItem);
                    dt.items.add(file);

                    // Handle remove button
                    fileItem.querySelector('button').addEventListener('click', () => {
                        fileItem.remove();
                        dt.items.remove(Array.from(dt.files).indexOf(file));
                        fileInput.files = dt.files;
                        
                        // Show default text if no files remain
                        if (fileList.children.length === 0 && defaultText) {
                            defaultText.style.display = 'block';
                        }
                    });
                });

                fileInput.files = dt.files;
            }

            // Event listeners for drag & drop
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                dropArea.addEventListener(eventName, preventDefaults, false);
            });

            ['dragenter', 'dragover'].forEach(eventName => {
                dropArea.addEventListener(eventName, highlight, false);
            });

            ['dragleave', 'drop'].forEach(eventName => {
                dropArea.addEventListener(eventName, unhighlight, false);
            });

            dropArea.addEventListener('drop', handleDrop, false);
            
            // Click to upload
            dropArea.addEventListener('click', () => fileInput.click());
            
            // Handle file input change
            fileInput.addEventListener('change', (e) => {
                handleFiles(e.target.files);
            });

            // Return cleanup function
            return () => {
                ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                    dropArea.removeEventListener(eventName, preventDefaults);
                });
                dropArea.removeEventListener('drop', handleDrop);
                dropArea.removeEventListener('click', () => fileInput.click());
                fileInput.removeEventListener('change', handleFiles);
            };
        }

        // Initialize drag and drop for initial file input
        initializeDragAndDrop(document);

        // Handle dynamically added file inputs
        document.getElementById('addmore')?.addEventListener('click', function() {
            // Wait for the new elements to be added to DOM
            setTimeout(() => {
                const newRefBlock = document.querySelector('.ref-block:last-child');
                if (newRefBlock) {
                    initializeDragAndDrop(newRefBlock);
                }
            }, 100);
        });
    });
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let refCount = 0;

    // Function to toggle input visibility
    function toggleInputs(select) {
        const container = select.closest('.ref-block');
        const selectedType = select.value;
        const linkInput = container.querySelector('.link-input');
        const fileInput = container.querySelector('.file-input');
        const textInput = container.querySelector('.text-input');

        // Hide all inputs first
        linkInput?.classList.add('hidden');
        fileInput?.classList.add('hidden');
        textInput?.classList.add('hidden');

        // Show relevant inputs based on selection
        if (selectedType === 'link') {
            linkInput?.classList.remove('hidden');
            textInput?.classList.remove('hidden');
        } else if (selectedType === 'file') {
            fileInput?.classList.remove('hidden');
            textInput?.classList.remove('hidden');
        }
    }

    // Initialize the first reference block
    const firstSelect = document.querySelector('select[name="referensi[0][tipe]"]');
    if (firstSelect) {
        firstSelect.addEventListener('change', (e) => toggleInputs(e.target));
    }

    // Add More References Handler
    document.getElementById('addmore')?.addEventListener('click', function() {
        refCount++;
        
        const newRefBlock = document.createElement('div');
        newRefBlock.className = 'ref-block mb-5 border-[1px] border-gray-200 p-5 rounded-xl';
        newRefBlock.innerHTML = `
            <label for="referensi_tipe_${refCount}" class="block mb-2">Tipe Referensi</label>
            <select id="referensi_tipe_${refCount}" name="referensi[${refCount}][tipe]" class="w-full border border-gray-300 rounded px-3 py-2 mb-4">
                <option value="">Select Tipe</option>
                <option value="link">Link</option>
                <option value="file">File</option>
            </select>
            
            <div class="link-input mb-4 hidden">
                <label for="referensi_link_${refCount}" class="block mb-2">Referensi Link</label>
                <input type="url" id="referensi_link_${refCount}" name="referensi[${refCount}][link_path]" class="w-full border border-gray-300 rounded px-3 py-2" placeholder="https://example.com">
            </div>
            
            <div class="file-input mb-4 hidden">
                <label for="referensi_file_${refCount}" class="block mb-2 font-semibold">Attach File (Optional)</label>
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer hover:border-gray-400 transition-colors duration-300">
                    <input type="file" id="referensi_file_${refCount}" name="referensi[${refCount}][file_path]" class="hidden" accept=".pdf,.doc,.docx,.xls,.xlsx,.jpg,.jpeg,.png">
                    <p class="text-gray-500">Drag & drop a file to attach it, or</p>
                    <p class="text-gray-500">browse for a file...</p>
                </div>
            </div>

            <div class="text-input mb-4 hidden">
                <label for="keterangan_referensi_${refCount}" class="block mb-2">Keterangan</label>
                <input type="text" id="keterangan_referensi_${refCount}" name="referensi[${refCount}][keterangan]" class="w-full border border-gray-300 rounded px-3 py-2">
            </div>
        `;

        document.getElementById('ref-input').appendChild(newRefBlock);

        // Add change event listener to the new select
        const newSelect = newRefBlock.querySelector(`select[name="referensi[${refCount}][tipe]"]`);
        newSelect.addEventListener('change', (e) => toggleInputs(e.target));
    });

    // Make sure the form has the correct enctype
    const form = document.getElementById('submissionForm');
    if (form) {
        form.enctype = 'multipart/form-data';
    }
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