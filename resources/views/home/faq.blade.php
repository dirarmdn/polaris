@extends('layouts.app')

@section('title', 'Frequently Asked Question')

@section('content')
<div class="bg-white dark:bg-gray-900">
    <div class="container px-6 py-12 mx-auto">
        <h3 class="text-1xl text-center text-gray-800 lg:text-1xl dark:text-white">Most people asked about</h3>
        <h1 class="text-2xl font-semibold text-center text-gray-800 lg:text-3xl dark:text-white">Frequently Asked Question</h1>

        <div class="mt-0 xl:mt-4 lg:flex lg:-mx-12 min-h-screen flex justify-center items-center">
            <div class="lg:w-3/4 ml-7">
                <!-- General Content -->
                <div id="faq" class="tab-content">
                    <hr class="mb-8 my-4 border-gray-200 dark:border-gray-700">

                    <!-- FAQ Items -->
                    <div class="space-y-8">
                        <!-- FAQ Item 1 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="faq1" class="absolute opacity-0 peer">
                            <label for="faq1" class="flex items-center cursor-pointer">
                                <span class="material-symbols-outlined text-blue-500 pr-2 icon-rotate">arrow_forward_ios</span>
                                <span class="text-xl text-gray-700 dark:text-white">Apa itu aplikasi Polaris ?</span>
                            </label>
                            <div class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out peer-checked:max-h-[200px]">
                                <p class="px-4 mt-2 text-gray-500 dark:text-gray-300">
                                    Polaris adalah aplikasi web yang dirancang untuk mempermudah proses pengajuan kebutuhan aplikasi di lingkungan kampus. Aplikasi ini menyediakan fitur untuk melakukan pengajuan, melacak status, serta mengelola pengajuan secara terpusat.
                                </p>
                            </div>
                        </div>
                        <hr class="my-8 border-gray-200 dark:border-gray-700">

                        <!-- FAQ Item 2 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="faq2" class="absolute opacity-0 peer">
                            <label for="faq2" class="flex items-center cursor-pointer">
                                <span class="material-symbols-outlined text-blue-500 pr-2 icon-rotate">arrow_forward_ios</span>
                                <span class="text-xl text-gray-700 dark:text-white">Bagaimana cara mengakses Polaris ?</span>
                            </label>
                            <div class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out peer-checked:max-h-[200px]">
                                <p class="px-4 mt-2 text-gray-500 dark:text-gray-300">
                                    Ketika pengguna pertama kali mengakses aplikasi Polaris, maka akan diarahkan ke Halama Utama yang tersedia menu navigasi untuk mengakses berbagai fitur aplikasi seperti daftar pengajuan, halaman About, dan FAQ.
                                </p>
                            </div>
                        </div>
                        <hr class="my-8 border-gray-200 dark:border-gray-700">

                        <!-- FAQ Item 3 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="faq3" class="absolute opacity-0 peer">
                            <label for="faq3" class="flex items-center cursor-pointer">
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

                        <!-- FAQ Item 4 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="faq4" class="absolute opacity-0 peer">
                            <label for="faq4" class="flex items-center cursor-pointer">
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

                        <!-- FAQ Item 5 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="faq5" class="absolute opacity-0 peer">
                            <label for="faq5" class="flex items-center cursor-pointer">
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

                        <!-- FAQ Item 6 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="faq6" class="absolute opacity-0 peer">
                            <label for="faq6" class="flex items-center cursor-pointer">
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

                        <!-- FAQ Item 7 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="faq7" class="absolute opacity-0 peer">
                            <label for="faq7" class="flex items-center cursor-pointer">
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

                        <!-- FAQ Item 8 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="faq8" class="absolute opacity-0 peer">
                            <label for="faq8" class="flex items-center cursor-pointer">
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

                        <!-- FAQ Item 9 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="faq9" class="absolute opacity-0 peer">
                            <label for="faq9" class="flex items-center cursor-pointer">
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

                        <!-- FAQ Item 10 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="faq10" class="absolute opacity-0 peer">
                            <label for="faq10" class="flex items-center cursor-pointer">
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

                        <!-- FAQ Item 11 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="faq11" class="absolute opacity-0 peer">
                            <label for="faq11" class="flex items-center cursor-pointer">
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

                        <!-- FAQ Item 12 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="faq12" class="absolute opacity-0 peer">
                            <label for="faq12" class="flex items-center cursor-pointer">
                                <span class="material-symbols-outlined text-blue-500 pr-2 icon-rotate">arrow_forward_ios</span>
                                <span class="text-xl text-gray-700 dark:text-white">Bagaimana cara keluar dari akun saya ?</span>
                            </label>
                            <div class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out peer-checked:max-h-[200px]">
                                <p class="px-4 mt-2 text-gray-500 dark:text-gray-300">
                                    Untuk keluar dari akun Anda, klik ikon profil di pojok kanan atas dan pilih opsi Logout. Anda akan diarahkan kembali 
                                    ke halaman Landing Page setelah logout.
                                </p>
                            </div>
                        </div>
                        <hr class="my-8 border-gray-200 dark:border-gray-700">

                        <!-- FAQ Item 13 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="faq13" class="absolute opacity-0 peer">
                            <label for="faq13" class="flex items-center cursor-pointer">
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

                        <!-- FAQ Item 14 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="faq14" class="absolute opacity-0 peer">
                            <label for="faq14" class="flex items-center cursor-pointer">
                                <span class="material-symbols-outlined text-blue-500 pr-2 icon-rotate">arrow_forward_ios</span>
                                <span class="text-xl text-gray-700 dark:text-white">Apa fungsi halaman Dashboard ?</span>
                            </label>
                            <div class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out peer-checked:max-h-[200px]">
                                <p class="px-4 mt-2 text-gray-500 dark:text-gray-300">
                                    Dashboard merupakan pusat kendali setelah melakukan login, dalam dashboard juga anda dapat melihat status pengajuan yang sedang
                                    berlangsung, mengakses data pengajuan, mengelila informasi profil.
                                </p>
                            </div>
                        </div>
                        <hr class="my-8 border-gray-200 dark:border-gray-700">

                        <!-- FAQ Item 15 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="faq15" class="absolute opacity-0 peer">
                            <label for="faq15" class="flex items-center cursor-pointer">
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

                        <!-- FAQ Item 16 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="faq16" class="absolute opacity-0 peer">
                            <label for="faq16" class="flex items-center cursor-pointer">
                                <span class="material-symbols-outlined text-blue-500 pr-2 icon-rotate">arrow_forward_ios</span>
                                <span class="text-xl text-gray-700 dark:text-white">Bagaimana cara kembali ke Landing Page saat berada di halaman Dashboard ?</span>
                            </label>
                            <div class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out peer-checked:max-h-[200px]">
                                <p class="px-4 mt-2 text-gray-500 dark:text-gray-300">
                                    Cara kembali ke landing page saat berada di halaman Dashboard adalah dengan melakukan klik pada logo Polaris.
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