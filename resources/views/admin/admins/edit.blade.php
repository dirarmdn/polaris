<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=visibility" />
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-white-900 font-manrope"> <!-- Tambahkan kelas font-manrope -->
    <!-- Navbar -->
    <nav class="bg-white no-shadow py-2">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-8">
                <img src="{{ asset('images/Logo(2).png') }}" alt="Logo" class="h-20">
                <a href="#" class="text-black font-semibold">Dashboard</a>
                <a href="#" class="text-black font-semibold">Pengajuan</a>
                <a href="#" class="text-black font-semibold">Mitra</a>
                <div class="relative">
                    <a href="#" class="text-black font-semibold">Admin</a>
                    <div class="absolute left-0 right-0 h-1" style="background-color: #ff7600; margin-top: 0.25rem;"></div>
                </div>
            </div>
            <div class="flex items-center space-x-8">
                <img src="{{ asset('images/foto_profil.jpg') }}" alt="foto_profil" class="w-10 h-10 rounded-lg">
            </div>
        </div>
    </nav>

    <!-- Header -->
    <div class="flex items-center mb-0 header-container">
        <h1 class="text-3xl font-bold header-title" style="margin-top: 0; margin-left: 170px;">
            <span class="text-black">Update</span>
            <span style="color: #ff7600;">Admin</span>
        </h1>
    </div>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="container mx-auto p-6">
        <div class="bg-white rounded-lg shadow-lg mx-auto p-5 mt-0" style="max-width: 72rem;">
            <form action="{{ route('admin.update') }}" method="POST">
                @csrf
                
                <div class="mb-8 flex items-center">
                    <label for="nip" class="w-1/4 text-black-700 font-semibold">
                        NIP<span class="required-asterisk"></span>
                    </label>
                    <input type="text" name="nip" id="nip" class="w-1/2 max-w-[400px] custom-input py-1 text-xs" required>
                </div>

                <div class="mb-8 flex items-center">
                    <label for="name" class="w-1/4 text-black-700 font-semibold">
                        Nama Lengkap<span class="required-asterisk"></span>
                    </label>
                    <input type="text" name="name" id="name" class="w-1/2 max-w-[400px] custom-input py-4 text-xs" required> 
                </div>

                <div class="mb-8 flex items-center">
                    <label for="email" class="w-1/4 text-black-700 font-semibold">
                        Email<span class="required-asterisk"></span>
                    </label>
                    <input type="email" name="email" id="email" class="w-1/2 max-w-[400px] custom-input py-7 text-xs" required> 
                </div>

                <div class="mb-8 flex items-center">
                <label for="password" class="w-1/4 text-black-700 font-semibold">
                    Password<span class="required-asterisk"></span>
                </label>
                <div class="relative w-1/4"> <!-- You can also change this width if needed -->
                    <input type="password" name="password" id="password" class="w-full max-w-[300px] custom-input py-2 pl-10 text-xs" required>
                    <button type="button" class="absolute inset-y-0 right-4 flex items-center text-black-600 transition-transform duration-300" id="toggle-password"> <!-- Adjusted right value -->
                        <span class="material-symbols-outlined" id="eye-icon">visibility</span>
                    </button>
                </div>
            </div>

                <div class="mb-8 flex items-center">
                    <label for="role" class="w-1/4 text-black-700 font-semibold">
                        Role<span class="required-asterisk"></span>
                    </label>
                    <select name="role" id="role" class="w-1/4 max-w-[300px] custom-input py-13 text-xs " required> 
                        <option value="admin">Admin</option>
                        <option value="editor">Reviewer</option>
                    </select>
                </div>

                <div class="text-right">
                    <button type="submit" class="bg-secondary-900 text-white font-semibold py-2 px-4 rounded-lg">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>

<style>
    /* Custom styles for input fields */
    .custom-input {
        border: 2px solid #ccc;
        padding: 0.75rem;
        border-radius: 8px;
        transition: border-color 0.3s;
    }

    /* Input focus effect */
    .custom-input:focus {
        border-color: #4A90E2; /* Example: Change to a blue border on focus */
        outline: none;
    }

    /* Style for the red asterisk */
    .required-asterisk {
        color: red;
    }
</style>
