@extends('layouts.app')

@section('title', 'Help Center')

@section('content')
<div class="bg-white dark:bg-gray-900">
    <div class="container px-6 py-12 mx-auto">
        <h3 class="text-1xl text-center text-gray-800 lg:text-1xl dark:text-white">Most people asked about</h3>
        <h1 class="text-2xl font-semibold text-center text-gray-800 lg:text-3xl dark:text-white">Help Center</h1>

        <div class="mt-8 xl:mt-16 lg:flex lg:-mx-12">
            <!-- Left Column: Tabs -->
            <div class="lg:w-1/4 ml-12">
                <div class="space-y-4">
                    <a href="#" data-tab="howto" class="tab-link block text-xl font-semibold text-gray-800 dark:text-white py-5 px-4 shadow-md rounded-full">How To</a>
                    <a href="#" data-tab="faq" class="tab-link block text-xl font-semibold text-gray-800 dark:text-white py-5 px-4 shadow-md rounded-full">FAQ</a>
                </div>
            </div>

            <!-- Right Column: Tab Content -->
            <div class="lg:w-3/4 ml-7">
                <!-- How to Content -->
                <div id="howto" class="tab-content">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white">How To</h2>
                    <p class="text-gray-500 dark:text-gray-300 mt-4">Halaman How To pada aplikasi Polaris bertujuan untuk memberikan panduan lengkap kepada pengguna mengenai cara menggunakan aplikasi secara efektif.</p>
                    <hr class="my-4 border-gray-200 dark:border-gray-700">

                    <!-- How to Items -->
                    <div class="space-y-8">
                        <!-- How to Item 1 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="how1" class="absolute opacity-0 peer">
                            <label for="how1" class="flex items-center cursor-pointer">
                                <span class="material-symbols-outlined text-blue-500 pr-2 icon-rotate">arrow_forward_ios</span>
                                <span class="text-xl text-gray-700 dark:text-white">Bagaimana Cara Membuat Akun di Polaris ?</span>
                            </label>
                            <div class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out peer-checked:max-h-[200px]">
                                <p class="px-4 mt-2 text-gray-500 dark:text-gray-300">
                                    Cara membuat akun di Polaris adalah jika sudah memasuki landing page terdapat tombol sign up terletak pada bagian kanan atas yang dapat 
                                    diakses dan dapat mengisi form sign up atau register untuk membuat akun.
                                </p>
                            </div>
                        </div>
                        <hr class="my-8 border-gray-200 dark:border-gray-700">

                        <!-- How to Item 2 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="how2" class="absolute opacity-0 peer">
                            <label for="how2" class="flex items-center cursor-pointer">
                                <span class="material-symbols-outlined text-blue-500 pr-2 icon-rotate">arrow_forward_ios</span>
                                <span class="text-xl text-gray-700 dark:text-white">Bagaimana cara melakukan login ke aplikasi ?</span>
                            </label>
                            <div class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out peer-checked:max-h-[200px]">
                                <p class="px-4 mt-2 text-gray-500 dark:text-gray-300">
                                    Untuk melakukan login ke aplikasi dapat diakses dengan menekan tombol login yang berada di bagaian kanan atas, isi form login
                                    dan pastikan bahwa sudah memiliki akun di Aplikasi Polaris.
                                </p>
                            </div>
                        </div>
                        <hr class="my-8 border-gray-200 dark:border-gray-700">

                        <!-- How to Item 3 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="how3" class="absolute opacity-0 peer">
                            <label for="how3" class="flex items-center cursor-pointer">
                                <span class="material-symbols-outlined text-blue-500 pr-2 icon-rotate">arrow_forward_ios</span>
                                <span class="text-xl text-gray-700 dark:text-white">Bagaimana cara melakukan pengajuan baru ?</span>
                            </label>
                            <div class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out peer-checked:max-h-[200px]">
                                <p class="px-4 mt-2 text-gray-500 dark:text-gray-300">
                                    Pastikan memiliki akun Polaris dan sudah mekakukan sign in terhadap aplikasi, Akses menu form pengajuan
                                    yang ada pada dashboard, isi formulir dengan data pengajuan yang diperlukan dan klik submit untuk mengirim
                                    pengajuan
                                </p>
                            </div>
                        </div>
                        <hr class="my-8 border-gray-200 dark:border-gray-700">

                        <!-- How to Item 4 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="how4" class="absolute opacity-0 peer">
                            <label for="how4" class="flex items-center cursor-pointer">
                                <span class="material-symbols-outlined text-blue-500 pr-2 icon-rotate">arrow_forward_ios</span>
                                <span class="text-xl text-gray-700 dark:text-white">Bagaimana cara melacak status pengajuan saya ?</span>
                            </label>
                            <div class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out peer-checked:max-h-[200px]">
                                <p class="px-4 mt-2 text-gray-500 dark:text-gray-300">
                                    Pastikan sudah memiliki akun dan sudah melakukan sign in, status pengajuan dapat dilihat melalui dashboard atau
                                    pada halaman daftar pengajuan.
                                </p>
                            </div>
                        </div>
                        <hr class="my-8 border-gray-200 dark:border-gray-700">

                        <!-- How to Item 5 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="how5" class="absolute opacity-0 peer">
                            <label for="how5" class="flex items-center cursor-pointer">
                                <span class="material-symbols-outlined text-blue-500 pr-2 icon-rotate">arrow_forward_ios</span>
                                <span class="text-xl text-gray-700 dark:text-white">Bagaimana cara mengubah informasi profil saya ?</span>
                            </label>
                            <div class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out peer-checked:max-h-[200px]">
                                <p class="px-4 mt-2 text-gray-500 dark:text-gray-300">
                                    Untuk mengganti informasi profil saya adalah pastikan sudah memiliki akun Polaris dan juga sudah melakukan login,
                                    klik ikon profil yang terletak di pojok kanan atas dan pilih Profil, lalu lakukanlah
                                    perubahan pada informasi yang diperlukan dan klik simpan.
                                </p>
                            </div>
                        </div>
                        <hr class="my-8 border-gray-200 dark:border-gray-700">

                        <!-- How to Item 6 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="how6" class="absolute opacity-0 peer">
                            <label for="how6" class="flex items-center cursor-pointer">
                                <span class="material-symbols-outlined text-blue-500 pr-2 icon-rotate">arrow_forward_ios</span>
                                <span class="text-xl text-gray-700 dark:text-white">Bagaimana cara mengubah informasi Organisasi ?</span>
                            </label>
                            <div class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out peer-checked:max-h-[200px]">
                                <p class="px-4 mt-2 text-gray-500 dark:text-gray-300">
                                    Untuk mengganti informasi organisasi adalah pastikan sudah memiliki akun Polaris dan juga sudah melakukan login,
                                    klik ikon profil yang terletak di pojok kanan atas dan pilih Organisasi, lalu lakukanlah
                                    perubahan pada informasi yang diperlukan dan klik simpan.
                                </p>
                            </div>
                        </div>
                        <hr class="my-8 border-gray-200 dark:border-gray-700">

                        <!-- How to Item 7 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="how7" class="absolute opacity-0 peer">
                            <label for="how7" class="flex items-center cursor-pointer">
                                <span class="material-symbols-outlined text-blue-500 pr-2 icon-rotate">arrow_forward_ios</span>
                                <span class="text-xl text-gray-700 dark:text-white">Bagaimana cara melakukan export data pada data pengajuan yang telah diverifikasi ?</span>
                            </label>
                            <div class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out peer-checked:max-h-[200px]">
                                <p class="px-4 mt-2 text-gray-500 dark:text-gray-300">
                                    Setelah melakukan login dan mengakses halaman dashboard, pilih menu pengajuan. Klik tombol export data dan pada halaman tersebut akan terdapat
                                    pilihan data pengajuan akan dilakukan export dalam berbagai bentuk file.
                                </p>
                            </div>
                        </div>
                        <hr class="my-8 border-gray-200 dark:border-gray-700">
                    </div>
                </div>

                <!-- FAQ Content -->
                <div id="faq" class="tab-content hidden">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Frequently Asked Question</h2>
                    <p class="text-gray-500 dark:text-gray-300 mt-4">Halaman FAQ (Frequently Asked Questions) dirancang untuk menjawab pertanyaan umum yang sering diajukan oleh pengguna aplikasi Polaris.</p>
                    <hr class="my-4 border-gray-200 dark:border-gray-700">

                    <!-- FAQ Items -->
                    <div class="space-y-8">
                        <!-- FAQ Item 1 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="faq1" class="absolute opacity-0 peer">
                            <label for="faq1" class="flex items-center cursor-pointer">
                                <span class="material-symbols-outlined text-blue-500 pr-2 icon-rotate">arrow_forward_ios</span>
                                <span class="text-xl text-gray-700 dark:text-white">Apa saja fitur utama yang tersedia di Polaris ?</span>
                            </label>
                            <div class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out peer-checked:max-h-[200px]">
                                <p class="px-4 mt-2 text-gray-500 dark:text-gray-300">
                                    Fitur utama yang tersedia pada aplikasi polaris adalah Dashboard, Daftar Pengajuan, Form Pengajuan Aplikasi, Detail Pengajuan,
                                    Export Data Pengajuan, FAQ, serta About Us.
                                </p>
                            </div>
                        </div>
                        <hr class="my-8 border-gray-200 dark:border-gray-700">

                        <!-- FAQ Item 2 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="faq2" class="absolute opacity-0 peer">
                            <label for="faq2" class="flex items-center cursor-pointer">
                                <span class="material-symbols-outlined text-blue-500 pr-2 icon-rotate">arrow_forward_ios</span>
                                <span class="text-xl text-gray-700 dark:text-white">Apa yang harus dilakukan jika lupa kata sandi ?</span>
                            </label>
                            <div class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out peer-checked:max-h-[200px]">
                                <p class="px-4 mt-2 text-gray-500 dark:text-gray-300">
                                    Jika lupa kata sandi maka klik pada tautan "Lupa Kata Sandi" yang tersedia di halaman login, ikuti instruksi
                                    untuk melakukan pemulihan kata sandi dan untuk mempermudah proses login dapat mengaktifkan 'ingat saya'.
                                </p>
                            </div>
                        </div>
                        <hr class="my-8 border-gray-200 dark:border-gray-700">

                        <!-- FAQ Item 3 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="faq3" class="absolute opacity-0 peer">
                            <label for="faq3" class="flex items-center cursor-pointer">
                                <span class="material-symbols-outlined text-blue-500 pr-2 icon-rotate">arrow_forward_ios</span>
                                <span class="text-xl text-gray-700 dark:text-white">Apa yang harus dilakukan jika terdapat masalah saat menggunakan aplikasi ?</span>
                            </label>
                            <div class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out peer-checked:max-h-[200px]">
                                <p class="px-4 mt-2 text-gray-500 dark:text-gray-300">
                                    Jika terdapat masalah saat menggunakan aplikasi maka dapat mengakses halaman FAQ untuk mencari solusi dari masalah umum atau
                                    dapat juga mengakses halaman 'Hubungi Kami' dengan menekan tombol feedback yang tersedia pada bagian bawah aplikasi.
                                </p>
                            </div>
                        </div>
                        <hr class="my-8 border-gray-200 dark:border-gray-700">

                        <!-- FAQ Item 4 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="faq4" class="absolute opacity-0 peer">
                            <label for="faq4" class="flex items-center cursor-pointer">
                                <span class="material-symbols-outlined text-blue-500 pr-2 icon-rotate">arrow_forward_ios</span>
                                <span class="text-xl text-gray-700 dark:text-white">Apakah ada batasan pengguna email untuk sign up atau registrasi ?</span>
                            </label>
                            <div class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out peer-checked:max-h-[200px]">
                                <p class="px-4 mt-2 text-gray-500 dark:text-gray-300">
                                    Ya, untuk melakukan sign up atau registrasi terdapat batasan email bahwa hanya email yang memiliki domain corporate yang
                                    dapat digunakan untuk mendaftar dan mengakses fitur utama aplikasi.
                                </p>
                            </div>
                        </div>
                        <hr class="my-8 border-gray-200 dark:border-gray-700">

                        <!-- FAQ item 5 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="faq5" class="absolute opacity-0 peer">
                            <label for="faq5" class="flex items-center cursor-pointer">
                                <span class="material-symbols-outlined text-blue-500 pr-2 icon-rotate">arrow_forward_ios</span>
                                <span class="text-xl text-gray-700 dark:text-white">Kenapa tidak dapat melakukan login ?</span>
                            </label>
                            <div class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out peer-checked:max-h-[200px]">
                                <p class="px-4 mt-2 text-gray-500 dark:text-gray-300">
                                    Untuk dapat melakukan login dan mengakses aplikasi polaris harus dipastikan bahwa telah memiliki akun atau pastikan telah melakukan register sebelumnya.
                                </p>
                            </div>
                        </div>
                        <hr class="my-8 border-gray-200 dark:border-gray-700">

                        <!-- FAQ item 6 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="faq6" class="absolute opacity-0 peer">
                            <label for="faq6" class="flex items-center cursor-pointer">
                                <span class="material-symbols-outlined text-blue-500 pr-2 icon-rotate">arrow_forward_ios</span>
                                <span class="text-xl text-gray-700 dark:text-white">Kenapa email dan password tidak otomatis tersimpan saat melakukan login ?</span>
                            </label>
                            <div class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out peer-checked:max-h-[200px]">
                                <p class="px-4 mt-2 text-gray-500 dark:text-gray-300">
                                    Untuk dapat menyimpan email dan password agar dapat langsung melakukan login adalah pastikan untuk mengaktifkan 'ingat saya' pada halaman login.
                                </p>
                            </div>
                        </div>
                        <hr class="my-8 border-gray-200 dark:border-gray-700">

                        <!-- FAQ item 7 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="faq7" class="absolute opacity-0 peer">
                            <label for="faq7" class="flex items-center cursor-pointer">
                                <span class="material-symbols-outlined text-blue-500 pr-2 icon-rotate">arrow_forward_ios</span>
                                <span class="text-xl text-gray-700 dark:text-white">Kenapa tidak dapat melakukan register ?</span>
                            </label>
                            <div class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out peer-checked:max-h-[200px]">
                                <p class="px-4 mt-2 text-gray-500 dark:text-gray-300">
                                    Agar proses register berhasil, pastikan mengisi keseluruhan data, pastikan yang diinput pada form konfirmasi password sama dengan password yang telah diinput sebelumnya,
                                    dan jangan lupa untuk menyetujui syarat dan ketentuan.
                                </p>
                            </div>
                        </div>
                        <hr class="my-8 border-gray-200 dark:border-gray-700">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
document.addEventListener("DOMContentLoaded", () => {
    const tabLinks = document.querySelectorAll(".tab-link");
    const tabContents = document.querySelectorAll(".tab-content");

    tabLinks.forEach(link => {
        link.addEventListener("click", (e) => {
            e.preventDefault();
            const targetId = link.getAttribute("data-tab");

            // Hide all tab content sections
            tabContents.forEach(content => content.classList.add("hidden"));

            // Show the selected tab content
            document.getElementById(targetId).classList.remove("hidden");

            // Update active link styling
            tabLinks.forEach(link => link.classList.remove("text-blue-500"));
            link.classList.add("text-blue-500");
        });
    });
});
</script>

<style>
/* Tambahan CSS untuk rotasi ikon */
.icon-rotate {
    transition: transform 0.3s ease; /* Menambahkan transisi */
}
input:checked + label .icon-rotate {
    transform: rotate(90deg); /* Mengubah rotasi saat checkbox dicentang */
}
</style>