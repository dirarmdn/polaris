@extends('layouts.dashboard')

@section('title', 'Profil Pengguna')

@section('content')
<div class="bg-white dark:bg-gray-900">
    <div class="container py-12 mx-auto">
        <h2 class="text-2xl font-bold text-black-800 mb-6">Pengaturan <span class="text-accent-600">Akun</span></h2>
        <div class="mt-8 xl:mt-16 lg:flex lg:-mx-12">
            <!-- Left Column: Tabs -->
            <div class="lg:w-1/4 ml-12">
                <div class="space-y-4">
                    <a href="#" data-tab="profile" class="tab-link block text-xl font-semibold text-gray-800 dark:text-white py-5 px-4 shadow-md rounded-full">Profil Saya</a>
                    <a href="#" data-tab="organisasi" class="tab-link block text-xl font-semibold text-gray-800 dark:text-white py-5 px-4 shadow-md rounded-full">Organisasi</a>
                    <a href="#" data-tab="services" class="tab-link block text-xl font-semibold text-gray-800 dark:text-white py-5 px-4 shadow-md rounded-full">Services</a>
                    <a href="#" data-tab="billing" class="tab-link block text-xl font-semibold text-gray-800 dark:text-white py-5 px-4 shadow-md rounded-full">Billing</a>
                    <a href="#" data-tab="office-cleaning" class="tab-link block text-xl font-semibold text-gray-800 dark:text-white py-5 px-4 shadow-md rounded-full">Office Cleaning</a>
                </div>
            </div>

            <!-- Right Column: Tab Content -->
            <div class="lg:w-3/4 ml-16">
                <!-- General Content -->
                <div id="profile" class="tab-content">
                    <h2 class="text-2xl font-bold text-black-800 mb-6">Profil <span class="text-accent-600">Saya</span></h2>

                    <div class="bg-white rounded-lg shadow-lg px-10 py-6">                
                        <div class="rounded-lg px-10 pt-10 pb-4 space-y-3 flex flex-col">
                            <p class="text-black-600 font-bold">Foto Profil</p>
                            <!-- Profile Image -->
                            <div class="flex items-center gap-5">
                                <div class="w-28 h-28 bg-primary-800 rounded-full">
                                    <img src="{{ asset('images/profile.png') }}" alt="Profile Picture" class="rounded-full w-full h-full object-cover border-2 border-gray-200" />
                                </div>
                                <button class="bg-primary-700 text-white font-semibold px-4 py-2 rounded-lg hover:bg-primary-600 mb-2">
                                    Ubah foto
                                </button>
                                <button class="bg-white text-red-600 px-4 flex items-center justify-center py-2 font-semibold border-2 border-gray-200 rounded-lg hover:bg-gray-100 mb-2">
                                    Hapus foto
                                </button>
                            </div>
                        </div>
                    </div>
                
                    <div class="bg-white p-10 rounded-lg shadow-md">
                        <div class="grid gap-4">
                            <p class="text-black-600 font-bold">Nama Lengkap</p>
                            <input type="text" name="name" id="name" value="{{ old('name', $user->nama) }}" required class="rounded-lg border-2 border-gray-300 py-4">
                            <p class="text-black-600 font-bold">Email</p>
                            <input type="text" name="email" id="email" value="{{ old('email', $user->email) }}" required class="rounded-lg border-2 border-gray-300 py-4">
                            <p class="text-black-600 font-bold">Jabatan</p>
                            <input type="text" name="jabatan" id="jabatan" value="{{ old('jabatan', $user->jabatan) }}" required class="rounded-lg border-2 border-gray-300 py-4">
                            <p class="text-black-600 font-bold">Organisasi</p>
                            <input type="text" name="nama" id="nama" value="{{ old('email', $user->organisasi->nama) }}" required class="rounded-lg border-2 border-gray-300 py-4" disabled>
                            <p class="text-black-600 font-bold">Nomor Telepon</p>
                            <input type="text" name="no_telp" id="no_telp" value="{{ old('no_telp', $user->no_telp) }}" required class="rounded-lg border-2 border-gray-300 py-4">
                        </div>
                    </div>
                        <button class="bg-primary-700 text-white font-semibold ml-auto mt-5 px-4 py-2 rounded-lg hover:bg-primary-600 mb-2">
                            Simpan Perubahan
                        </button>
                </div>

                <!-- Trust & Safety Content -->
                <div id="organisasi" class="tab-content hidden">
                    <h2 class="text-2xl font-bold text-black-800 mb-6">Organisasi <span class="text-accent-600">Saya</span></h2>

                    <div class="bg-white rounded-lg shadow-lg px-10 py-6">                
                        <div class="rounded-lg px-10 pt-10 pb-4 space-y-3 flex flex-col">
                            <p class="text-black-600 font-bold">Logo Organisasi</p>
                            <!-- Profile Image -->
                            <div class="flex items-center gap-5">
                                <div class="w-28 h-28 bg-primary-800 rounded-full">
                                    <img src="{{ asset('images/profile.png') }}" alt="Profile Picture" class="rounded-full w-full h-full object-cover border-2 border-gray-200" />
                                </div>
                                <button class="bg-primary-700 text-white font-semibold px-4 py-2 rounded-lg hover:bg-primary-600 mb-2">
                                    Ubah foto
                                </button>
                                <button class="bg-white text-red-600 px-4 flex items-center justify-center py-2 font-semibold border-2 border-gray-200 rounded-lg hover:bg-gray-100 mb-2">
                                    Hapus foto
                                </button>
                            </div>
                        </div>
                    </div>
                
                    <div class="bg-white p-10 rounded-lg shadow-md">
                        <div class="grid gap-4">
                            <p class="text-black-600 font-bold">Nama</p>
                            <input type="text" name="name" id="name" value="{{ old('name', $user->nama) }}" required class="rounded-lg border-2 border-gray-300 py-4">
                            <p class="text-black-600 font-bold">Deskripsi Perusahaan</p>
                            <input type="text" name="email" id="email" value="{{ old('email', $user->email) }}" required class="rounded-lg border-2 border-gray-300 py-4">
                            <p class="text-black-600 font-bold">Bidang Usaha</p>
                            <input type="text" name="jabatan" id="jabatan" value="{{ old('jabatan', $user->jabatan) }}" required class="rounded-lg border-2 border-gray-300 py-4">
                            <p class="text-black-600 font-bold">Alamat</p>
                            <input type="text" name="nama" id="nama" value="{{ old('email', $user->organisasi->nama) }}" required class="rounded-lg border-2 border-gray-300 py-4" disabled>
                            <p class="text-black-600 font-bold">Website Resmi</p>
                            <input type="text" name="no_telp" id="no_telp" value="{{ old('no_telp', $user->no_telp) }}" required class="rounded-lg border-2 border-gray-300 py-4">
                        </div>
                    </div>
                        <button class="bg-primary-700 text-white font-semibold ml-auto mt-5 px-4 py-2 rounded-lg hover:bg-primary-600 mb-2">
                            Simpan Perubahan
                        </button>
                </div>

                <!-- Service Content -->
                <div id="services" class="tab-content hidden">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Services</h2>
                    <p class="text-gray-500 dark:text-gray-300 mt-4">Here are some of the most common questions in the Services category.</p>
                    <hr class="my-4 border-gray-200 dark:border-gray-700">

                    <!-- FAQ Items for Service -->
                    <div class="space-y-8">
                        <!-- Service Item 1 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="s1" class="absolute opacity-0 peer">
                            <label for="s1" class="flex items-center cursor-pointer">
                                <span class="material-symbols-outlined text-blue-500 pr-2 icon-rotate">arrow_forward_ios</span>
                                <span class="text-xl text-gray-700 dark:text-white">Is my information secure?</span>
                            </label>
                            <div class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out peer-checked:max-h-[200px]">
                                <p class="px-4 mt-2 text-gray-500 dark:text-gray-300">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, eum quae. Harum officiis reprehenderit ex quia ducimus minima id provident molestias optio nam vel, quidem iure voluptatem, repellat et ipsa.
                                </p>
                            </div>
                        </div>

                        <hr class="my-8 border-gray-200 dark:border-gray-700">

                        <!-- Service Item 2 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="s2" class="absolute opacity-0 peer">
                            <label for="s2" class="flex items-center cursor-pointer">
                                <span class="material-symbols-outlined text-blue-500 pr-2 icon-rotate">arrow_forward_ios</span>
                                <span class="text-xl text-gray-700 dark:text-white">What can i expect at my first consultation ?</span>
                            </label>
                            <div class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out peer-checked:max-h-[200px]">
                                <p class="px-4 mt-2 text-gray-500 dark:text-gray-300">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, eum quae. Harum officiis reprehenderit ex quia ducimus minima id provident molestias optio nam vel, quidem iure voluptatem, repellat et ipsa.
                                </p>
                            </div>
                        </div>

                        <hr class="my-8 border-gray-200 dark:border-gray-700">

                        <!-- Service Item 3 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="s3" class="absolute opacity-0 peer">
                            <label for="s3" class="flex items-center cursor-pointer">
                                <span class="material-symbols-outlined text-blue-500 pr-2 icon-rotate">arrow_forward_ios</span>
                                <span class="text-xl text-gray-700 dark:text-white">What are your opening house ?</span>
                            </label>
                            <div class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out peer-checked:max-h-[200px]">
                                <p class="px-4 mt-2 text-gray-500 dark:text-gray-300">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, eum quae. Harum officiis reprehenderit ex quia ducimus minima id provident molestias optio nam vel, quidem iure voluptatem, repellat et ipsa.
                                </p>
                            </div>
                        </div>

                        <hr class="my-8 border-gray-200 dark:border-gray-700">

                        <!-- Service Item 4 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="s4" class="absolute opacity-0 peer">
                            <label for="s4" class="flex items-center cursor-pointer">
                                <span class="material-symbols-outlined text-blue-500 pr-2 icon-rotate">arrow_forward_ios</span>
                                <span class="text-xl text-gray-700 dark:text-white">Do i need a referral ?</span>
                            </label>
                            <div class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out peer-checked:max-h-[200px]">
                                <p class="px-4 mt-2 text-gray-500 dark:text-gray-300">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, eum quae. Harum officiis reprehenderit ex quia ducimus minima id provident molestias optio nam vel, quidem iure voluptatem, repellat et ipsa.
                                </p>
                            </div>
                        </div>

                            <hr class="my-8 border-gray-200 dark:border-gray-700">

                        <!-- Service Item 5 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="s5" class="absolute opacity-0 peer">
                            <label for="s5" class="flex items-center cursor-pointer">
                                <span class="material-symbols-outlined text-blue-500 pr-2 icon-rotate">arrow_forward_ios</span>
                                <span class="text-xl text-gray-700 dark:text-white">Is the cost of the appoinment covered by private health insurance ?</span>
                            </label>
                            <div class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out peer-checked:max-h-[200px]">
                                <p class="px-4 mt-2 text-gray-500 dark:text-gray-300">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, eum quae. Harum officiis reprehenderit ex quia ducimus minima id provident molestias optio nam vel, quidem iure voluptatem, repellat et ipsa.
                                </p>
                            </div>
                        </div>

                        <hr class="my-8 border-gray-200 dark:border-gray-700">
                    </div>
                </div>

                <!-- Billing Content -->
                <div id="billing" class="tab-content hidden">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Billing</h2>
                    <p class="text-gray-500 dark:text-gray-300 mt-4">Here are some of the most common questions in the Billing category.</p>
                    <hr class="my-4 border-gray-200 dark:border-gray-700">

                    <!-- FAQ Items for Billing -->
                    <div class="space-y-8">
                        <!-- Billing Item 1 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="b1" class="absolute opacity-0 peer">
                            <label for="b1" class="flex items-center cursor-pointer">
                                <span class="material-symbols-outlined text-blue-500 pr-2 icon-rotate">arrow_forward_ios</span>
                                <span class="text-xl text-gray-700 dark:text-white">Is my information secure?</span>
                            </label>
                            <div class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out peer-checked:max-h-[200px]">
                                <p class="px-4 mt-2 text-gray-500 dark:text-gray-300">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, eum quae. Harum officiis reprehenderit ex quia ducimus minima id provident molestias optio nam vel, quidem iure voluptatem, repellat et ipsa.
                                </p>
                            </div>
                        </div>

                        <hr class="my-8 border-gray-200 dark:border-gray-700">

                        <!-- Billing Item 2 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="b2" class="absolute opacity-0 peer">
                            <label for="b2" class="flex items-center cursor-pointer">
                                <span class="material-symbols-outlined text-blue-500 pr-2 icon-rotate">arrow_forward_ios</span>
                                <span class="text-xl text-gray-700 dark:text-white">What can i expect at my first consultation ?</span>
                            </label>
                            <div class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out peer-checked:max-h-[200px]">
                                <p class="px-4 mt-2 text-gray-500 dark:text-gray-300">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, eum quae. Harum officiis reprehenderit ex quia ducimus minima id provident molestias optio nam vel, quidem iure voluptatem, repellat et ipsa.
                                </p>
                            </div>
                        </div>

                        <hr class="my-8 border-gray-200 dark:border-gray-700">

                        <!-- Billing Item 3 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="b3" class="absolute opacity-0 peer">
                            <label for="b3" class="flex items-center cursor-pointer">
                                <span class="material-symbols-outlined text-blue-500 pr-2 icon-rotate">arrow_forward_ios</span>
                                <span class="text-xl text-gray-700 dark:text-white">What are your opening house ?</span>
                            </label>
                            <div class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out peer-checked:max-h-[200px]">
                                <p class="px-4 mt-2 text-gray-500 dark:text-gray-300">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, eum quae. Harum officiis reprehenderit ex quia ducimus minima id provident molestias optio nam vel, quidem iure voluptatem, repellat et ipsa.
                                </p>
                            </div>
                        </div>

                        <hr class="my-8 border-gray-200 dark:border-gray-700">

                        <!-- Billing Item 4 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="b4" class="absolute opacity-0 peer">
                            <label for="b4" class="flex items-center cursor-pointer">
                                <span class="material-symbols-outlined text-blue-500 pr-2 icon-rotate">arrow_forward_ios</span>
                                <span class="text-xl text-gray-700 dark:text-white">Do i need a referral ?</span>
                            </label>
                            <div class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out peer-checked:max-h-[200px]">
                                <p class="px-4 mt-2 text-gray-500 dark:text-gray-300">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, eum quae. Harum officiis reprehenderit ex quia ducimus minima id provident molestias optio nam vel, quidem iure voluptatem, repellat et ipsa.
                                </p>
                            </div>
                        </div>

                            <hr class="my-8 border-gray-200 dark:border-gray-700">

                        <!-- Billing Item 5 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="b5" class="absolute opacity-0 peer">
                            <label for="b5" class="flex items-center cursor-pointer">
                                <span class="material-symbols-outlined text-blue-500 pr-2 icon-rotate">arrow_forward_ios</span>
                                <span class="text-xl text-gray-700 dark:text-white">Is the cost of the appoinment covered by private health insurance ?</span>
                            </label>
                            <div class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out peer-checked:max-h-[200px]">
                                <p class="px-4 mt-2 text-gray-500 dark:text-gray-300">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, eum quae. Harum officiis reprehenderit ex quia ducimus minima id provident molestias optio nam vel, quidem iure voluptatem, repellat et ipsa.
                                </p>
                            </div>
                        </div>

                        <hr class="my-8 border-gray-200 dark:border-gray-700">
                    </div>
                </div>

                <!-- Office Cleaning -->
                <div id="office-cleaning" class="tab-content hidden">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Office Cleaning</h2>
                    <p class="text-gray-500 dark:text-gray-300 mt-4">Here are some of the most common questions in the Office Cleaning category.</p>
                    <hr class="my-4 border-gray-200 dark:border-gray-700">

                    <!-- FAQ Items for Office Cleaning -->
                    <div class="space-y-8">
                        <!-- Office Cleaning Item 1 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="oc1" class="absolute opacity-0 peer">
                            <label for="oc1" class="flex items-center cursor-pointer">
                                <span class="material-symbols-outlined text-blue-500 pr-2 icon-rotate">arrow_forward_ios</span>
                                <span class="text-xl text-gray-700 dark:text-white">Is my information secure?</span>
                            </label>
                            <div class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out peer-checked:max-h-[200px]">
                                <p class="px-4 mt-2 text-gray-500 dark:text-gray-300">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, eum quae. Harum officiis reprehenderit ex quia ducimus minima id provident molestias optio nam vel, quidem iure voluptatem, repellat et ipsa.
                                </p>
                            </div>
                        </div>

                        <hr class="my-8 border-gray-200 dark:border-gray-700">

                        <!-- Office Cleaning Item 2 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="oc2" class="absolute opacity-0 peer">
                            <label for="oc2" class="flex items-center cursor-pointer">
                                <span class="material-symbols-outlined text-blue-500 pr-2 icon-rotate">arrow_forward_ios</span>
                                <span class="text-xl text-gray-700 dark:text-white">What can i expect at my first consultation ?</span>
                            </label>
                            <div class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out peer-checked:max-h-[200px]">
                                <p class="px-4 mt-2 text-gray-500 dark:text-gray-300">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, eum quae. Harum officiis reprehenderit ex quia ducimus minima id provident molestias optio nam vel, quidem iure voluptatem, repellat et ipsa.
                                </p>
                            </div>
                        </div>

                        <hr class="my-8 border-gray-200 dark:border-gray-700">

                        <!-- Office Cleaning Item 3 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="oc3" class="absolute opacity-0 peer">
                            <label for="oc3" class="flex items-center cursor-pointer">
                                <span class="material-symbols-outlined text-blue-500 pr-2 icon-rotate">arrow_forward_ios</span>
                                <span class="text-xl text-gray-700 dark:text-white">What are your opening house ?</span>
                            </label>
                            <div class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out peer-checked:max-h-[200px]">
                                <p class="px-4 mt-2 text-gray-500 dark:text-gray-300">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, eum quae. Harum officiis reprehenderit ex quia ducimus minima id provident molestias optio nam vel, quidem iure voluptatem, repellat et ipsa.
                                </p>
                            </div>
                        </div>

                        <hr class="my-8 border-gray-200 dark:border-gray-700">

                        <!-- Office Cleaning Item 4 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="oc4" class="absolute opacity-0 peer">
                            <label for="oc4" class="flex items-center cursor-pointer">
                                <span class="material-symbols-outlined text-blue-500 pr-2 icon-rotate">arrow_forward_ios</span>
                                <span class="text-xl text-gray-700 dark:text-white">Do i need a referral ?</span>
                            </label>
                            <div class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out peer-checked:max-h-[200px]">
                                <p class="px-4 mt-2 text-gray-500 dark:text-gray-300">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, eum quae. Harum officiis reprehenderit ex quia ducimus minima id provident molestias optio nam vel, quidem iure voluptatem, repellat et ipsa.
                                </p>
                            </div>
                        </div>

                            <hr class="my-8 border-gray-200 dark:border-gray-700">

                        <!-- Office Cleaning Item 5 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="oc5" class="absolute opacity-0 peer">
                            <label for="oc5" class="flex items-center cursor-pointer">
                                <span class="material-symbols-outlined text-blue-500 pr-2 icon-rotate">arrow_forward_ios</span>
                                <span class="text-xl text-gray-700 dark:text-white">Is the cost of the appoinment covered by private health insurance ?</span>
                            </label>
                            <div class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out peer-checked:max-h-[200px]">
                                <p class="px-4 mt-2 text-gray-500 dark:text-gray-300">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, eum quae. Harum officiis reprehenderit ex quia ducimus minima id provident molestias optio nam vel, quidem iure voluptatem, repellat et ipsa.
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

@push('scripts')
    
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
@endpush