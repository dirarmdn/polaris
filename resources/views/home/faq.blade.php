@extends('layouts.app')

@section('content')
<div class="bg-white dark:bg-gray-900">
    <div class="container px-6 py-12 mx-auto">
        <h3 class="text-1xl text-center text-gray-800 lg:text-1xl dark:text-white">Most people asked about</h3>
        <h1 class="text-2xl font-semibold text-center text-gray-800 lg:text-3xl dark:text-white">Frequently Asked Question</h1>

        <div class="mt-8 xl:mt-16 lg:flex lg:-mx-12">
            <!-- Left Column: Tabs -->
            <div class="lg:w-1/4 ml-12">
                <div class="space-y-4">
                    <a href="#" data-tab="general" class="tab-link block text-xl font-semibold text-gray-800 dark:text-white hover:underline">General</a>
                    <a href="#" data-tab="trust-safety" class="tab-link block text-xl font-semibold text-gray-800 dark:text-white hover:underline">Trust & Safety</a>
                    <a href="#" data-tab="services" class="tab-link block text-xl font-semibold text-gray-800 dark:text-white hover:underline">Services</a>
                    <a href="#" data-tab="billing" class="tab-link block text-xl font-semibold text-gray-800 dark:text-white hover:underline">Billing</a>
                    <a href="#" data-tab="office-cleaning" class="tab-link block text-xl font-semibold text-gray-800 dark:text-white hover:underline">Office Cleaning</a>
                </div>
            </div>

            <!-- Right Column: Tab Content -->
            <div class="lg:w-3/4">
                <!-- General Content -->
                <div id="general" class="tab-content hidden">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white">General Questions</h2>
                    <p class="text-gray-500 dark:text-gray-300 mt-4">Here are some of the most common questions in the General category.</p>
                    <hr class="my-4 border-gray-200 dark:border-gray-700">

                    <!-- FAQ Items -->
                    <div class="space-y-8">
                        <!-- FAQ Item 1 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="gen1" class="absolute opacity-0 peer">
                            <label for="gen1" class="flex items-center cursor-pointer">
                                <span class="material-symbols-outlined text-blue-500 pr-2 icon-rotate">arrow_forward_ios</span>
                                <span class="text-xl text-gray-700 dark:text-white">How can I play for my appointment?</span>
                            </label>
                            <div class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out peer-checked:max-h-[200px]">
                                <p class="px-4 mt-2 text-gray-500 dark:text-gray-300">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, eum quae. Harum officiis reprehenderit ex quia ducimus minima id provident molestias optio nam vel, quidem iure voluptatem, repellat et ipsa.
                                </p>
                            </div>
                        </div>

                        <hr class="my-8 border-gray-200 dark:border-gray-700">

                        <!-- FAQ Item 2 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="gen2" class="absolute opacity-0 peer">
                            <label for="gen2" class="flex items-center cursor-pointer">
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

                        <!-- FAQ Item 3 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="gen3" class="absolute opacity-0 peer">
                            <label for="gen3" class="flex items-center cursor-pointer">
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

                        <!-- FAQ Item 4 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="gen4" class="absolute opacity-0 peer">
                            <label for="gen4" class="flex items-center cursor-pointer">
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

                        <!-- FAQ Item 5 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="gen5" class="absolute opacity-0 peer">
                            <label for="gen5" class="flex items-center cursor-pointer">
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

                <!-- Trust & Safety Content -->
                <div id="trust-safety" class="tab-content hidden">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Trust & Safety Questions</h2>
                    <p class="text-gray-500 dark:text-gray-300 mt-4">Here are some of the most common questions in the Trust & Safety category.</p>
                    <hr class="my-4 border-gray-200 dark:border-gray-700">

                    <!-- FAQ Items for Trust & Safety -->
                    <div class="space-y-8">
                        <!-- Trust & Safety Item 1 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="ts1" class="absolute opacity-0 peer">
                            <label for="ts1" class="flex items-center cursor-pointer">
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

                        <!-- Trust & Safety Item 2 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="ts2" class="absolute opacity-0 peer">
                            <label for="ts2" class="flex items-center cursor-pointer">
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

                        <!-- Trust & Safety Item 3 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="ts3" class="absolute opacity-0 peer">
                            <label for="ts3" class="flex items-center cursor-pointer">
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

                        <!-- Trust & Safety Item 4 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="ts4" class="absolute opacity-0 peer">
                            <label for="ts4" class="flex items-center cursor-pointer">
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

                        <!-- Trust & Safety Item 5 -->
                        <div class="relative w-[800px]">
                            <input type="checkbox" id="ts5" class="absolute opacity-0 peer">
                            <label for="ts5" class="flex items-center cursor-pointer">
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