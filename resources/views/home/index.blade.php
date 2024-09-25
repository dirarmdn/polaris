@extends('layouts.app')

@section('content')
    <div class="flex flex-col justify-center items-center">
        <div class="p-16 pb-3">
            <h1 class="text-center text-4xl max-w-[650px]"><span class="font-semibold">Satu Portal </span>untuk Semua Kebutuhan Aplikasi
                Internal <span class="text-orange-600 font-semibold">Polban</span></h1>
        </div>
        <div class="p-10">
            <a href="#" class="rounded-lg bg-primary-900 text-white px-5 py-3">Ajukan Sekarang</a>
            <a href="#" class="rounded-lg bg-gray-300 text-black px-5 py-3">Lihat Daftar Ajuan</a>
        </div>
        <div class="flex gap-5 items-end">
            <div class="lg:h-96 lg:w-56 rounded-2xl overflow-hidden relative">
                <h1 class="absolute inset-0 flex justify-end flex-end text-white text-xl p-5 z-10">
                    Platform Terintegrasi untuk Mendukung Transformasi Digital di Lingkungan Kampus
                </h1>
                
                <div class="w-full h-full inset-0 bg-custom-gradient rounded-md absolute z-5"></div>
                
                <img class="w-full h-full object-cover z-0" src="{{ asset('images/Landing-2.svg') }}" alt="">
            </div>
            
            
            <div class="lg:h-60 lg:w-56 bg-light-blue-400 p-5 rounded-2xl">
                <h1 class="text-xl font-semibold text-white font-manrope">Transformasi Digital <br>Polban</h1>
            </div>
            <div class="lg:h-36 lg:w-56 bg-white border-gray-300 border-2 rounded-2xl p-5">
                
                <ul class="avatars flex list-none mx-auto">
                    <li class="avatars_item shadow-md rounded-full block h-[45px] w-[45px] leading-[45px] transition-all duration-100 ease-in-out overflow-hidden first:z-5 nth-child-2:z-4 nth-child-3:z-3 nth-child-4:z-2 nth-child-5:z-1 last:z-0">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTh8fHByb2ZpbGV8ZW58MHx8MHx8fDA%3D" class="w-full h-full object-cover rounded-full" alt="Avatar">
                    </li>
                    <li class="avatars_item shadow-md rounded-full block h-[45px] w-[45px] leading-[45px] transition-all duration-100 ease-in-out overflow-hidden -ml-[10px] first:z-5 nth-child-2:z-4 nth-child-3:z-3 nth-child-4:z-2 nth-child-5:z-1 last:z-0">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTh8fHByb2ZpbGV8ZW58MHx8MHx8fDA%3D" class="w-full h-full object-cover rounded-full" alt="Avatar">
                    </li>
                    <li class="avatars_item shadow-md rounded-full block h-[45px] w-[45px] leading-[45px] transition-all duration-100 ease-in-out overflow-hidden -ml-[10px] first:z-5 nth-child-2:z-4 nth-child-3:z-3 nth-child-4:z-2 nth-child-5:z-1 last:z-0">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTh8fHByb2ZpbGV8ZW58MHx8MHx8fDA%3D" class="w-full h-full object-cover rounded-full" alt="Avatar">
                    </li>
                    <li class="avatars_item bg-gray-200 text-center rounded-full block h-[45px] w-[45px] leading-[45px] transition-all duration-100 ease-in-out overflow-hidden -ml-[10px] first:z-5 nth-child-2:z-4 nth-child-3:z-3 nth-child-4:z-2 nth-child-5:z-1 last:z-0">
                        <p class="font-semibold">+1</p>
                    </li>
                </ul>
                <h1 class="font-semibold text-2xl mt-2">1989+</h1>
                <h1 class="text-lg">Total Pengajuan</h1>                  
            </div>
            <div class="lg:h-60 lg:w-56 rounded-2xl overflow-hidden relative">
                <div class="absolute inset-0 flex flex-col justify-center items-center z-10 p-5 text-center">
                    <h1 class="text-xl text-white font-semibold">Tidak tahu mau apa?<br><br></h1>
                    <h1 class="text-base text-white ">Pelajari tata cara pengajuan kebutuhan aplikasi <span class="underline">disini</span></h1>
                </div>
                <div class="w-full h-full inset-0 bg-orange-600 opacity-65 rounded-md absolute z-5"></div>
                <img class="w-full h-full object-cover z-0" src="{{ asset('images/Landing-1.svg') }}" alt="">
            </div>
            <div class="lg:h-96 lg:w-56 bg- rounded-2xl bg-secondary-900 p-5">
                <h1 class="text-white">Aplikasi SIREKAP Polban adalah aplikasi yang bertujuan untuk fafifu dan lainnya</h1>
            </div>
        </div>
    </div>
    <div class=""></div>
@endsection
