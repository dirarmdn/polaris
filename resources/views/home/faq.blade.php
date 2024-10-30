@extends('layouts.app')

@section('content')
<section class="bg-white dark:bg-gray-900">
    <div class="container px-6 py-12 mx-auto">
        <h3 class="text-1xl text-center text-gray-800 lg:text-1xl dark:text-white">Most people asked about</h3>
        <h1 class="text-2xl font-semibold text-center text-gray-800 lg:text-3xl dark:text-white">Frequently Asked Question</h1>

        <div class="mt-8 xl:mt-16 lg:flex lg:-mx-12">
            <div class="lg:mx-12">
                <!--<h1 class="text-xl font-semibold text-gray-800 dark:text-white">Table of Content</h1>-->

                <div class="mt-4 space-y-4 lg:mt-8">
                    <a href="#" class="block text-xl font-semibold text-gray-800 dark:text-white hover:underline">General</a>
                    <a href="#" class="block text-xl font-semibold text-gray-800 dark:text-white hover:underline">Trust & Safety</a>
                    <a href="#" class="block text-xl font-semibold text-gray-800 dark:text-white hover:underline">Services</a>
                    <a href="#" class="block text-xl font-semibold text-gray-800 dark:text-white hover:underline">Billing</a>
                    <a href="#" class="block text-xl font-semibold text-gray-800 dark:text-white hover:underline">Office Cleaning</a>
                </div>
            </div>

            <div class="flex-1 mt-8 lg:mx-12 lg:mt-0">
                <!--<div>
                    <button class="flex items-center focus:outline-none">
                        <svg class="flex-shrink-0 w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path></svg>

                        <h1 class="mx-4 text-xl text-gray-700 dark:text-white">How i can play for my appoinment ?</h1>
                    </button>

                    <div class="flex mt-8 md:mx-10">
                        <span class="border border-blue-500"></span>

                        <p class="max-w-3xl px-4 text-gray-500 dark:text-gray-300">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, eum quae. Harum officiis reprehenderit ex quia ducimus minima id provident molestias optio nam vel, quidem iure voluptatem, repellat et ipsa.
                        </p>
                    </div>
                </div>-->

                <div class="flex justify-center">
                    <!-- Products -->
                    <div class="relative w-[900px]">
                        <!-- Input Checkbox -->
                        <input type="checkbox" id="input" class="absolute opacity-0 peer">
                        <!-- Heading Label -->
                        <div class="absolute top-[15px] left-[-30px] flex items-center cursor-pointer rotate-0 peer-checked:rotate-180">
                            <span class="material-symbols-outlined text-2xl text-blue-500 dark:text-blue-500 pr-2 transition-transform duration-500 transform" style="rotate: 270deg;">arrow_back_ios</span>
                        </div>
                        <label for="input" class="block mx-4 text-xl text-gray-700 dark:text-white h-[50px] flex items-center cursor-pointer">   
                            How can I play for my appointment?
                        </label> 
                        <!-- Content -->
                        <div class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out peer-checked:max-h-[200px]">
                            <p class="max-w-3xl px-4 text-gray-500 dark:text-gray-300">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, eum quae. Harum officiis reprehenderit ex quia ducimus minima id provident molestias optio nam vel, quidem iure voluptatem, repellat et ipsa.
                            </p>
                        </div>
                    </div>
                </div>


                <hr class="my-8 border-gray-200 dark:border-gray-700">

                <div>
                    <button class="flex items-center focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>

                        <h1 class="mx-4 text-xl text-gray-700 dark:text-white">What can i expect at my first consultation ?</h1>
                    </button>
                </div>

                <hr class="my-8 border-gray-200 dark:border-gray-700">

                <div>
                    <button class="flex items-center focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>

                        <h1 class="mx-4 text-xl text-gray-700 dark:text-white">What are your opening house ?</h1>
                    </button>
                </div>

                <hr class="my-8 border-gray-200 dark:border-gray-700">

                <div>
                    <button class="flex items-center focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>

                        <h1 class="mx-4 text-xl text-gray-700 dark:text-white">Do i need a referral ?</h1>
                    </button>
                </div>

                <hr class="my-8 border-gray-200 dark:border-gray-700">

                <div>
                    <button class="flex items-center focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>

                        <h1 class="mx-4 text-xl text-gray-700 dark:text-white">Is the cost of the appoinment covered by private health insurance ?</h1>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

<script>
    function toggleIcon() {
        const icon = document.getElementById("icon");
        const checkbox = document.getElementById("input");
        icon.textContent = checkbox.checked ? "remove" : "add";
    }
</script>