@extends('layouts.clear')

@section('title', 'POLARIS | Sign up')

@section('content')
<div class="flex items-center justify-center min-h-screen w-screen bg-cover bg-center" style="background-image: url('{{ asset('images/SignUp_BG.png') }}')">
    <div class="w-full max-w-lg px-12 bg-white shadow-md rounded-xl">
        <a href="{{ route('home') }}" class="flex justify-center my-4">
            <img src="{{ asset('images/Logo.png') }}" alt="Logo" class="h-16">
        </a>
        <h2 class="mb-6 font-semibold text-center">Bergabung bersama kami</h2>
        <form method="POST" action="{{ route('register.post') }}">
            @csrf <!-- {{ csrf_field() }} -->
            <!-- Nama Lengkap -->
            <div class="mb-4">
                <input type="text" id="name" name="name" placeholder="Nama Lengkap" class="w-full px-6 py-3 text-xs border rounded-lg focus:outline-none focus:ring focus:ring-primary-300" value="{{ old('name') }}">
                @error('name')
                    <span class="text-xs text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <input type="email" id="email" name="email" placeholder="Email" class="w-full px-6 py-3 text-xs border rounded-lg focus:outline-none focus:ring focus:ring-primary-300" value="{{ old('email') }}">
                @error('email')
                    <span class="text-xs text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <!-- Jabatan -->
            <div class="mb-4">
                <input type="text" id="position" name="position" placeholder="Jabatan dalam Organisasi" class="w-full px-6 py-3 text-xs border rounded-lg focus:outline-none focus:ring focus:ring-primary-300" value="{{ old('position') }}">
                @error('position')
                    <span class="text-xs text-red-600">{{ $message }}</span>
                @enderror
            </div>
            
            <!-- Organisasi -->
            <div class="mb-4 relative flex flex-col">
                <input type="text" id="organization_name" name="organization_name" placeholder="Nama organisasi" class="w-full px-6 py-3 text-xs border rounded-lg focus:outline-none focus:ring focus:ring-primary-300" value="{{ old('organization_name') }}">
                <input type="hidden" id="organization_code" name="organization_code"> <!-- Menyimpan ID organisasi jika ditemukan -->
                <select id="organization-dropdown" class="absolute w-full p-0 mt-14 bg-white border border-gray-300 text-gray-900 text-sm rounded-lg border-s-gray-100 dark:border-s-gray-700 border-s-2 focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 z-10" size="5" style="display: none; max-height: 150px; overflow-y: auto;"></select>

                @error('organization_name')
                    <span class="text-xs text-red-600">{{ $message }}</span>
                @enderror
            </div>            

            <!-- Password -->
            <div class="mb-4 relative">
                <input type="password" id="password" name="password" placeholder="Password" class="w-full px-6 py-3 text-xs border rounded-lg focus:outline-none focus:ring focus:ring-primary-300">
                <span class="absolute right-3 top-3 cursor-pointer" onclick="togglePasswordVisibility('password')">
                    <i class="material-icons" id="password-icon">visibility</i>
                </span>
                @error('password')
                    <span class="text-xs text-red-600">{{ $message }}</span>
                @enderror
                <p class="text-xs text-gray-500 mt-2">Minimal 8 karakter. Contoh: password123!</p>
            </div>

            <!-- Konfirmasi Password -->
            <div class="mb-4 relative">
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password" class="w-full px-6 py-3 text-xs border rounded-lg focus:outline-none focus:ring focus:ring-primary-300">
                <span class="absolute right-3 top-3 cursor-pointer" onclick="togglePasswordVisibility('password_confirmation')">
                    <i class="material-icons" id="password-confirmation-icon">visibility</i>
                </span>
            </div>

            <!-- Persyaratan -->
            <div class="flex items-center mb-4">
                <input type="checkbox" id="terms" name="terms" class="w-4 h-4 text-primary-900 focus:ring-primary-500 focus:outline-none">
                <label for="terms" class="ml-2 text-xs font-medium text-gray-700">Saya setuju dengan syarat dan ketentuan</label>
            </div>

            <!-- Button Sign Up -->
            <div class="flex justify-center">
                <button type="submit" class="w-full px-4 py-4 text-sm font-bold text-white bg-primary-900 rounded-lg hover:bg-primary-700">Sign Up</button>
            </div>
        </form>

        <!-- Login -->
        <p class="mt-6 mb-8 text-sm text-center text-gray-500">Sudah punya akun? <a href="{{ route('login') }}" class="text-accent-600 hover:underline">Login sekarang</a></p>
    </div>
</div>

<script>
    function togglePasswordVisibility(inputId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(inputId === 'password' ? 'password-icon' : 'password-confirmation-icon');
        
        if (input.type === "password") {
            input.type = "text";
            icon.textContent = 'visibility_off'; // Change icon to 'visibility_off'
        } else {
            input.type = "password";
            icon.textContent = 'visibility'; // Change icon back to 'visibility'
        }
    }

    $('#organization_name').on('input', function () {
            let query = $(this).val();
            if (query.length >= 1) { // Mulai mencari setelah 1 karakter
                $.ajax({
                    url: '{{ route("organization.search") }}',
                    type: 'GET',
                    data: { query: query },
                    success: function (data) {
                        let dropdown = $('#organization-dropdown');
                        dropdown.empty();
                        if (data.length) {
                            dropdown.show();
                            data.forEach(function (organization) {
                                dropdown.append(`<option class="hover:bg-secondary-800 hover:text-white" value="${organization.organization_code}" data-name="${organization.organization_name}">${organization.organization_name}</option>`);
                            });
                        } else {
                            dropdown.hide();
                        }
                    }
                });
            }
        });

        // Mengisi input dan id organisasi saat dipilih
        $('#organization-dropdown').on('click', 'option', function () {
            const name = $(this).data('name');
            const id = $(this).val();

            $('#organization_name').val(name);
            $('#organization_code').val(id);

            $('#organization-dropdown').hide();
            $('#add-organization-btn').hide();
        });

        // Tampilkan tombol tambah jika organisasi tidak ditemukan
        $('#organization_name').on('blur', function () {
            setTimeout(function () {
                if (!$('#organization_code').val()) {
                    $('#add-organization-btn').show();
                }
            }, 100);
        });
</script>
@endsection